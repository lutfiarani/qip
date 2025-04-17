<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Aql extends CI_Controller {

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
       
		$this->load->model('M_Aql');
		$this->load->library('Excel');
        sesscheck();
    }

	public function index()
	{
        $subdata['formtitle']="DAILY AQL INSPECTION";
		$subdata['sub']= 1;
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/Daily_report', $subdata);
		//Inspection\template_baru\Aql_Report
		$this->load->view('template/footer');

	}

	public function daily_report(){
		$draw 			= intval($this->input->get("draw"));
		$start 			= intval($this->input->get("start"));
		$length	 		= intval($this->input->get("length"));
		if($_GET['INSPECT_DATE'] !=''){
			$tgl = $_GET['INSPECT_DATE'];
		}else{
			$tgl = date('Y-m-d');
		}
		$daily_aql = $this->M_Aql->daily_summary($tgl);
		$data = array();
		$no = $start;
		foreach ($daily_aql->result() as $A){
			$no++;
			$data[] = array(
				
				$A->IC_NUMBER,
				$A->CustomerOrderNumber,
				$A->FACTORY,
				$A->CELL,
				$A->MODEL_NAME,
				$A->ARTICLE,
				$A->PO_NO,
				$A->PARTIAL,
				$A->COUNTRY,
				$A->PARTIAL_QTY,
				$A->LEVEL,
				$A->QTY_INSPECT1,
				$A->QIP_LEVEL_ACC,
				$A->QIP_LEVEL_REJECT,
				$A->INSPECT_DATE,
				$A->INSPECTOR_NAMA,     
				$A->REJECT_QTY,     
				$A->STATUS_REPORT,     
				""
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $daily_aql->num_rows(),
			"recordsFiltered" => $daily_aql->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
	}

	public function monthly_report(){
		$subdata['sub']=2;
		if ( $this->input->post('INSPECT_MONTH', true) === NULL){
			$month = date('Y-m');
		} else{
			$month = $this->input->post('INSPECT_MONTH', true);
		}
		$subdata['export']= site_url('C_Aql/export_excel/'.$month);
		$subdata['formtitle'] = "MONTHLY AQL INSPECTION ".$month;
		$this->M_Aql->monthly_summary($month);
		$subdata['query'] = $this->M_Aql->tampil_monthly_summary();
		$subdata['summary'] = $this->M_Aql->summary_inspection();
		$subdata['defect'] = $this->M_Aql->summary_defect($month);
		$subdata['action']= site_url('C_Aql/monthly_report/'.$month);
		$data['content'] = $this->load->view('QIP/Aql_Report/Monthly_report',$subdata,true);
		$this->load->view('template_admin',$data);
		$this->M_Aql->drop_monthly_summary();
	}

	public function monthly_defect()
	{
		$data['pagetitle'] = "MONTHLY DEFECT QTY";
		if ($this->input->post('INSPECT_DATE', true) === NULL){
			$month = date('Y-m');
		}else{
			$month = $this->input->post('INSPECT_DATE', true);
		}
		$subdata['formtitle'] = "DEFECT QTY REPORT MONTHLY ".$month;
		$this->M_Aql->monthly_defect($month);
		$subdata['query'] = $this->M_Aql->tampil_monthly_defect($month);
		$subdata['action'] = site_url('C_Aql/monthly_defect');
		$data['content'] = $this->load->view('QIP/Aql_Report/Monthly_defect', $subdata, true);
		$this->load->view('template_admin', $data);
		$this->M_Aql->hapus_monthly_defect();
	}	


	public function date_range_defect()
	{
		$data['pagetitle'] = "DEFECT QTY";
		if ($this->input->post('START_DATE', true) === NULL){
			$start_date = date('Y-m-d');
		}else{
			$start_date = $this->input->post('START_DATE', true);
		}

		if ($this->input->post('END_DATE', true) === NULL){
			$end_date = date('Y-m-d');
		}else{
			$end_date = $this->input->post('END_DATE', true);
		}

		$subdata['formtitle'] = "DEFECT QTY REPORT FROM  ".$start_date." TO ".$end_date;
		$this->M_Aql->defect_by_date($start_date, $end_date);
		$subdata['query'] = $this->M_Aql->tampil_defect_by_date();
		//$this->M_Aql->monthly_defect($month);
		//$subdata['query'] = $this->M_Aql->tampil_monthly_defect($month);
		$subdata['action'] = site_url('C_Aql/date_range_defect');
		$data['content'] = $this->load->view('QIP/Aql_Report/Monthly_defect', $subdata, true);
		$this->load->view('template_admin', $data);
		//$this->M_Aql->hapus_monthly_defect();
		$this->M_Aql->hapus_defect_by_date();
	}



	public function monthly_inspector(){
		$data['pagetitle'] = "MONTHLY AQL INSPECTOR CAPACITY";
		if ( $this->input->post('INSPECT_MONTH', true) === NULL){
			$month = date('Y-m');
		} else{
			$month = $this->input->post('INSPECT_MONTH', true);
		}
		$subdata['formtitle'] = "MONTHLY AQL INSPECTOR CAPACITY ".$month;
		$subdata['query'] = $this->M_Aql->monthly_inspector($month);
		$subdata['action'] = site_url('C_Aql/monthly_inspector');
		$data['content'] = $this->load->view('QIP/Aql_Report/Monthly_inspector', $subdata, true);
		$this->load->view('template_admin', $data);

	}


	public function export_excel($tgl){
		
		if (strlen($tgl) == 7){ //monthly
			$this->M_Aql->monthly_summary($tgl);
			$data = array( 'title' => 'Monthly_AQL_Report_'.$tgl,
				'query' => $this->M_Aql->tampil_monthly_summary(),
				'tgl' => $tgl,
				'formtitle' => 'MONTHLY AQL REPORT '.$tgl);
		} else if (strlen($tgl) == 10){ //daily
			$data = array( 'title' => "Daily_AQL_Report_".$tgl,
					'query' => $this->M_Aql->daily_summary($tgl),
					'tgl' => $tgl,
					'formtitle' => 'DAILY AQL REPORT '.$tgl);
			
		}
		$this->load->view('QIP/Aql_Report/export_excel',$data);
	}

	public function input(){
		$subdata['formtitle']="AQL INPUT";
		$subdata['sub']= 1;
		$subdata['inspector'] = $this->M_Aql->inspector_list();
		$this->load->view('template/header');
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/bstabletes', $subdata);
		//Inspection\template_baru\Aql_Report
		$this->load->view('template/footer');
	}

	public function input_aql(){
		$subdata['formtitle']="AQL INPUT";
		$subdata['sub']= 1;
		$subdata['inspector'] = $this->M_Aql->inspector_list();
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/input_aql', $subdata);
		//Inspection\template_baru\Aql_Report
		$this->load->view('template/footer');
	}
	
	
	
	//------------------------page input aql---------------------------------------------------
	function get_data_po($po){
        $dataPO = $this->M_Aql->get_data_po($po);
        header('Content-Type: application/json');
        $jumlah_data = $dataPO->num_rows();
        if($jumlah_data == 0){
            echo json_encode(array('status'=>'error'));
        }else{
            echo json_encode(array('status'=>'ok','dataPO'=>($dataPO->row())));
        }
	}
	
	function get_partial($no){
		$data = array();
		echo json_encode($data);
	}

	function insert_partial(){
		$data = array(
			'PO_NO' => $_POST['PO_NO'],
			'PARTIAL' => $_POST['PARTIAL'],
			'INSPECTOR' => $_POST['INSPECTOR'],
			'QTY' => $_POST['QTY'],
			'LEVEL' => $_POST['LEVEL'],
			'INSPECT_DATE' => $_POST['INSPECT_DATE'],
			'REMARK' => $_POST['REMARK']
		);
		//print_r($data);
		$insert = $this->M_Aql->insert_partial($data);
		echo json_encode($insert);
	}

	function update_partial(){
        $data=$this->M_Aql->update_partial();
        echo json_encode($data);
    }
 
	function list_partial($po){
        $data = $this->M_Aql->list_partial($po);
        echo json_encode($data);
	}

	function aql_carton_cek_(){
		$po 		= $this->input->post('PO_NO');
		$partial 	= $this->input->post('PARTIAL');
		$qty 		= $this->input->post('QTY');
		$level 		= $this->input->post('LEVEL');
		$remark 	= $this->input->post('REMARK');
		// $cek_carton = $this->M_Aql->aql_carton_cek($po, $partial, $level, $remark);
		$data	 	= $this->M_Aql->random_belumsave($po, $partial, $level, $remark);
		echo json_encode($data);
	}

	function delete_random(){
		$data=$this->M_Aql->delete_random();
        echo json_encode($data);
	}

	function edit_random(){
		$data=$this->M_Aql->edit_random();
        echo json_encode($data);
	}


	function insert_random(){
		$po_edit 		= $_POST['PO'];
		$partial_edit 	= $_POST['partial'];
		$size_edit	 	= $_POST['size'];
		$ctn_no_edit 	= $_POST['ctn_no'];
		$ctn_qty_edit 	= $_POST['ctn_qty'];
		$qty_edit 		= $_POST['qty'];
		$level_edit 	= $_POST['level'];
		$remark			= $_POST['remark'];;
		$data 			= array();

		$po_edit1		= $po_edit[0];
		$partial_edit1	= $partial_edit[0];
		$level_edit1	= $level_edit[0];
		$remark1		= $remark[0];
		
		$cek_carton 	= $this->M_Aql->aql_carton_cek($po_edit1, $partial_edit1, $level_edit1, $remark1);

		// echo $cek_carton;

		if ($cek_carton === 0 ){
			$index = 0; 
			if(is_array($po_edit) || is_object($po_edit))
			{
				foreach($po_edit as $data_PO){ 
					array_push($data, array(
						'PO_NO'		=> $data_PO,
						'PARTIAL'	=> $partial_edit[$index],  
						'LEVEL'		=> $level_edit[$index],
						'SIZE' 		=> $size_edit[$index],
						'CTN_QTY'	=> $ctn_qty_edit[$index],
						'CTN_NO'	=> $ctn_no_edit[$index],
						'QTY'		=> $qty_edit[$index],
						'REMARK'	=> $remark[$index]
					));
					
					$index++;
				}

			}

			
			$sql 		= $this->M_Aql->save_batch($data);
			$first_data = $this->M_Aql->save_first_data($po_edit1, $partial_edit1, $level_edit1, $remark1);
			
			$url 		= base_url().'index.php/c_aql/add_reject/'.$po_edit1.'/'.$partial_edit1.'/'.$remark1.'/'.$level_edit1;
			echo json_encode(array('status'=>'simpan berhasil', 'url'=>$url));
			
			
		
		}else{
			$url = base_url().'index.php/c_aql/input_aql';
			echo json_encode(array('status'=>'Data Gagal disimpan', 'url'=>$url));
			
		}
	
	}

	

	//-------------------PAGE REJECT AQL----------------------------------
	public function add_reject($po, $partial, $remark, $level){
		$subdata['formtitle']="AQL REJECT INPUT";
		$subdata['sub']= 1;
		$subdata['inspector'] = $this->M_Aql->inspector_list();
		$subdata['basic'] = $this->M_Aql->aql_report_basic_info($po, $partial, $remark, $level);
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/add_reject', $subdata);
		$this->load->view('template/footer');
	}

	public function aql_report_basic_info(){
		$dataPO = $this->M_Aql->aql_report_basic_info();
       	echo json_encode($dataPO);
		
	}

	public function aql_report_basic_info_(){
		$dataPO = $this->M_Aql->aql_report_basic_info();
       	echo json_encode($dataPO);
		
	}

	public function detail_reject_code(){
		$data = $this->M_Aql->detail_reject_code();
		echo json_encode($data);
	}

	public function input_reject(){
		$data = $this->M_Aql->input_reject();
		echo json_encode($data);
	}


	public function report_(){
		$po 	= $this->input->post('PO_NO'); 
		$partial= $this->input->post('PARTIAL'); 
		$remark = $this->input->post('REMARK'); 
		$level 	= $this->input->post('LEVEL'); 

		$url 	= base_url().'index.php/C_Aql/report_inspect/'.$po.'/'.$partial.'/'.$remark.'/'.$level;
		echo json_encode(array('status'=>'simpan berhasil', 'url'=>$url));
	}

	public function report_inspect($po, $partial, $remark, $level){
		$subdata['formtitle']	="AQL REPORT";
		$subdata['sub']			= 1;

		$subdata['report'] 		= $this->M_Aql->report();
		$subdata['report2'] 	= $this->M_Aql->report2();
		$subdata['report3'] 	= $this->M_Aql->report3();
		$subdata['codenya'] 	= $this->M_Aql->code_reject()->result_array();
		$subdata['confirm']		= $this->M_Aql->confirm_inspector();

		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/report_inspect', $subdata);
		$this->load->view('template/footer');
	}

	public function confirm_inspector(){
		$data = $this->M_Aql->confirm_inspector();
		echo json_encode($data);

	}

	
}
