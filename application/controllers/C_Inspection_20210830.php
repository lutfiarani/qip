<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Inspection extends CI_Controller {

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
       
		$this->load->model('M_Inspection');
		$this->load->model('M_Export');
        
    }

	public function index()
	{
        
		$ana= $this->M_Inspection->total_container();
		$container = count($ana);
		if ( $this->input->post('INSPECTION_DATE', true) === NULL){
			$tgl = date('Y-m-d');
		} else{
			$tgl = $this->input->post('INSPECTION_DATE', true);
		}
		
		
		$subdata['query'] = $this->M_Inspection->tampil_INSPECTIONss($tgl);
		$subdata['action']= site_url('C_INSPECTION/index');
		
		$subdata['formtitle'] = "INSPECTION SCHEDULE TANGGAL ".$tgl;
		$data['pagetitle']="TODAY CONTAINER LOADING SCHEDULE <br>".$tgl;
		$data['content'] = $this->load->view('QIP/INSPECTION_Schedule/Inspection_List_admin',$subdata,true);
		$this->load->view('template2',$data);
	}

	public function inspect_admin2(){
		if ( $this->input->post('INSPECTION_DATE', true) === NULL){
			$tgl = date('Y-m-d');
		} else{
			$tgl = $this->input->post('INSPECTION_DATE', true);
		}
		$data = $this->M_Inspection->tampil_INSPECTIONss($tgl);
        echo json_encode($data);

	}
	
	public function inspect_admin_()
	{
		$level = $this->session->userdata('LEVEL');
        $factory = $this->session->userdata('FACTORY');
		$po='';
		$subdata['query'] = $this->M_Inspection->search_loadplan($po);
		$data['pagetitle']="INSPECTION SCHEDULE";
		$subdata['formtitle'] = "CARI PO LOADPLAN";
		$subdata['action']= site_url('C_Inspection/search_inspect/');
        $data['content'] = $this->load->view('QIP/Inspection/cari_inspection',$subdata,true);
        $this->load->view('template_admin',$data);
	}
	
	public function inspect_admin(){
		$level = $this->session->userdata('LEVEL');
		$factory = $this->session->userdata('FACTORY');
		$subdata['formtitle'] =  " INSERT TODAY INSPECTION PO";
		$data['formtitle'] =  "INPUT PO";
		
		$data['username'] = $this->session->userdata('USERNAME');
		$data['tingkat'] = $this->session->userdata('LEVEL');
		
		$this->load->view('template/header', $data);
		$this->load->view('QIP/Inspection/template_baru/cari_inspection', $subdata);
		$this->load->view('template/footer');
	}

	public function today_inspect(){
		$draw 	= intval($this->input->get("draw"));
		$start 	= intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		$insp 	= $this->M_Inspection->today_inspect();
		$data	= array();
		$no		= $start;
		foreach($insp->result() as $a){
			$no++;
			$data[]	= array(
				$no,
				// $a->FACTORY,
				$a->PO_NO,
				// $a->MODEL_NAME,
				// $a->COUNTRY,
				// $a->ART_NO,
				// $a->TOTAL_QTY,
				// $a->TOTAL_CARTON,
				// $a->SDD,
				// $a->LOAD_TYPE,					
				// $a->CONTAINER,
				// $a->EXPORT_DATE,
				// $a->BALANCE_CRTON,
				// $a->STATUS_PO2,
				
				'<div class="time-label">
                <span class="bg-green">'.$a->INSPECT_DATE.'</span>
              </div>'

			
			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $insp->num_rows(),
			"recordsFiltered" => $insp->num_rows(),
			"data" => $data
		);
		
		echo json_encode($output);
	}

    public function inspect($fac)
	{
        $data['pagetitle']="INSPECTION SCHEDULE";
        if ( $this->input->post('INSPECT_DATE', true) === NULL){
			$tgl = date('Y-m-d');
		} else{
			$tgl = $this->input->post('INSPECT_DATE', true);
		}
		$subdata['formtitle'] = "INSPECTION SCHEDULE TANGGAL ".$tgl." GEDUNG ".$fac;
        $subdata['action']= site_url('C_Inspection/inspect/'.$fac);
        $this->M_Inspection->loadplan($tgl,$fac);
        $subdata['query'] = $this->M_Inspection->tampil_loadplan($tgl,$fac);
        $subdata['banyak'] = $this->M_Inspection->inspect_count($fac);
        // $data['content'] = $this->load->view('QIP/Inspection/Inspection_List_non_admin',$subdata,true);
        // $this->M_Inspection->drop_loadplan($fac);
		// $this->load->view('template2',$data);
		$this->load->view('template/header_awal', $data);
		$this->load->view('QIP/Inspection/Inspection_List_non_admin',$subdata);
		$this->load->view('template/footer');
	}

	public function inspect_all_building()
	{
        $data['pagetitle']="INSPECTION SCHEDULE";
        if ( $this->input->post('INSPECT_DATE', true) === NULL){
			$tgl = date('Y-m-d');
		} else{
			$tgl = $this->input->post('INSPECT_DATE', true);
		}
		$subdata['formtitle'] = "INSPECTION SCHEDULE TANGGAL ";
        $this->load->view('template/header_awal', $data);
		$this->load->view('QIP/Inspection/Inspection_List_non_admin_all',$subdata);
		$this->load->view('template/footer');
	}

	public function inspect_all_building_(){
		// $this->M_Inspection->inspect_all();

		// $draw 	= intval($this->input->get("draw"));
		// $start 	= intval($this->input->get("start"));
		// $length = intval($this->input->get("length"));
		
		// $data_tampil = $this->M_Inspection->inspect_all_view();
		// $data	= array();
		// $no		= $start;
		
		// foreach($data_tampil->result() as $a){
		// 	$no++;
		// 	$data[]	= array(
		// 		$no,
		// 		$a->FACTOR_CODE,
		// 		$a->PO_NO,
		// 		$a->MODEL_NAME,
		// 		$a->DESTINATION,
		// 		$a->COUNTRY,
		// 		$a->CUST_NO,
		// 		$a->ART_NO,
		// 		$a->TOTAL_QTY,
		// 		$a->TOTAL_CARTON,					
		// 		$a->SDD,
		// 		$a->LOAD_TYPE,
		// 		$a->CONTAINER,
		// 		$a->EXPORT_DATE,
		// 		$a->INSPECT_DATE_INPUT,
		// 		$a->STATUS_PO2
			
		// 	);
		// }
		// $output = array(
		// 	"draw" => $draw,
		// 	"recordsTotal" => $data_tampil->num_rows(),
		// 	"recordsFiltered" => $data_tampil->num_rows(),
		// 	"data" => $data
		// );
		 $this->M_Inspection->inspect_all();
		$data_tampil = $this->M_Inspection->inspect_all_view();
		$data_summary = $this->M_Inspection->inspect_all_count();
		$this->M_Inspection->drop_inspect_all();
		// $this->M_Inspection->drop_inspect_all();
		// echo json_encode($data_tambah);
		echo json_encode(array('view_all'=>$data_tampil, 'view_summary'=>$data_summary));
		// echo json_encode($data_tampil);
	}

	public function inspect_all_building2(){
		$data_tambah = $this->M_Inspection->inspect_all_count();
		// $this->M_Inspection->drop_inspect_all();
		echo json_encode($data_tambah);
	}

	public function inspect2($fac)
	{
        $data['pagetitle']="INSPECTION SCHEDULE";
        if ( $this->input->post('INSPECT_DATE', true) === NULL){
			$tgl = date('Y-m-d');
		} else{
			$tgl = $this->input->post('INSPECT_DATE', true);
		}
		$subdata['formtitle'] = "INSPECTION SCHEDULE TANGGAL ".$tgl." GEDUNG ".$fac;
        $subdata['action']= site_url('C_Inspection/inspect/'.$fac);
        $this->M_Inspection->loadplan($tgl,$fac);
        $subdata['query'] = $this->M_Inspection->tampil_loadplan($tgl,$fac);
        $subdata['banyak'] = $this->M_Inspection->inspect_count($fac);
        $data['content'] = $this->load->view('QIP/Inspection/Inspection_List_non_admin',$subdata,true);
        $this->M_Inspection->drop_loadplan($fac);
		$this->load->view('template/header');
		$this->load->view('QIP/Inspection/inspection_schedule',$subdata);
		$this->load->view('template/footer');
	}

	public function inspect_data($tgl,$fac){
		$this->M_Inspection->loadplan($tgl,$fac);
		$data_inspect = $this->M_Inspection->tampil_loadplan($tgl,$fac);
		$this->M_Inspection->drop_loadplan($fac);
        //$qty_inspect = $this->M_Inspection->inspect_count($fac);
		echo json_encode($data_inspect);
	}


	/*public function input_inspection($PO){
		$data = array(
            'PO_NO' => $PO
        );
		$insert = $this->M_Inspection->insert_inspection($data);
       
		if($insert == 1)
		{
			$this->session->set_flashdata('message', 'Berhasil yey');
		}else{
			$this->session->set_flashdata('message', 'Tidak Berhasil hmm');
		}
		redirect('C_Inspection/inspect_admin');
	}*/

	public function input_inspection(){
		$data = array(
            'PO_NO' => $_POST['PO_NO']
        );
		$insert = $this->M_Inspection->insert_inspection($data);
       
		echo json_encode($insert);
	}



	public function insert_status($PO,$STATUS){
		$data = array(
						'PO_NO' => $PO,
						'STATUS_PO' => $STATUS
		);
		$insert = $this->M_Inspection->insert_status($data);
		redirect('C_inspection/list_inspection');
	}

	public function list_inspection(){
		$level = $this->session->userdata('LEVEL');
		$factory = $this->session->userdata('FACTORY');
		$data['formtitle'] = "EDIT PO";
		$subdata['formtitle'] = "LIST DATA INSPECTION SCHEDULE";
		
		$data['username'] = $this->session->userdata('USERNAME');
		$data['tingkat'] = $this->session->userdata('LEVEL');
	
		$this->load->view('template/header', $data);
		$this->load->view('QIP/Inspection/template_baru/List_inspection_2',$subdata);
		$this->load->view('template/footer');
	}

	public function list_inspection_2(){
		//DataTables Variables
		$draw 	= intval($this->input->get("draw"));
		$start	= intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		$coba 	= $this->M_Inspection->list_inspection();
		$data 	= array();
		$no		= $start;
		foreach($coba->result() as $a){
			$no++;
			$data[] = array(
				$no,
				$a->PO_NO,
				'<div class="time-label">
                <span class="bg-green">'.$a->INSPECT_DATE.'</span>
              </div>',
				// $a->STATUS_PO,
				// $a->MaxTime,
				'<button type="button" class="btn btn-warning btn-xs delete"  id="'.$a->ID_INSPECTION.'">Delete</button>'
				//  <button type="button" class="btn btn-danger btn-xs update" name="update" id="'.$a->PO_NO.'">Update Reject</button>'
			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $coba->num_rows(),
			"recordsFiltered" => $coba->num_rows(),
			"data" => $data
		);
		
		echo json_encode($output);
		//exit();
	}

	public function delete_list_inspection(){
		$this->M_Inspection->delete($_POST["ID_INSPECTION"]);
		echo "Berhasil Delete Data";
	}

	public function update_status(){
		$data = array(
				'PO_NO' => $_POST['PO_NO'],
				'STATUS_PO' => $_POST['STATUS_PO']
		);
		$update = $this->M_Inspection->insert_status($data);
		echo json_encode($update);
	}

	public function delete($id){
		
		$this->M_Inspection->delete($id);
		redirect('C_Inspection/list_inspection/');
		
	}

	public function input_schedule_ppic(){
		$level = $this->session->userdata('LEVEL');
		$data['formtitle'] = "INPUT INSPECTION SCHEDULE";
		$subdata['formtitle'] = "INPUT INSPECTION SCHEDULE BY PO";
		
		$data['username'] = $this->session->userdata('USERNAME');
		$data['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['sdd']= $this->M_Export->sdd_all();
	
		$this->load->view('template/header', $data);
		$this->load->view('QIP/Inspection/template_baru/input_schedule_ppic',$subdata);
		$this->load->view('template/footer');
	}

	function get_data_factory(){
		echo $this->M_Export->factory_();
	}
	
	public function input_schedule_ppic_(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$list = $this->M_Inspection->input_schedule_ppic();
		$data = array();
		$no = $start;
		foreach($list->result() as $a){
			$no++;
			$data[] = array(
				$no,
				$a->FACTORY,
				'<a href="javascript:void(0);" class="view_detail" data-PO_NO="'.$a->PO_NO.'">'.$a->PO_NO.'</a>',
				$a->MODEL_NAME,
				$a->COUNTRY,
				$a->ART_NO,
				$a->TOTAL_QTY,
				$a->TOTAL_CARTON,
				$a->SDD,
				$a->LOAD_TYPE,					
				$a->CONTAINER,
				$a->EXPORT_DATE,
				$a->BALANCE_CRTON,
				$a->STATUS_PO2,
				'<div class="time-label">
                <span class="bg-green">'.$a->INSPECT_STATUS.'</span>
              </div>',
				'<div class="time-label">
                <span class="bg-green">'.$a->INSPECT_DATE.'</span>
              </div>',
				'<button type="button" class="btn btn-success btn-xs inspect" po="'.$a->PO_NO.'" status="PASS">Inspect</button>'

			
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
 
	public function multiple_update(){
		$level = $this->session->userdata('LEVEL');
		$data['formtitle'] = "INPUT SCHEDULE FROM INSPECTED & REJECTED  PO";
		$subdata['formtitle'] = "INPUT SCHEDULE FROM INSPECTED & REJECTED  PO";
		
		$data['username'] = $this->session->userdata('USERNAME');
		$data['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['po']= $this->M_Inspection->not_inspected_po();
	
		$this->load->view('template/header', $data);
		$this->load->view('QIP/Inspection/template_baru/not_inspected_po',$subdata);
		$this->load->view('template/footer');
	}

	function update_all()
	{
		if($this->input->post('checkbox_value'))
		{
			$id = $this->input->post('checkbox_value');
			for($count = 0; $count < count($id); $count++)
			{
				$this->M_Inspection->update_po($id[$count]);
			}
		}
	}


	public function import_po()
	{
		if(!empty($_FILES['file']['name'])) { 
			// get file extension
			$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

			if($extension == 'csv'){
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} elseif($extension == 'xlsx') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			// file path
			$spreadsheet = $reader->load($_FILES['file']['tmp_name']);
			$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
								
			// array Count
			$arrayCount = count($allDataInSheet);
			$flag = 0;
			$createArray = array('NO','PO_NO');
			$makeArray = array('NO'=>'NO','PO_NO'=>'PO_NO');
			$SheetDataKey = array();
			foreach ($allDataInSheet as $dataInSheet) {
				foreach ($dataInSheet as $key => $value) {
					if (in_array(trim($value), $createArray)) {
						$value = preg_replace('/\s+/', '', $value);
						$SheetDataKey[trim($value)] = $key;
					} 
				}
			}
			$dataDiff = array_diff_key($makeArray, $SheetDataKey);
			if (empty($dataDiff)) {
				$flag = 1;
			}
			// match excel sheet column
			if ($flag == 1) {
				for ($i = 2; $i <= $arrayCount; $i++) {
					$addresses 	= array();
					$PO_NO 		= $SheetDataKey['PO_NO'];

					$PO_NO 		= filter_var(trim($allDataInSheet[$i][$PO_NO]), FILTER_SANITIZE_STRING);
					$UPLOAD		= date('Y-m-d H:i:s');

					$fetchData[] = array( 'PO_NO' => $PO_NO, 'INSPECT_DATE' => $UPLOAD);
				}   
				$data['dataInfo'] = $fetchData;
				$this->M_Inspection->setBatchImport($fetchData);
				$insert = $this->M_Inspection->importData();
				echo "IMPORT DATA BERHASIL";
				
			} else {
				echo "IMPORT DATA TIDAK BERHASIL, SILAHKAN CEK KEMBALI FILE YANG ADA IMPORT";
			}
			// $this->load->view('spreadsheet/display', $data);
		}       
		
	}

	public function checkFileValidation($string) {
		$file_mimes = array('text/x-comma-separated-values', 
		  'text/comma-separated-values', 
		  'application/octet-stream', 
		  'application/vnd.ms-excel', 
		  'application/x-csv', 
		  'text/x-csv', 
		  'text/csv', 
		  'application/csv', 
		  'application/excel', 
		  'application/vnd.msexcel', 
		  'text/plain', 
		  'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
		);
		if(isset($_FILES['file']['name'])) {
			  $arr_file = explode('.', $_FILES['file']['name']);
			  $extension = end($arr_file);
			  if(($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['file']['type'], $file_mimes)){
				  return true;
			  }else{
				  $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
				  return false;
			  }
		  }else{
			  $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
			  return false;
		  }
	}
}
