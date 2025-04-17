<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class C_Pivot extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct(){
        parent:: __construct(); 
        date_default_timezone_set('Asia/Jakarta');
       
		$this->load->model('M_pivot');
        $this->load->model('M_pivot_client', 'pivot');
        $this->load->model('M_coba', 'coba');
        $this->load->model('M_pivot_aql');
		// $this->load->library('Excel');
        
    } 
	public function index(){
		sesscheck();
		$subdata['formtitle']="PIVOT INTERFACE";
        $subdata['username'] = $this->session->userdata('USERNAME');
		$subdata['tingkat'] = $this->session->userdata('LEVEL');

		$subdata['sub']= 1;
		$this->load->view('template/header', $subdata);
		$this->load->view('QIP/Pivot/interface_v1', $subdata);
		$this->load->view('template/footer');
	}

    public function view_data(){
        sesscheck();
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $list = $this->M_pivot->view_data();
        $data = array();
        $no = $start;
        foreach($list->result() as $a){
            if($a->STATUS_UPLOAD=='X'){
                $upload = 'NOT LINKED';
            }else{
                $upload = $a->STATUS_UPLOAD;
            }
            $no++; 
            $data[] = array(
                // "<input type='checkbox' class='delete_check' id='delcheck_". $a->PO_NO."' onclick='checkcheckbox();' value='". $a->PO_NO."'>". $no, 
                $no, 
                '',
                // '',
                $a->PO_NO,
                $a->MODEL_NAME,
                $a->ART_NO,
                $a->QTY_ASSY_IN,
                $a->QTY_DEFECT,
                number_format($a->DEFECT_RATE,2),
                $a->RESULT,
                $a->STEP_IN_TOOLS,
                $a->STOP_LINE,
                $a->STOP_LINE_REASON,
                $a->COMMENT,
                $upload,
                $a->STATUS_GENERATE,
                '',
                ''
               
            );
        }
        $output = array(
            "draw"=> $draw,
            "recordsTotal" => $list->num_rows(),
            "recordsFiltered" => $list->num_rows(),
            "data" =>$data
        );
        echo json_encode($output);
    }

    public function generate_data(){
        $tanggal            = date('Ymd', strtotime('-1 day'));
        $data               = $this->M_pivot->generate_data($tanggal);
        $transform_result   = $this->add_transform($tanggal);
        if ($transform_result) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Berhasil generate dan transform data'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal melakukan transform data'
            ]);
        }
       
    }


    public function add_transform($tanggal){
        try {
            // Ambil data PO untuk tanggal tertentu
            $get_today_po = $this->M_pivot->data_all($tanggal);
        
            if(empty($get_today_po)){
                log_message('info', 'Tidak ada data PO untuk tanggal: ' . $tanggal);
                return false;
            }
    
            foreach($get_today_po as $po){
                $po_trans_get = $this->M_pivot_aql->get_po_trans($po['po_trans']);
                
                if(empty($po_trans_get)){
                    log_message('warning', 'Tidak ada data transaksi untuk PO: ' . $po['PO_NO']);
                    continue;
                }
    
                $batch_insert_data = [];
                
                foreach($po_trans_get['po_line'] as $line){
                    $batch_insert_data[] = [
                        'PO_NO' => $po['PO_NO'],
                        'SKU' => $line['sku']['sku_number'],
                        'PROJECT_CODE' => $line['sku']['project']['project_code'],
                        'CREATED_AT' => date('Y-m-d'),
                        'SIZE' => $line['size']
                    ];
                }
    
                if(empty($batch_insert_data)){
                    log_message('info', 'Tidak ada data baru untuk diinsert untuk PO: ' . $po['PO_NO']);
                    continue;
                }
    
                // Debugging: Cetak data yang akan dicek
                log_message('debug', 'Checking existing records for data: ' . print_r($batch_insert_data, true));
    
                // Tambahkan pengecekan error pada query
                $existing_query = $this->db->select('PO_NO, SKU, SIZE')
                    ->from('QIP.dbo.TQC_PO_TRANS4RM_TEMP')
                    ->where_in('PO_NO', array_column($batch_insert_data, 'PO_NO'))
                    ->where_in('SKU', array_column($batch_insert_data, 'SKU'))
                    ->where_in('SIZE', array_column($batch_insert_data, 'SIZE'));
    
                // Tambahkan error handling
                $existing_result = $existing_query->get();
                
                if ($existing_result === FALSE) {
                    // Query gagal
                    $error = $this->db->error();
                    log_message('error', 'Query error: ' . $error['message']);
                    continue;
                }
    
                $existing_records = $existing_result->result_array();
    
                // Filter data yang belum ada
                $insert_data = array_udiff($batch_insert_data, $existing_records, function($a, $b) {
                    if ($a['PO_NO'] !== $b['PO_NO']) return $a['PO_NO'] <=> $b['PO_NO'];
                    if ($a['SKU'] !== $b['SKU']) return $a['SKU'] <=> $b['SKU'];
                    return $a['SIZE'] <=> $b['SIZE'];
                });
    
                // Logging untuk debugging
                log_message('debug', 'Existing records: ' . print_r($existing_records, true));
                log_message('debug', 'Records to insert: ' . print_r($insert_data, true));
    
                // Lakukan insert batch
                if(!empty($insert_data)){
                    $insert_result = $this->db->insert_batch('QIP.dbo.TQC_PO_TRANS4RM_TEMP', $insert_data);
                    
                    if($insert_result){
                        log_message('info', 'Berhasil insert ' . count($insert_data) . ' records untuk PO: ' . $po['PO_NO']);
                    } else {
                        $error = $this->db->error();
                        log_message('error', 'Gagal insert data untuk PO: ' . $po['PO_NO'] . '. Error: ' . $error['message']);
                    }
                } else {
                    log_message('info', 'Tidak ada data baru untuk diinsert setelah pengecekan');
                }
            }
    
            return true;
        } catch (Exception $e) {
            log_message('error', 'Error dalam add_transform: ' . $e->getMessage());
            return false;
        }
    }

    public function view_generate(){
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start")); 
        $length = intval($this->input->get("length"));
    
        // Ambil data sekali saja
        $list = $this->M_pivot->view_generate();
        $total_rows = $list->num_rows();
    
        $data = array();
        $no = $start;
    
        // Gunakan result_array() untuk mengurangi overhead
        $result_array = $list->result_array();
    
        // Proses data dalam satu loop
        foreach($result_array as $a){
            // Pindahkan logika cek defect di luar loop
            $cek_defect = $this->M_pivot->cek_defect_tqc($a['PO_ID'])->num_rows();
            
            $data[] = array(
                ++$no, 
                $this->_generate_checkbox($a),
                $a['PO_NO'],
                $a['MODEL_NAME'],
                $a['ART_NO'],
                $a['QTY_ASSY_IN'],
                $a['QTY_DEFECT'],
                number_format($a['DEFECT_RATE'], 2),
                $a['RESULT'],
                $a['STEP_IN_TOOLS'],
                $a['STOP_LINE'],
                $a['STOP_LINE_REASON'],
                $this->_generate_comment($a),
                $this->_generate_upload_status($a),
                $this->_generate_button($a),
                $this->_generate_json_link($a),
                $this->_generate_defect_link($a, $cek_defect)
            );
        }
    
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_rows,
            "recordsFiltered" => $total_rows,
            "data" => $data
        );
    
        echo json_encode($output);
    }
    
    public function view_generate_json(){
        $data = $this->M_pivot->view_generate()->result();
        echo json_encode($data);
    }
    // Pisahkan logika kompleks ke method terpisah
    private function _generate_checkbox($a) {
        if (($a['RESULT'] == 'FAIL' || $a['RESULT'] == 'PASS') && $a['STATUS_UPLOAD'] == 'N') {
            return "<input type='checkbox' class='delete_check' id='delcheck_". $a['PO_ID']."' onclick='checkcheckbox();' value='". $a['PO_ID']."'>";
        }
        return '';
    }
    
    private function _generate_comment($a) {
        if (($a['RESULT'] == 'FAIL') && ($a['STATUS_UPLOAD'] == 'N')) {
            return '<input type="text" id="comment" name="comment" value="'.$a['COMMENT'].'">';
        }
        return $a['COMMENT'];
    }
    
    private function _generate_button($a) {
        if (($a['RESULT'] == 'FAIL') && ($a['STATUS_UPLOAD'] == 'N')) {
            return '<button type="button" class="btn btn-primary btn-xs saveComment" id="saveComment" id_PO="'.$a['PO_ID'].'">Save Comment</button>
                    <button type="button" class="btn btn-warning btn-xs editData" id="editData" id_PO="'.$a['PO_ID'].'">Edit Defect</button>';
        } elseif (($a['RESULT'] == 'PASS') && ($a['STATUS_UPLOAD'] == 'N')) {
            return '<button type="button" class="btn btn-warning btn-xs editData" id="editData" id_PO="'.$a['PO_ID'].'">Edit Defect</button>';
        }
        return '';
    }
    
    private function _generate_upload_status($a) {
        return $a['STATUS_UPLOAD'] == 'X' ? 'NOT LINKED' : $a['STATUS_UPLOAD'];
    }
    
    private function _generate_json_link($a) {
        return "<a href='http://10.10.100.23/qip_api_test/C_pivot_test_V1/index/".$a['PO_ID']."' target='_blank'>view json</a>";
    }
    
    private function _generate_defect_link($a, $cek_defect) {
        if($cek_defect > 0){
            return "<a href='http://10.10.100.23/qip_api_test/C_pivot_test_V1/tqc_add/".$a['PO_ID']."' target='_blank'>view json 2</a>";
        }
        return '<label class="text-white bg-warning">no defects recorded</label>';
    }

    public function view_defect_detail(){
        $PO_ID = $this->input->post('PO_NO_ID');
        $data = $this->M_pivot->view_defect_detail($PO_ID);
        echo json_encode($data);
    }

    public function delete_detail(){
        $PO_ID = $this->input->post('PO_ID');
        $QCODE = $this->input->post('Qcode');

        $data = $this->M_pivot->delete_detail($PO_ID, $QCODE);
        echo json_encode($data);
    }

    public function cari_qcode(){
        $data = $this->M_pivot->cari_qcode();
        echo json_encode($data);
    }

    public function tambah_detail(){

        $data = $this->M_pivot->tambah_detail();
        echo json_encode($data);
    }

    public function save_comment(){
        $data = $this->M_pivot->save_comment();
        echo json_encode($data);
    }

    public function pivot_get(){
        $this->M_pivot->pivot_get();
    }

    public function pivot_put(){
        $data = $this->M_pivot->pivot_put_();
        echo json_encode($data);
    }

    // public function submit_data(){
    //     // sesscheck();
    //     $tanggal    = $this->input->post('tanggal'); 
    //     $banyak     = $this->M_pivot->banyak_data($tanggal);
    //     $jml        = number_format($banyak->BANYAK);
    //     $data       = $this->M_pivot->view_generate_tgl($tanggal)->result();//$this->M_pivot->data_mes_all($tanggal);
    //     try{
    //         foreach($data as $d){
    //             $po_id          = $d->PO_ID;
    //             $po_no          = $d->PO_NO;
    //             $cek_defect     = $this->M_pivot->cek_defect_tqc($po_id)->num_rows();
    //             if($cek_defect > 0){
    //                 $pivot_status   = $this->M_pivot->pivot_put($po_id);//$this->M_pivot->get_dataPO($po_no);
    //                 $tqc_add        = $this->M_pivot->tqc_defect_json($po_id);
    //                 $update         = $this->M_pivot->update_status($deleteid, 'Y', $pivot_status);
    //             }else{
    //                 $pivot_status   = $this->M_pivot->pivot_put($po_id);//$this->M_pivot->get_dataPO($po_no);
    //                 $update         = $this->M_pivot->update_status($deleteid, 'Y', $pivot_status);
    //             }
                
    //             // if(($pivot_status=='200')||($pivot_status=='201')){
    //                 // $this->M_pivot->update_status($po_id, $pivot_status);
    //             // }else if($pivot_status=='404'){
    //             //     $this->M_pivot->update_status($po_id,'X');
    //             // }
                
    //         }echo json_encode("Berhasil Submit Data");
    //     } catch(Exception $e){
    //         $UPDATE = $this->M_pivot->update_status($deleteid, 'X','404');
    //         echo json_encode("submit data terhenti. Silahkan cek json");

    //     }
    // }
    public function submit_rani($tanggal){
        try {
            $banyak = $this->M_pivot->banyak_data($tanggal);
            $jml    = number_format($banyak->BANYAK);
            $data   = $this->M_pivot->view_generate_tgl($tanggal)->result();
            
            $successCount = 0;
            $failedCount = 0;
    
            foreach($data as $d){
                $po_id = $d->PO_ID;
                $po_no = $d->PO_NO;
              
                try {
                    $pivot_status = $this->M_pivot->pivot_put($po_id);
                    $update = $this->M_pivot->update_status($po_id, 'Y', $pivot_status);
                    $successCount++;
                } catch(Exception $inner_e) {
                    // $this->M_pivot->update_status($po_id, 'X', '404');
                    $failedCount++;
                    // Log error untuk debugging
                    log_message('error', 'Error processing PO ID ' . $po_id . ': ' . $inner_e->getMessage());
                }
            }
    
            // Prepare response
            if ($failedCount > 0) {
                echo json_encode([
                    'status' => 'partial_error',
                    'message' => "Berhasil submit $successCount data, gagal $failedCount data"
                ]);
            } else {
                echo json_encode([
                    'status' => 'success',
                    'message' => "Berhasil Submit $successCount Data"
                ]);
            }
        } catch(Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => "Submit data terhenti. Silahkan cek json: " . $e->getMessage()
            ]);
        }
    }
	

    public function submit_data(){
        $tanggal = $this->input->post('tanggal'); 
        
        try {
            $banyak = $this->M_pivot->banyak_data($tanggal);
            $jml    = number_format($banyak->BANYAK);
            $data   = $this->M_pivot->view_generate_tgl($tanggal)->result();
            
            $successCount = 0;
            $failedCount = 0;
    
            foreach($data as $d){
                $po_id = $d->PO_ID;
                $po_no = $d->PO_NO;
                // $cek_defect = $this->M_pivot->cek_defect_tqc($po_id)->num_rows();
    
                try {
                    // $cek_defect = $this->M_pivot->cek_defect_tqc($po_id)->num_rows();
                    $pivot_status = $this->M_pivot->pivot_put($po_id);
                    
                    // if($cek_defect > 0){
                    //     $tqc_add = $this->M_pivot->tqc_defect_json($po_id);
                    // }
                    $update = $this->M_pivot->update_status($po_id, 'Y', $pivot_status);
                    $successCount++;
                } catch(Exception $inner_e) {
                    // $this->M_pivot->update_status($po_id, 'X', '404');
                    $failedCount++;
                    // Log error untuk debugging
                    log_message('error', 'Error processing PO ID ' . $po_id . ': ' . $inner_e->getMessage());
                }
            }
    
            // Prepare response
            if ($failedCount > 0) {
                echo json_encode([
                    'status' => 'partial_error',
                    'message' => "Berhasil submit $successCount data, gagal $failedCount data"
                ]);
            } else {
                echo json_encode([
                    'status' => 'success',
                    'message' => "Berhasil Submit $successCount Data"
                ]);
            }
        } catch(Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => "Submit data terhenti. Silahkan cek json: " . $e->getMessage()
            ]);
        }
    }
	
	

    public function submit_data_trial(){
        // sesscheck();
        $tanggal    = $this->input->post('tanggal'); 
        $banyak     = $this->M_pivot->banyak_data($tanggal);
        $jml        = number_format($banyak->BANYAK);
        $data       = $this->M_pivot->view_generate_tgl($tanggal)->result();//$this->M_pivot->data_mes_all($tanggal);
        try{
            foreach($data as $d){
                $po_id          = $d->PO_ID;
                $po_no          = $d->PO_NO;
                $cek_defect     = $this->M_pivot->cek_defect_tqc($po_id)->num_rows();
                if($cek_defect > 0){
                    $pivot_status   = $this->M_pivot->pivot_put_trial($po_id);//$this->M_pivot->get_dataPO($po_no);
                    $tqc_add        = $this->M_pivot->tqc_defect_json_trial($po_id);
                }else{
                    $pivot_status   = $this->M_pivot->pivot_put_trial($po_id);//$this->M_pivot->get_dataPO($po_no);
                }
                

                // if(($pivot_status=='200')||($pivot_status=='201')){
                //     $this->M_pivot->update_status($po_id,'Y');
                // }else if($pivot_status=='404'){
                //     $this->M_pivot->update_status($po_id,'X');
                // }
                
            }
            echo json_encode("Berhasil Submit Data");
        } catch(Exception $e){
            echo json_encode("submit data terhenti. Silahkan cek json");
        }
    }

    public function submit_data_single_trial($id){
        try{
            $po_id          = $id;
            $cek_defect     = $this->M_pivot->cek_defect_tqc($po_id)->num_rows();
            if($cek_defect > 0){
                $pivot_status   = $this->M_pivot->pivot_put_trial($po_id);//$this->M_pivot->get_dataPO($po_no);
                $tqc_add        = $this->M_pivot->tqc_defect_json_trial($po_id);
            }else{
                $pivot_status   = $this->M_pivot->pivot_put_trial($po_id);//$this->M_pivot->get_dataPO($po_no);
            }
            echo json_encode($pivot_status);
        } catch(Exception $e){
            echo json_encode($e);
        }
    }

    public function cell(){
        sesscheck();
        $subdata['formtitle']="PIVOT INTERFACE";
        $subdata['username'] = $this->session->userdata('USERNAME');
		$subdata['tingkat'] = $this->session->userdata('LEVEL');

		$subdata['sub']= 1;
		$this->load->view('template/header', $subdata);
		$this->load->view('QIP/Pivot/cell', $subdata);
		$this->load->view('template/footer');
    }

    public function cell_(){
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $list = $this->M_pivot->cell();
        $data = array();
        $no = $start;
        foreach($list->result() as $a){
            $no++;
            $data[] = array(
                $no, 
                $a->CELL_CODE,
                $a->PO_NO,
                $a->WORKDATE,
                $a->ART_NO,
                $a->MODEL_NAME,
                $a->QTY_ASS_IN,
                $a->DEFECT,
                number_format($a->DEFECT_RATE,2)
            );
        }
        $output = array(
            "draw"=> $draw,
            "recordsTotal" => $list->num_rows(),
            "recordsFiltered" => $list->num_rows(),
            "data" =>$data
        );
            echo json_encode($output);
    
    }

    public function edit_qty(){
        $edit = $this->M_pivot->edit_qty();
        echo json_encode($edit);
    }

    public function submit_pilih(){
        // Delete record
        $deleteids_arr = array();
        
        if(isset($_POST['deleteids_arr'])){
            $deleteids_arr = $_POST['deleteids_arr'];
        }
        try{
            foreach($deleteids_arr as $deleteid){
                
                $pos            = $this->M_pivot->get_PO($deleteid);
                $po             = $pos->PO_NO;
                $pivot_status   = $this->M_pivot->pivot_put($deleteid);//$this->M_pivot->get_dataPO($po);
                $update         = $this->M_pivot->update_status($deleteid, 'Y',$pivot_status);

                // if(($pivot_status=='200')||($pivot_status=='201')||($pivot_status=='204')){
                    // $this->M_pivot->update_status($deleteid,$pivot_status);
                // }else if($pivot_status=='404'){
                //     $this->M_pivot->update_status($deleteid,'X');
                // }
            }
            echo json_encode("Data sudah di Submit");
        } catch(Exception $e){
            $update         =  $this->M_pivot->update_status($deleteid, 'X','404');
            echo json_encode("Submit data Terhenti. Silahkan cek json");
        }
        
        exit;
    }

    public function submit_pilih_trial(){
        // Delete record
        $deleteids_arr = array();
        
        if(isset($_POST['deleteids_arr'])){
            $deleteids_arr = $_POST['deleteids_arr'];
        }
        try{
            foreach($deleteids_arr as $deleteid){
                
                $pos            = $this->M_pivot->get_PO($deleteid);
                $po             = $pos->PO_NO;
                $pivot_status   = $this->M_pivot->pivot_put_trial($deleteid);//$this->M_pivot->get_dataPO($po);
                $tqc_add        = $this->M_pivot->tqc_defect_json_trial($deleteid);
            }
            echo json_encode(array('berhasil'=> $pivot_status, 'tqc'=>$tqc_add));
        } catch(Exception $e){
            echo json_encode($e);
        }
        
        exit;
    }

    public function coba_pivot($po){
        $this->M_pivot->get_dataPO($po);
    }

    public function get_po_pivot(){
        $po     = $_POST['PO_NO'];
        $data   = $this->M_pivot->get_po_pivot($po);
        
        echo json_encode($data);
    }

    public function chart_defect(){
		$data['data'] 	= $this->M_pivot->chart_defect();
		$view = $this->load->view('Inspection/template_baru/pivot/chart_defect', $data);
		return $view;
	}
    

    public function aql_put($id){
        $this->etd_notif($id);
        try{
            
            $data    = $this->M_pivot->aql_pivot_put($id);
            $mes     = $this->M_pivot->update_mes($id);
            $update  = $this->M_pivot->edit_status_aql($id,'Y', $data);
            $this->aql_put_image_mcs($id);
            
            $url 	 = base_url().'index.php/C_aql_pivot/input_aql/';
            echo json_encode($url);
        } catch(Exception $e){
            $data    = $this->M_pivot->aql_pivot_put($id);
            $update  = $this->M_pivot->edit_status_aql($id,'N', $data);
            $url 	 = base_url().'index.php/C_aql_pivot/stat/'.$id;
            echo json_encode($url);
        }
        exit;
    }

    public function aql_put_rani($id){
        // $id='1606';
        try{
            $data    = $this->M_pivot->aql_pivot_put($id);
            // $mes     = $this->M_pivot->update_mes($id);
            $update  = $this->M_pivot->edit_status_aql($id,'R', $data);
            $this->aql_put_image_mcs($id);
            $url 	 = base_url().'index.php/C_aql_pivot/input_aql/';
            echo json_encode($data);
        } catch(Exception $e){
            $update  = $this->M_pivot->edit_status_aql($id,'N', '404');
            $url 	 = base_url().'index.php/C_aql_pivot/stat/'.$id;
            echo json_encode($e);
        }
        // echo json_encode($data);
        exit;
    }

    public function aql_put_rani_manual_kris($id){
        // $id='1606';
        try{
            $data    = $this->M_pivot->aql_pivot_put_manual($id);
            // $mes     = $this->M_pivot->update_mes($id);
            $update  = $this->M_pivot->edit_status_aql($id,'R', $data);
            $this->aql_put_image_mcs($id);
            $url 	 = base_url().'index.php/C_aql_pivot/input_aql/';
            echo json_encode($data);
        } catch(Exception $e){
            $update  = $this->M_pivot->edit_status_aql($id,'N', '404');
            $url 	 = base_url().'index.php/C_aql_pivot/stat/'.$id;
            echo json_encode($e);
        }
        // echo json_encode($data);
        exit;
    }

    public function tqc_put($id){
        $data = $this->M_pivot->pivot_put($id);
        echo json_encode($data);
    }

    public function data_pivot_coba(){
        $data = $this->coba->data_pivot_coba();
        echo $data;
    }

    public function tqc_defect_json($id){
        $send = $this->M_pivot->tqc_defect_json($id);
        echo json_encode($send);
    }


    public function aql_put_image_mcs($id)
    {
        $po                 = $this->M_pivot->get_image_aql($id);
        $reject             = $this->M_pivot->get_reject_aql($id);
        foreach($po as $p){
            $send           = $this->M_pivot->aql_put_image_mcs($p->PO_ID, $p->PHOTO_NAME);
        }
        foreach($reject as $r){
            $send_reject    = $this->M_pivot->aql_put_image_reject($r->PO_ID, $r->PHOTO_NAME);
        }
            //http://10.10.100.23/qip/index.php/C_pivot/aql_put_image_mcs/113
        // $id='113';
        // $po                 = $this->M_pivot->get_image_aql($id);
        // $reject             = $this->M_pivot->get_reject_aql($id);
        // foreach($po as $p){
        //     $send           = $this->M_pivot->aql_put_image_mcs('test_10113', $p->PHOTO_NAME);
        //     // echo json_encode($send);
        // }
        // foreach($reject as $r){
        //     $send_reject    = $this->M_pivot->aql_put_image_reject('test_10113', $r->PHOTO_NAME);
        //     // echo json_encode($send_reject);
        // }
    }

    public function get_notif(){
        $tanggal = date("Y-m-d");   
        $data['data'] = $this->M_pivot->get_notif_aql($tanggal);
        // $data['gedung'] = $this->M_pivot->get_notif_aql_gedung();
        $this->load->view('notifikasi', $data);
    }

    public function morning_notif(){
        $tanggal = date('Y-m-d',strtotime("-1 days"));
        $data['data'] = $this->M_pivot->get_notif_aql($tanggal);
        $this->load->view('notifikasi_morning', $data);
    }

    public function etd_notif($id){
        $data['data'] = $this->M_pivot->etd_notif($id);
        if($data['data'][0]['STATUS_PENGIRIMAN'] =='KELEBIHAN'){
            $this->load->view('notif_etd', $data);
        }
    }


}
