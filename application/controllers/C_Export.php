<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class C_Export extends CI_Controller {
	
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
       
		$this->load->model('M_Export');
		$this->load->model('M_pivot');
		// $this->load->library('Excel');
        
    }
	public function index(){
		$this->export();
	} 

	public function export()
	{
        $data['pagetitle']="EXPORT SCHEDULE";
		// // $tgl = '2020-08-18';
		$tgl = date('Y-m-d');
		// $tgl_lama = '2020-09-03';
		// //$subdata['container'] = count($ana);
		// if (($this->input->post('EXPORT_DATE', true)== $tgl)||($this->input->post('EXPORT_DATE', true)=== NULL)){
			
		// 	$subdata['ana']= $this->M_Export->total_container_today($tgl);
		// 	$subdata['query'] = $this->M_Export->tampil_exportss();

		// } elseif($this->input->post('EXPORT_DATE', true) <= $tgl_lama){

		// 	$tgl = $this->input->post('EXPORT_DATE', true);
		// 	$subdata['ana']= $this->M_Export->total_container_lama($tgl);
		// 	$subdata['query'] = $this->M_Export->export_schedule_lama($tgl);

		// }
		// else{

		// 	$tgl = $this->input->post('EXPORT_DATE', true);
		// 	$subdata['ana']= $this->M_Export->total_container($tgl);
		// 	$subdata['query'] = $this->M_Export->export_schedule($tgl);
		// }
		
		$subdata['formtitle'] = "EXPORT SCHEDULE TANGGAL ".$tgl;
		
		// $subdata['action']= site_url('C_Export/index');
		// $data['formtitle']="TODAY CONTAINER LOADING SCHEDULE <br>".$tgl;
		$this->load->view('template/header_awal', $data);
		$this->load->view('QIP/Export_Schedule/Export_schedule_coba',$subdata);
		$this->load->view('template/footer');

		// print_r($ana);
	}


	function get_data_country(){

		if($this->input->post('id')===null){
			$id = date('Y-m-d');
		}else{
			$id=$this->input->post('id');
		}
	    echo $this->M_Export->country($id);
	}
	
	function get_data_country_2($id){
		echo $this->M_Export->country($id);
    }

	function export_(){
		$tanggal    = $this->input->post('export_date');
        $country    = $this->input->post('country');
        $factory    = $this->input->post('factory');
		$hari_ini	= date('Y-m-d');

		// if($tanggal == $hari_ini){
		// 	$export 	= $this->M_Export->tampil_exportss($factory, $country);
		// }else{
		// 	$export		= $this->M_Export->export_schedule($tanggal, $factory, $country);
		// }

		$export 	= $this->M_Export->tampil_exportss($tanggal ,$factory, $country);
		
		$container 	= $this->M_Export->total_container($tanggal);
		
		echo json_encode(array('container'=>$container, 'export'=> $export));
	}
	


	public function admin()
	{
		$country ='';
		$level = $this->session->userdata('LEVEL');
		if(($level == 1)||($level == 2)){
			$factory = $this->session->userdata('FACTORY');
			$datasub['formtitle']="EXPORT SCHEDULE";
			$tgl = date('Y-m-d');
			if ( $this->input->post('EXPORT_DATE', true) == $tgl||($this->input->post('EXPORT_DATE', true)=== NULL)){
				// $tgl = date('Y-m-d');
				$subdata['query'] = $this->M_Export->tampil_exportss($tgl, $factory, $country);
			} else{
				$tgl = $this->input->post('EXPORT_DATE', true);
				$subdata['query'] = $this->M_Export->export_schedule($tgl);
			}
			$subdata['total_container'] = $this->M_Export->total_container($tgl);
			$subdata['formtitle'] = "EXPORT SCHEDULE TANGGAL ".$tgl;
			
			$subdata['action']= site_url('C_Export/admin');
			// $data['content'] = $this->load->view('QIP/Export_Schedule/Export_schedule_2',$subdata,true);
			// $subdata['action']= site_url('C_Export/admin');
			// $data['content'] = $this->load->view('QIP/Export_Schedule/Export_schedule_2',$subdata,true);
			// $this->load->view('template_admin',$data);

			$datasub['username'] = $this->session->userdata('USERNAME');
			$datasub['tingkat'] = $this->session->userdata('LEVEL');
			$this->load->view('template/header', $datasub);
			$this->load->view('QIP/Export_Schedule/Export_schedule_2',$subdata);
			$this->load->view('template/footer');

			// $this->load->view('template_admin',$data);
		}else{
			redirect('C_Login');
		}	
	}

	
	public function detail_export($po){
		$data['pagetitle'] = "EXPORT SCHEDULE PO".$po;
		$subdata['query'] = $this->M_Export->detail_po($po);
		$subdata['detail1'] = $this->M_Export->detail_po($po);
		$subdata['detail2'] = $this->M_Export->detail_size($po);
		$subdata['detail3'] = $this->M_Export->detail_carton($po);
		$subdata['detail4'] = $this->M_Export->last_carton($po);
		$subdata['detail5'] = '';//$this->M_Export->grey_carton($po);

		$this->load->view('template/header_awal');
		$this->load->view('QIP/Export_Schedule/Detail_Export',$subdata);
		$this->load->view('template/footer');
		
	}

	public function detail_export2($po){
		$data['pagetitle'] 		= "EXPORT SCHEDULE PO".$po;
		$subdata['query'] 		= $this->M_Export->detail_po($po);
		$subdata['detail1'] 	= $this->M_Export->detail_po($po);
		$subdata['detail2'] 	= $this->M_Export->detail_size($po);
		$subdata['detail3'] 	= $this->M_Export->detail_carton($po);
		$subdata['detail4'] 	= $this->M_Export->last_carton($po);
		$subdata['detail5'] 	= '';//$this->M_Export->grey_carton($po);
		$subdata['compliance'] 	= $this->M_Export->compliance($po);
		$subdata['bonding'] 	= $this->M_Export->bonding($po);
		$subdata['dev_stage'] 	= $this->M_Export->dev_stage($po);
		// $subdata['inspection'] 	= $this->M_Export->inspection($po);
		$subdata['inspection'] 	= array_values($this->M_pivot->get_po_pivot($po));
		$subdata['production'] 	= $this->M_Export->production($po);
		$subdata['costco'] 		= $this->M_Export->costco($po);
		$subdata['export'] 		= $this->M_Export->export($po);
		$subdata['quality'] 	= $this->M_Export->quality($po);

		$this->load->view('template/header_awal');
		$this->load->view('QIP/Export_Schedule/Detail_Export2',$subdata);
		$this->load->view('template/footer');
	}



	public function input_export()
	{
		$level = $this->session->userdata('LEVEL');
		if($level){
			$subdata['action']= site_url('C_Export/insert_export');
			$subdata['message'] = $this->session->flashdata('message');
			$datasub['username'] = $this->session->userdata('USERNAME');
			$datasub['tingkat'] = $this->session->userdata('LEVEL');
			
			$this->load->view('template/header', $datasub);
			$this->load->view('QIP/Export_Schedule/input', $subdata);
			$this->load->view('template/footer');
	
		}else{
			redirect('C_Login');
		}	

	}
	
	public function insert_export(){
		$data = array(
						'PO_NO' => $this->input->post('PO_NO'),
						'EXPORT_DATE' => date('Y-m-d'),
						'TYPE' => $this->input->post('TYPE'),
						'CONTAINER' => $this->input->post('CONTAINER'),
						'REMARK' => $this->input->post('REMARK'),
						'LMNT_DTTM'=> date("Y-m-d H:i:s")
		);
		$insert = $this->M_Export->insert_export($data);
		//echo $insert;
		if($insert == 1)
		{
			$this->session->set_flashdata('message', 'Berhasil yey');
		}else{
			$this->session->set_flashdata('message', 'Tidak Berhasil hmm');
		}
		redirect('C_Export/input_export');
	
	}

	public function insert_status($PO,$STATUS){
		$level = $this->session->userdata('LEVEL');
		if($level == 1){
			$level = $this->session->userdata('LEVEL');
			$factory = $this->session->userdata('FACTORY');
			$data = array(
							'PO_NO' => $PO,
							'STATUS_PO' => $STATUS
			);
			$insert = $this->M_Export->insert_status($data);
			redirect('C_Export/admin');
		}else{
			redirect('C_Login');
		}	

	}

	public function list_export(){
		$level = $this->session->userdata('LEVEL');
		if($level){
			$factory = $this->session->userdata('FACTORY');
			$data['pagetitle']="EXPORT SCHEDULE";
			$subdata['formtitle'] = "LIST DATA EXPORT SCHEDULE";
			$subdata['query'] = $this->M_Export->list_export();
			// $data['content'] = $this->load->view('QIP/Export_Schedule/List_Export',$subdata,true);
			// $this->load->view('template_admin',$data);

			$datasub['username'] = $this->session->userdata('USERNAME');
			$datasub['tingkat'] = $this->session->userdata('LEVEL');
			
			$this->load->view('template/header', $datasub);
			$this->load->view('QIP/Export_Schedule/List_Export', $subdata);
			$this->load->view('template/footer');

		}else{
			redirect('C_Login');
		}	
	}

	public function delete($id){
		$level = $this->session->userdata('LEVEL');
		if($level == 1){
			$this->M_Export->delete($id);
			redirect('C_Export/list_export/');
		}else{
			redirect('C_Login');
		}	
			
	}

	public function import_data(){
		$level = $this->session->userdata('LEVEL');
		if($level){
			$factory = $this->session->userdata('FACTORY');
			$data['pagetitle']="IMPORT TODAY EXPORT SCHEDULE";
			$subdata['formtitle'] = "IMPORT DATA EXPORT SCHEDULE";
			$subdata['query'] = $this->M_Export->list_export();
			// $data['content'] = $this->load->view('QIP/Export_Schedule/import',$subdata,true);
			// $this->load->view('template_admin',$data);

			$datasub['username'] = $this->session->userdata('USERNAME');
			$datasub['tingkat'] = $this->session->userdata('LEVEL');
			$datasub['formtitle'] = "IMPORT DATA EXPORT SCHEDULE";
			$this->load->view('template/header', $datasub);
			$this->load->view('QIP/Export_Schedule/import', $subdata);
			$this->load->view('template/footer');

		}else{
			redirect('C_Login');
		}	
	}

	public function list_po_import(){
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
	
			$list = $this->M_Export->list_po_import();
			$data = array();
			$no = $start;
			foreach($list->result() as $a){
				$no++;
				$data[] = array(
					$no,
					$a->CONTAINER,
					$a->FACTORY,
					$a->CELL_CODE,
					$a->PO_NO,
					$a->MODEL_NAME,
					$a->COUNTRY,
					$a->CUST_NO,
					$a->ARTICLE,
					$a->QTY,
					$a->SDD,
					$a->LOAD_TYPE,					
					$a->REMARK,
					$a->EXPORT_DATE,
					'<button type="button" class="btn btn-danger btn-xs po_delete"  id="'.$a->ID_EXPORT.'">Delete</button>
					 <button type="button" class="btn btn-success btn-xs po_edit" 
						 container="'.$a->CONTAINER.'" 
						 factory="'.$a->FACTORY.'" 
						 cell="'.$a->CELL_CODE.'" 
						 po_no="'.$a->PO_NO.'" 
						 model_name="'.$a->MODEL_NAME.'" 
						 country="'.$a->COUNTRY.'" 
						 cust_no="'.$a->CUST_NO.'" 
						 article="'.$a->ARTICLE.'" 
						 qty="'.$a->QTY.'" 
						 sdd="'.$a->SDD.'" 
						 load_type="'.$a->LOAD_TYPE.'" 
						 remark="'.$a->REMARK.'" 
						 id="'.$a->ID_EXPORT.'">Edit</button>',
						 
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

	public function list_po_import_validation(){
		$factory 	= $this->input->post('factory');
		$country 	= $this->input->post('country');
		$tanggal    = date('Y-m-d');

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$list = $this->M_Export->today_export($tanggal, $factory, $country);
		// $list = $this->M_Export->export_schedule('2020-09-08');
		$data = array();
		$no = $start;
		foreach($list->result() as $a){
			$no++;
			if(($a->COUNTRY == 'China')||($a->COUNTRY=='Japan')){
				$button = '<button type="button" class="btn btn-info btn-xs po_status" id_export="'.$a->ID_EXPORT.'" po="'.$a->PO_NO.'" status="RELEASE">Validation Pass</button>';
			}else{
				$button = '';
			}
			$data[] = array(
				
				$a->CONTAINER,
				$a->FACTORY,
				$a->CELL,
				$a->PO_NO,
				$a->MODEL_NAME,
				$a->COUNTRY,
				$a->ARTICLE,
				$a->QTY,
				$a->SDD,
				$a->LOAD_TYPE,					
				$a->REMARK,
				$a->STATUS_PO2,
				'<button type="button" class="btn btn-warning btn-xs po_status" id_export="'.$a->ID_EXPORT.'" po="'.$a->PO_NO.'" status="CANCEL">Cancel</button>',
				$button
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

	public function import()
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
			$createArray = array('CONTAINER','CELL_CODE','PO_NO', 'MODEL_NAME', 'COUNTRY','CUST_NO','ARTICLE','QTY','SDD','LOAD_TYPE','REMARK','EXPORT_DATE');
			$makeArray = array('CONTAINER'=>'CONTAINER','CELL_CODE' => 'CELL_CODE','PO_NO' => 'PO_NO', 'MODEL_NAME' => 'MODEL_NAME','COUNTRY' => 'COUNTRY', 'CUST_NO' => 'CUST_NO','ARTICLE' => 'ARTICLE', 'QTY' => 'QTY', 'SDD' => 'SDD', 'LOAD_TYPE' => 'LOAD_TYPE','REMARK'=>'REMARK', 'EXPORT_DATE'=>'EXPORT_DATE');
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
					$CONTAINER 	= $SheetDataKey['CONTAINER'];
					$CELL_CODE 	= $SheetDataKey['CELL_CODE'];
					$PO_NO 		= $SheetDataKey['PO_NO'];
					$MODEL_NAME = $SheetDataKey['MODEL_NAME'];
					$COUNTRY 	= $SheetDataKey['COUNTRY'];
					$CUST_NO 	= $SheetDataKey['CUST_NO'];
					$ARTICLE 	= $SheetDataKey['ARTICLE'];
					$QTY 		= $SheetDataKey['QTY'];
					$SDD 		= $SheetDataKey['SDD'];
					$LOAD_TYPE 	= $SheetDataKey['LOAD_TYPE'];
					$REMARK 	= $SheetDataKey['REMARK'];
					$EXPORT_DATE= $SheetDataKey['EXPORT_DATE'];


					$CONTAINER 	= filter_var(trim($allDataInSheet[$i][$CONTAINER]), FILTER_SANITIZE_STRING);
					$CELL_CODE 	= filter_var(trim($allDataInSheet[$i][$CELL_CODE]), FILTER_SANITIZE_STRING);
					$PO_NO 		= filter_var(trim($allDataInSheet[$i][$PO_NO]), FILTER_SANITIZE_STRING);
					$MODEL_NAME = filter_var(trim($allDataInSheet[$i][$MODEL_NAME]), FILTER_SANITIZE_EMAIL);
					$COUNTRY 	= filter_var(trim($allDataInSheet[$i][$COUNTRY]), FILTER_SANITIZE_STRING);
					$CUST_NO 	= filter_var(trim($allDataInSheet[$i][$CUST_NO]), FILTER_SANITIZE_STRING);
					$ARTICLE 	= filter_var(trim($allDataInSheet[$i][$ARTICLE]), FILTER_SANITIZE_STRING);
					$QTY 		= filter_var(trim($allDataInSheet[$i][$QTY]), FILTER_SANITIZE_STRING);
					$SDD 		= filter_var(trim($allDataInSheet[$i][$SDD]), FILTER_SANITIZE_STRING);
					$LOAD_TYPE 	= filter_var(trim($allDataInSheet[$i][$LOAD_TYPE]), FILTER_SANITIZE_STRING);
					$REMARK 	= filter_var(trim($allDataInSheet[$i][$REMARK]), FILTER_SANITIZE_STRING);
					$EXPORT_DATE= filter_var(trim($allDataInSheet[$i][$EXPORT_DATE]), FILTER_SANITIZE_STRING);
					$UPLOAD		= date('Y-m-d H:i:s');

					$fetchData[] = array( 'CONTAINER'=>$CONTAINER, 'CELL_CODE' => $CELL_CODE,'PO_NO' => $PO_NO, 'MODEL_NAME' => $MODEL_NAME,  'COUNTRY' => $COUNTRY, 'CUST_NO' => $CUST_NO, 'ARTICLE' => $ARTICLE, 'QTY' => $QTY, 'SDD' => $SDD, 'LOAD_TYPE' => $LOAD_TYPE,  'REMARK' => $REMARK, 'EXPORT_DATE' => $EXPORT_DATE);
				}   
				$data['dataInfo'] = $fetchData;
				$this->M_Export->setBatchImport($fetchData);
				$insert = $this->M_Export->importData();
				echo "IMPORT DATA BERHASIL";
				
			} else {
				echo "Please import correct file, did not match excel sheet column";
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

	  public function delete_po(){
		  $id = $this->input->post('ID_EXPORT');
		  $delete = $this->M_Export->delete_po($id);
		  echo json_encode($delete);
	  }

	  function update_po(){
        $data=$this->M_Export->update_po();
        echo json_encode($data);
    }
	
	//---------------------------list PO Cina, Jepang, India----------------------------------
	public function po_validation(){
		$level = $this->session->userdata('LEVEL');
		if($level == 6){
			$factory = $this->session->userdata('FACTORY');
			$data['pagetitle']="TODAY PO VALIDATION";
			$subdata['formtitle'] = "TODAY PO VALIDATION";
			$subdata['query'] = $this->M_Export->list_export_validation();
			// $data['content'] = $this->load->view('QIP/Export_Schedule/import_validation',$subdata,true);
			// $this->load->view('template_admin',$data);

			$datasub['username'] = $this->session->userdata('USERNAME');
			$datasub['tingkat'] = $this->session->userdata('LEVEL');
			$datasub['formtitle'] = "PO VALIDATION";
			$this->load->view('template/header', $datasub);
			$this->load->view('QIP/Export_Schedule/import_validation', $subdata);
			$this->load->view('template/footer');


		}else{
			redirect('C_Login');
		}	
	}

	public function list_po_validation(){
			$draw = intval($this->input->get("draw"));
			$start = intval($this->input->get("start"));
			$length = intval($this->input->get("length"));
	
			$list = $this->M_Export->list_export_validation();
			$data = array();
			$no = $start;
			foreach($list->result() as $a){
				$no++;
				$data[] = array(
					// $no,
					$a->CONTAINER,
					$a->FACTORY,
					$a->CELL_CODE,
					$a->PO_NO,
					$a->MODEL_NAME,
					$a->COUNTRY,
					$a->CUST_NO,
					$a->ARTICLE,
					$a->QTY,
					$a->SDD,
					$a->LOAD_TYPE,					
					$a->REMARK,
					$a->STATUS_PO,
					'<button type="button" class="btn btn-danger btn-xs po_status" id_export="'.$a->ID_EXPORT.'" po="'.$a->PO_NO.'" status="REPACKING">Repacking</button>
					 <button type="button" class="btn btn-success btn-xs po_status" id_export="'.$a->ID_EXPORT.'" po="'.$a->PO_NO.'" status="PASS">Pass</button>'
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

	public function status_validation(){
		$po 	= $this->input->post('PO_NO');
		$status = $this->input->post('STATUS');
		$id 	= $this->input->post('ID');

		$data 	= $this->M_Export->status_validation($po, $status, $id);

		echo json_encode($data);
	}

	public function inspect_balance()
	{
        $data['pagetitle']="PO TABLE BALANCE";
		$subdata['formtitle'] = "PO TABLE BALANCE";
		
		// $subdata['action']= site_url('C_Export/index');
		$data['pagetitle']="TODAY CONTAINER LOADING SCHEDULE <br>";
		$subdata['sdd']= $this->M_Export->sdd_all();
		// $data['content'] = $this->load->view('QIP/Export_Schedule/inspect_balance',$subdata,true);
		// $this->load->view('template2',$data);

		$this->load->view('template/header_awal');
		$this->load->view('QIP/Export_Schedule/inspect_balance', $subdata);
		$this->load->view('template/footer');

		// print_r($ana);
	}

	function get_data_sdd(){
		echo $this->M_Export->sdd(); 
	}

	
	function get_data_sdd_(){
		echo $this->M_Export->sdd2();
	}
	
	function get_data_factory(){
		echo $this->M_Export->factory_();
    }

	function inspect_balance_(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$list = $this->M_Export->inspect_balance();
		$data = array();
		$no = $start;
		foreach($list->result() as $a){
			$no++;
			$data[] = array(
				$no,
				$a->FACTORY,
				$a->CELL,
				'<a href="javascript:void(0);" class="view_detail" data-PO_NO="'.$a->PO_NO.'">'.$a->PO_NO.'</a>',
				$a->MODEL_NAME,
				$a->COUNTRY,
				$a->CUST_NO,
				$a->ART_NO,
				$a->TOTAL_QTY,
				$a->TOTAL_CARTON,
				$a->SDD,
				$a->LOAD_TYPE,					
				$a->CONTAINER,
				$a->EXPORT_DATE,
				$a->INSPECT_DATE,
				$a->BALANCE_CRTON,
				$a->STATUS_PO2
				

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

	public function search_po(){
		$data['pagetitle']="DETAIL PO";
		$subdata['formtitle'] = "PO TABLE BALANCE";
		$po='0126507022';
		$data['pagetitle']="TODAY CONTAINER LOADING SCHEDULE <br>";
		$subdata['po'] = $this->M_Export->po_list();
		$subdata['detail1'] = $this->M_Export->detail_po($po);
		$subdata['detail2'] = $this->M_Export->detail_size($po);
		$subdata['detail3'] = $this->M_Export->detail_carton($po);
		$subdata['detail4'] = $this->M_Export->last_carton($po);
		$subdata['detail5'] = '';//$this->M_Export->grey_carton($po);
		
		$this->load->view('template/header_awal');
		$this->load->view('QIP/Export_Schedule/search_po2', $subdata);
		// $this->load->view('QIP/Export_Schedule/search_po', $subdata);
		$this->load->view('template/footer');
	}

	public function detail_po(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->detail_po($po);

		echo json_encode($data);
	}

	public function detail_size(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->detail_size($po);

		echo json_encode($data);
	}

	public function last_carton(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->last_carton($po);

		echo json_encode($data);
	}

	public function carton_status(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->detail_carton($po);

		echo json_encode($data);
	}

	public function grey_carton(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->grey_carton($po);

		echo json_encode($data);
	}

	public function export_schedule(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->export($po);

		echo json_encode($data);
	}

	public function compliance(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->compliance($po);

		echo json_encode($data);
	}

	public function costco(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->costco($po);

		echo json_encode($data);
	}

	public function bonding(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->bonding($po);

		echo json_encode($data);
	}

	public function dev_stage(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->dev_stage($po);

		echo json_encode($data);
	}

	public function inspection(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->inspection($po);

		echo json_encode($data);
	}

	public function production(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->production($po);

		echo json_encode($data);
	}

	public function quality(){
		$po= $this->input->post('PO');
		$data 	= $this->M_Export->quality($po);

		echo json_encode($data);
	}

}
