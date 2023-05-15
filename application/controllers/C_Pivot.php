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
		// $this->load->library('Excel');
        
    }
	public function index(){
		sesscheck();
		$subdata['formtitle']="PIVOT INTERFACE";
        $subdata['username'] = $this->session->userdata('USERNAME');
		$subdata['tingkat'] = $this->session->userdata('LEVEL');

		$subdata['sub']= 1;
		$this->load->view('template/header', $subdata);
		$this->load->view('QIP/Pivot/interface_', $subdata);
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
        $data = $this->M_pivot->generate_data();
        echo json_encode('berhasil');
    }

    public function view_generate(){
        // $data = $this->M_pivot->view_generate();
        // echo json_encode($data);
       
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start")); 
        $length = intval($this->input->get("length"));

        $list = $this->M_pivot->view_generate();
        $data = array();
        $no = $start;
        foreach($list->result() as $a){
            if($a->STATUS_UPLOAD=='X'){
                $upload = 'NOT LINKED';
            }else{
                $upload = $a->STATUS_UPLOAD;
            }
            $no++; 
            if(($a->RESULT == 'FAIL') && ($a->STATUS_UPLOAD=='N')){
                $comment    = '<input type="text" id="comment" name="comment" value="'.$a->COMMENT.'">';
                $button     = '<button type="button" class="btn btn-primary btn-xs saveComment" id="saveComment" id_PO="'.$a->PO_ID.'">Save Comment</button>
                <button type="button" class="btn btn-warning btn-xs editData" id="editData" id_PO="'.$a->PO_ID.'">Edit Defect</button>';
                $check      = "<input type='checkbox' class='delete_check' id='delcheck_". $a->PO_ID."' onclick='checkcheckbox();' value='". $a->PO_ID."'>";
            }elseif (($a->RESULT == 'PASS') && ($a->STATUS_UPLOAD=='N')){
                $comment    = $a->COMMENT;
                $button     = '<button type="button" class="btn btn-warning btn-xs editData" id="editData" id_PO="'.$a->PO_ID.'">Edit Defect</button>';
                $check      = "<input type='checkbox' class='delete_check' id='delcheck_". $a->PO_ID."' onclick='checkcheckbox();' value='". $a->PO_ID."'>";
            }else{
                $comment    = $a->COMMENT;
                $button     = '';
                $check      = '';
            }
            $data[] = array(
                $no, 
                $check,
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
                $comment,
                // $a->STATUS_UPLOAD,
                $upload,
                $button,
                "<a href='http://10.10.100.23/qip_api_test/C_pivot_test_V1/index/".$a->PO_ID."' target='_blank'>view json</a>"
                
                
                
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

    public function submit_data(){
        // sesscheck();
        $tanggal    = $this->input->post('tanggal'); 
        $banyak     = $this->M_pivot->banyak_data($tanggal);
        $jml        = number_format($banyak->BANYAK);
        // $jml = 10;
        $data = $this->M_pivot->data_mes_all($tanggal);
        try{
            foreach($data as $d){
                $po_id = $d['PO_ID'];
                $po_no = $d['PO_NO'];
                $pivot_status = $this->M_pivot->get_dataPO($po_no);
             
                if($pivot_status=='200'){
                    $this->M_pivot->pivot_put($po_id);
                    $this->M_pivot->update_status($po_id,'Y');
                }else if($pivot_status=='404'){
                    $this->M_pivot->update_status($po_id,'X');
                }
                
            }echo json_encode("Berhasil Submit Data");
        } catch(Exception $e){
            echo json_encode("submit data terhenti. Silahkan cek json");

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
                $pivot_status   = $this->M_pivot->get_dataPO($po);

                if($pivot_status=='200'){
                    $this->M_pivot->pivot_put($deleteid);
                    $this->M_pivot->update_status($deleteid,'Y');
                }else if($pivot_status=='404'){
                    $this->M_pivot->update_status($deleteid,'X');
                }
            }
            echo json_encode("Berhasil Submit Data");
        } catch(Exception $e){
            echo json_encode("Submit data Terhenti. Silahkan cek json");
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
        $data = $this->M_pivot->aql_pivot_put($id);
        echo json_encode($data);
    }

    public function data_pivot_coba(){
        $data = $this->coba->data_pivot_coba();
        echo $data;
    }



}
