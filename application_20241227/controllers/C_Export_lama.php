<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        
    }

	public function index()
	{
        $data['pagetitle']="EXPORT SCHEDULE";
		
		//$subdata['container'] = count($ana);
		if ( $this->input->post('EXPORT_DATE', true) === NULL){
			$tgl = date('Y-m-d');
		} else{
			$tgl = $this->input->post('EXPORT_DATE', true);
		}
		$subdata['ana']= $this->M_Export->total_container($tgl);
		$subdata['formtitle'] = "EXPORT SCHEDULE TANGGAL ".$tgl;
		$subdata['query'] = $this->M_Export->tampil_exportss($tgl);
		//print_r($this->M_Export->tampil_exportss($tgl));
		$subdata['action']= site_url('C_Export/index');
		$data['pagetitle']="TODAY CONTAINER LOADING SCHEDULE <br>".$tgl;
		$data['content'] = $this->load->view('QIP/Export_Schedule/Export_schedule_coba',$subdata,true);
		$this->load->view('template2',$data);
		//echo $subdata['query'];
		//print_r($ana);
	}

	public function export_schedule(){
		if ( $this->input->post('EXPORT_DATE', true) === NULL){
			$tgl = date('Y-m-d');
		} else{
			$tgl = $this->input->post('EXPORT_DATE', true);
		}
		$data = $this->M_Export->tampil_exportss($tgl);
        echo json_encode($data);
	}


	public function admin()
	{
		$level = $this->session->userdata('LEVEL');
		$factory = $this->session->userdata('FACTORY');
		$subdata['formtitle'] = "EXPORT SCHEDULE ";
		$this->load->view('template/header');
		$this->load->view('QIP/Inspection/template_baru/export/Export_schedule',$subdata);
		$this->load->view('template/footer');
	}
	
	function list_export(){
		// if(empty($date)){
		// 	$date = date('Y-m-d');
		// } else{
		// 	$date;
		// }
        $data = $this->M_Export->tampil_exportss2();
        echo json_encode($data);
    }
	// public function list_export(){
	// 	$draw 			= intval($this->input->get("draw"));
	// 	$start 			= intval($this->input->get("start"));
	// 	$length	 		= intval($this->input->get("length"));
	// 	//$tgl = $_GET['EXPORT_DATE'];
	// 	if ($_GET['EXPORT_DATE'] !=''){
	// 		$tgl 			= $_GET['EXPORT_DATE'];
	// 	} else {
	// 		$tgl = date('Y-m-d');
	// 	}
		
	// 	$list_export 	= $this->M_Export->tampil_exportss2($tgl);
	// 	$data = array();
	// 	$no = $start;
	// 	foreach ($list_export->result() as $a){
	// 		$no++;
	// 		$data[] = array(
	// 			$a->CONTAINER,
	// 			$a->FACTORY,
	// 			$a->CELL,
	// 			'<a href ="'.site_url('C_Export/detail_export/'.$a->PO_NO).'" id="'.$a->PO_NO.'" class="po_detail">'.$a->PO_NO,
	// 			$a->MODEL_NAME,
	// 			$a->EXPORT_DATE,
	// 			$a->COUNTRY,
	// 			$a->ART_NO, 
	// 			$a->TOTAL_CARTON,
	// 			$a->SDD,
	// 			$a->TYPE,
	// 			$a->STATUS_PO2,
	// 			$a->REMARK,
	// 			'<div class="btn-group btn-group-sm" role="group" aria-label="First group">
	// 				<button style = "font-size: 80%;" type="button" class="btn btn-success release" id="'.$a->PO_NO.'">Release</button>
	// 				<button style ="font-size: 80%;" type="button" class="btn btn-danger reject" id="'.$a->PO_NO.'">Reject</button>
	// 				<button style ="font-size: 80%;" type="button" class="btn btn-secondary repacking" id="'.$a->PO_NO.'">Repacking</button>
	// 				<button style ="font-size: 80%;" type="button" class="btn btn-warning cancel" id="'.$a->PO_NO.'">Cancel</button>
	// 			</div>
			
	// 			'
	// 		);
	// 	}

	// 	$output = array(
	// 		"draw" => $draw,
	// 		"recordsTotal" => $list_export->num_rows(),
	// 		"recordsFiltered" => $list_export->num_rows(),
	// 		"data" => $data
	// 	);
	// 	echo json_encode($output);
	// }

	public function list_po_export(){
		$level = $this->session->userdata('LEVEL');
		$factory = $this->session->userdata('FACTORY');
		$subdata['formtitle'] = "PO EXPORT LIST ";
		$this->load->view('template/header');
		$this->load->view('QIP/Inspection/template_baru/export/list_export',$subdata);
		$this->load->view('template/footer');
	}
	public function list_po(){
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$list = $this->M_Export->list_export();
		$data = array();
		$no = $start;
		foreach($list->result() as $a){
			$no++;
			$data[] = array(
				$no,
				$a->PO_NO,
				$a->EXPORT_DATE,
				$a->TYPE,
				$a->CONTAINER,
				$a->REMARK,
				$a->LMNT_DTTM,
				'<button type="button" class="btn btn-danger btn-xs delete"  id="'.$a->ID_EXPORT.'">Delete</button>'
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

	
	public function detail_export($po){
		$data['pagetitle'] = "EXPORT SCHEDULE PO".$po;
		$subdata['query'] = $this->M_Export->detail_po($po);
		$subdata['detail1'] = $this->M_Export->detail_po($po);
		$subdata['detail2'] = $this->M_Export->detail_size($po);
		$subdata['detail3'] = $this->M_Export->detail_carton($po);
		$subdata['detail4'] = $this->M_Export->last_carton($po);
		$subdata['detail5'] = $this->M_Export->grey_carton($po);
		$data['content'] = $this->load->view('QIP/Export_Schedule/Detail_Export',$subdata,true);
		$this->load->view('template2',$data);
	}

	public function input_export()
	{
		$subdata['action']= site_url('C_Export/insert_export');
		$subdata['message'] = $this->session->flashdata('message');
		$data['content'] = $this->load->view('QIP/Export_Schedule/input', $subdata, true);
		$this->load->view('template_admin', $data);
	}
	
	public function insert_export(){
		$data = array(
					'PO_NO' 		=> $_POST['PO_NO'],
					'EXPORT_DATE' 	=> $_POST['DATE'],//date('Y-m-d'),
					'TYPE' 			=> $_POST['TYPE'],
					'CONTAINER' 	=> $_POST['CONTAINER'],
					'REMARK' 		=> $_POST['REMARK'],
					'LMNT_DTTM'		=> $_POST['LMNT_DTTM']//date("Y-m-d H:i:s")
				);
		$insert = $this->M_Export->insert_export($data);
		//print_r($data);
		echo json_encode($insert);
	}

	public function insert_status($PO,$STATUS){
		$level = $this->session->userdata('LEVEL');
		$factory = $this->session->userdata('FACTORY');
		$data = array(
						'PO_NO' => $PO,
						'STATUS_PO' => $STATUS
		);
		$insert = $this->M_Export->insert_status($data);
		redirect('C_Export/admin');
	}

	public function delete(){
		$this->M_Export->delete($_POST["ID_EXPORT"]);
		echo "Berhasil Delete Data";
	}

}
