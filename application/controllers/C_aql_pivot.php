<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_aql_pivot extends CI_Controller {

    public function __construct(){
        parent:: __construct(); 
        date_default_timezone_set('Asia/Jakarta');
       
		$this->load->model('M_aql_pivot');
		// $this->load->library('Excel');
		// sesscheck();
        
    }

	public function index()
	{
		sesscheck();
		$subdata['formtitle']="DAILY AQL INSPECTION";
		$subdata['sub']= 1;
		$this->load->view('template/header');
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/Daily_report', $subdata);
		$this->load->view('template/footer');

	}

	//------------------------page input aql---------------------------------------------------
    public function input_aql(){
		sesscheck();
		$level = $this->session->userdata('LEVEL');
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		if (($level == 2) ||($level == 1)){
			$datasub['formtitle'] = "AQL INPUT INSPECTOR";
		}else if ($level == 3){
			$datasub['formtitle'] = "AQL INPUT THIRD PARTY";
		}else if ($level == 6){
			$datasub['formtitle'] = "AQL INPUT VALIDATOR";
		}
		
		$subdata['sub']= 1;
		$subdata['inspector'] = $this->M_aql_pivot->inspector_list($level);
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/pivot/input_aql_new', $subdata);
		$this->load->view('template/footer');
    }

	// ----------------------------------tampil data dari pivot--------------------------------
	
	
    
    public function input_validation(){
		sesscheck();
		$level = $this->session->userdata('LEVEL');
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
        $datasub['formtitle']="AQL VALIDATION INPUT";
		$subdata['sub']= 1;
		$subdata['inspector'] = $this->M_aql_pivot->inspector_list($level);
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/validation_aql', $subdata);
		$this->load->view('template/footer');
    }
    
    function get_data_po(){
		sesscheck();
		// $po = $this->input->post('PO_NO');
        $dataPO = $this->M_aql_pivot->get_data_po($po);
        header('Content-Type: application/json');
        $jumlah_data = $dataPO->num_rows();
        if($jumlah_data == 0){
            echo json_encode(array('status'=>'error'));
        }else{
            echo json_encode(array('status'=>'ok','dataPO'=>($dataPO->row())));
        }
	}
	
	function get_partial($no){
		sesscheck();
		$data = array();
		echo json_encode($data);
	}

	function insert_partial(){
		sesscheck();
		$data = array(
			'PO_NO' => $_POST['PO_NO'],
			'PARTIAL' => $_POST['PARTIAL'],
            'QTY' => $_POST['QTY'],
            'INSPECTOR' => $this->session->userdata('USERNAME'),
			'LEVEL' => $_POST['LEVEL'],
			'INSPECT_DATE' => $_POST['INSPECT_DATE'],
			'LEVEL_USER' => $this->session->userdata('LEVEL'),
			// 'REMARK' => $_POST['REMARK']
		);
		//print_r($data);
		$insert = $this->M_aql_pivot->insert_partial($data);
		echo json_encode($insert);
	}

	function update_partial(){
		sesscheck();
        $data=$this->M_aql_pivot->update_partial();
        echo json_encode($data);
    }
 
	function list_partial(){
        sesscheck();

        $data = $this->M_aql_pivot->list_partial();
        echo json_encode($data);
	}

	function view_detail_per_partial(){
		sesscheck();
		$data = $this->M_aql_pivot->view_detail_per_partial();
		echo json_encode($data);
	}

	function aql_carton_cek_(){
		sesscheck();
		$po 		= $this->input->post('PO_NO');
		$partial 	= $this->input->post('PARTIAL');
		$qty 		= $this->input->post('QTY');
		$level 		= $this->input->post('LEVEL');
		
		// $cek_carton = $this->M_aql_inspect->aql_carton_cek($po, $partial, $level, $remark);
		$data	 	= $this->M_aql_pivot->random_belumsave($po, $partial, $level);
		echo json_encode($data);
	}

	function delete_random(){
		sesscheck();
		$data=$this->M_aql_pivot->delete_random();
        echo json_encode($data);
	}

	function edit_random(){
		sesscheck();
		$data=$this->M_aql_pivot->edit_random();
        echo json_encode($data);
	}


	function insert_random(){
		sesscheck();
		$po_edit 		= $_POST['PO'];
		$partial_edit 	= $_POST['partial'];
		$size_edit	 	= $_POST['size'];
		$ctn_no_edit 	= $_POST['ctn_no'];
		$ctn_qty_edit 	= $_POST['ctn_qty'];
		$qty_edit 		= $_POST['qty'];
		$level_edit 	= $_POST['level'];
		$data 			= array();

		
		$index = 0; 
		if(is_array($po_edit) || is_object($po_edit))
		{
			foreach($po_edit as $data_PO){ 
				array_push($data, array(
					'PO_NO'		=> $data_PO,
					'PARTIAL'	=> $partial_edit[$index],  
					'LEVEL'		=> $level_edit[$index],
					'CTN_QTY'	=> $ctn_qty_edit,
					'CTN_NO'	=> $ctn_no_edit,
					'SIZE' 		=> $size_edit[$index],
					'QTY'		=> $qty_edit[$index]
				));
				
				$index++;
			}

		}
		$po_edit1		= $po_edit[0];
		$partial_edit1	= $partial_edit[0];
		$level_edit1	= $level_edit[0];

		
		$sql 		= $this->M_aql_pivot->save_batch($data);
		echo json_encode($sql);

	}

	function save_first_data(){
		sesscheck();
		$po_edit 		= $_POST['PO'];
		$stage	 		= '2';
		$partial_edit 	= $_POST['partial'];
		$size_edit	 	= $_POST['size'];
		$ctn_no_edit 	= $_POST['ctn_no'];
		$ctn_qty_edit 	= $_POST['ctn_qty'];
		$qty_edit 		= $_POST['qty'];
		$level_edit 	= $_POST['level'];
		$data 			= array();
		$level_user		= $this->session->userdata('LEVEL');
		
		$index = 0; 
		
		$po_edit1		= $po_edit[0];
		$partial_edit1	= $partial_edit[0];
		$level_edit1	= $level_edit[0];
		$INSPECTOR 		= $this->session->userdata('USERNAME');

		$first_data 	= $this->M_aql_pivot->save_first_data($po_edit1, $partial_edit1, $level_edit1, $stage, $level_user, $INSPECTOR);
		$data_first 	= $first_data->row_array();
		$remark     	= $data_first['REMARK'];

		$url 			= base_url().'index.php/c_pivot_validation/validation/'.$po_edit1.'/'.$partial_edit1.'/'.$remark.'/'.$level_edit1.'/'.$level_user;
		
		echo json_encode(array('status'=>'simpan berhasil', 'url'=>$url));
	}

	
	public function report_guest(){
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		// $level_user	= $this->session->userdata('LEVEL');
		$level_user = $this->input->post('LEVEL_USER'); 
		$url 	= base_url().'index.php/C_aql_inspect/report_inspect_guest/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
        echo json_encode(array('status'=>'simpan berhasil', 'url'=>$url));
        // echo json_encode($url);
	}

	public function report_inspect($po, $partial, $remark, $level, $level_user){
		sesscheck();
		$datasub['formtitle']	="AQL REPORT";
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['sub']			= 1;
		$level_user2 			= $this->session->userdata('LEVEL');

		$subdata['report'] 		= $this->M_aql_pivot->report($po, $partial, $remark, $level, $level_user);
		$subdata['report2'] 	= $this->M_aql_pivot->report2($po, $partial, $remark, $level, $level_user, $level_user2);
		$subdata['report3'] 	= $this->M_aql_pivot->report3($po, $partial, $remark, $level, $level_user);
		$subdata['codenya'] 	= $this->M_aql_pivot->code_reject()->result_array();
	
		$subdata['id_qc'] 		= $this->M_aql_pivot->view_id_qc();

		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/report_inspect2', $subdata);
		$this->load->view('template/footer');
	}
	
	public function report_inspect_guest($po, $partial, $remark, $level, $level_user){
		$datasub['formtitle']	="AQL REPORT";
		$datasub['username'] = '';
		$datasub['tingkat'] = 0;
		$subdata['sub']			= 1;
		$level_user2 			= 3;

		$subdata['report'] 		= $this->M_aql_pivot->report($po, $partial, $remark, $level, $level_user);
		$subdata['report2'] 	= $this->M_aql_pivot->report2($po, $partial, $remark, $level, $level_user, $level_user2);
		$subdata['report3'] 	= $this->M_aql_pivot->report3($po, $partial, $remark, $level, $level_user);
		$subdata['codenya'] 	= $this->M_aql_pivot->code_reject()->result_array();
	
		$subdata['id_qc'] 		= $this->M_aql_pivot->view_id_qc();

		$this->load->view('template/header_awal', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/report_inspect_awal', $subdata);
		$this->load->view('template/footer');
	}
	
    public function report3_guest(){
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		$level_user2= 2;
		$level_user = $this->input->post('LEVEL_USER'); 
        
        $report2 = $this->M_aql_pivot->report2($po, $partial, $remark, $level, $level_user, $level_user2);
        
        echo json_encode($report2);
    }
    
    public function report4_guest(){
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		$level_user2= 2;
		$level_user = $this->input->post('LEVEL_USER'); 
        
        $report4 = $this->M_aql_pivot->report3($po, $partial, $remark, $level, $level_user);
        $code    = $this->M_aql_pivot->code_reject()->result();
        $report2 = $this->M_aql_pivot->report2($po, $partial, $remark, $level, $level_user, $level_user2);
        
        echo json_encode(array('report'=>$report4, 'code'=>$code, 'report2'=>$report2));
	}

    public function report1(){
		$po 	= $this->input->post('PO_NO'); 
		$partial= $this->input->post('PARTIAL'); 
		$remark = $this->input->post('REMARK'); 
		$level 	= $this->input->post('LEVEL'); 
		// $level_user	= $this->session->userdata('LEVEL');
		$level_user = $this->input->post('LEVEL_USER'); 
        
        $report1 = $this->M_aql_pivot->report($po, $partial, $remark, $level, $level_user)->row_array();
        
        echo json_encode($report1);
    }
    
    public function report2(){
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		// $level_user	= $this->session->userdata('LEVEL');
		$level_user = $this->input->post('LEVEL_USER'); 
        
        $report = $this->M_aql_pivot->report($po, $partial, $remark, $level, $level_user)->result();
        
        echo json_encode($report);
    }
    
    public function report3(){
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		$level_user2	= $this->session->userdata('LEVEL');
		$level_user = $this->input->post('LEVEL_USER'); 
        
        $report2 = $this->M_aql_pivot->report2($po, $partial, $remark, $level, $level_user, $level_user2);
        
        echo json_encode($report2);
    }
    
    public function report4(){
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		$level_user2	= $this->session->userdata('LEVEL');
		$level_user = $this->input->post('LEVEL_USER'); 
        
        $report4 = $this->M_aql_pivot->report3($po, $partial, $remark, $level, $level_user);
        $code    = $this->M_aql_pivot->code_reject()->result();
        $report2 = $this->M_aql_pivot->report2($po, $partial, $remark, $level, $level_user, $level_user2);
        
        echo json_encode(array('report'=>$report4, 'code'=>$code, 'report2'=>$report2));
	}

	public function confirm_inspector(){
		sesscheck();
        $PO_NO      = $this->input->post('PO_NO');
        $PARTIAL    = $this->input->post('PARTIAL');
        $REMARK     = $this->input->post('REMARK');
		$LEVEL      = $this->input->post('LEVEL');
		$LEVEL_U    = $this->input->post('LEVEL_USER');
        $USERID     = $this->input->post('INSPECTOR');
		// $FLAG       = $this->input->post('FLAG');
		$LEVEL_USER	= $this->session->userdata('LEVEL');
		$COMMENT	= $this->input->post('COMMENT');
		$ID_QC	= $this->input->post('ID_QC');
		
		

		if (($LEVEL_USER == 3) || ($LEVEL_USER == 2) || ($LEVEL_USER == 6) ){
			$FLAG = 1;
			if(is_null($ID_QC)){
				$input = $this->M_aql_pivot->input_id_qc($PO_NO, $PARTIAL, $REMARK, $LEVEL, $LEVEL_USER, $ID_QC);
			}else{
				foreach($ID_QC as $ID_QC2){ 
					$input = $this->M_aql_pivot->input_id_qc($PO_NO, $PARTIAL, $REMARK, $LEVEL, $LEVEL_USER, $ID_QC2);
				};
			}
			$data = $this->M_aql_pivot->confirm_inspector($PO_NO, $PARTIAL, $REMARK, $LEVEL, $USERID, $LEVEL_USER, $FLAG, $COMMENT, $LEVEL_U);
		} else if ($LEVEL_USER == 4){
			$FLAG = 2;
			$data = $this->M_aql_pivot->confirm_inspector_repre($PO_NO, $PARTIAL, $REMARK, $LEVEL, $USERID, $LEVEL_USER, $FLAG , $LEVEL_U);
		}else if ($LEVEL_USER == 5){
			$FLAG = 3;
			$data = $this->M_aql_pivot->confirm_inspector_repre($PO_NO, $PARTIAL, $REMARK, $LEVEL, $USERID, $LEVEL_USER, $FLAG , $LEVEL_U);
		}

		
        
        echo json_encode($data);
    }
    

    public function inspect_list(){
		sesscheck();
		$datasub['formtitle']	="AQL CONFIRM LIST";
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['sub']			= 1;
		
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/inspect_list', $subdata);
		$this->load->view('template/footer');
    }

    public function inspect_list_(){
		sesscheck();
        $draw 			= intval($this->input->get("draw"));
		$start 			= intval($this->input->get("start"));
        $length	 		= intval($this->input->get("length"));
       
		$flag		   = $this->session->userdata('LEVEL');
		$inspect_list  = $this->M_aql_pivot->inspect_list($flag);
		$data          = array();
		$no            = $start;
		
        
        $inspector     = $this->session->userdata('USERNAME');
		
		foreach ($inspect_list->result() as $A){
			// if (($flag==2)){
			// 	$b = 	'<button type="button" class="btn btn-warning btn-xs view"  data-PO="'.$A->PO_NO.'" data-PARTIAL="'.$A->PARTIAL.'" data-REMARK="'.$A->REMARK.'" data-LEVEL="'.$A->LEVEL.'" data-LEVEL_USER="'.$A->LEVEL_USER.'">View Report</button>
			// 	<button type="button" class="btn btn-info btn-xs ic"  data-PO="'.$A->PO_NO.'" data-PARTIAL="'.$A->PARTIAL.'" data-REMARK="'.$A->REMARK.'" data-LEVEL="'.$A->LEVEL.'" data-LEVEL_USER="'.$A->LEVEL_USER.'">View IC</button>
			// 	<button type="button" class="btn btn-success btn-xs confirm" data-PO="'.$A->PO_NO.'" data-PARTIAL="'.$A->PARTIAL.'" data-REMARK="'.$A->REMARK.'" data-LEVEL="'.$A->LEVEL.'" data-FLAG="'.$flag.'" data-INSPECTOR="'.$inspector.'">Confirm</button>';
			// }
			// else 
			if(($flag==2)||($flag == 3) || ($flag == 1)){
				$b = 	'<button type="button" class="btn btn-warning btn-xs view"  data-PO="'.$A->PO_NO.'" data-PARTIAL="'.$A->PARTIAL.'" data-REMARK="'.$A->REMARK.'" data-LEVEL="'.$A->LEVEL.'" data-LEVEL_USER="'.$A->LEVEL_USER.'">View Report</button>
				<button type="button" class="btn btn-info btn-xs ic"  data-PO="'.$A->PO_NO.'" data-PARTIAL="'.$A->PARTIAL.'" data-REMARK="'.$A->REMARK.'" data-LEVEL="'.$A->LEVEL.'" data-LEVEL_USER="'.$A->LEVEL_USER.'">View IC</button>
				';
			}else{
				$b = 	'<button type="button" class="btn btn-warning btn-xs view"  data-PO="'.$A->PO_NO.'" data-PARTIAL="'.$A->PARTIAL.'" data-REMARK="'.$A->REMARK.'" data-LEVEL="'.$A->LEVEL.'" data-LEVEL_USER="'.$A->LEVEL_USER.'">View Report</button>
				<button type="button" class="btn btn-info btn-xs ic"  data-PO="'.$A->PO_NO.'" data-PARTIAL="'.$A->PARTIAL.'" data-REMARK="'.$A->REMARK.'" data-LEVEL="'.$A->LEVEL.'" data-LEVEL_USER="'.$A->LEVEL_USER.'">View IC</button>
				<button type="button" class="btn btn-success btn-xs confirm" data-PO="'.$A->PO_NO.'" data-PARTIAL="'.$A->PARTIAL.'" data-REMARK="'.$A->REMARK.'" data-LEVEL="'.$A->LEVEL.'" data-FLAG="'.$flag.'" data-INSPECTOR="'.$inspector.'" data-LEVEL_USER="'.$A->LEVEL_USER.'">Confirm</button>';
			}
			$no++;
			$data[] = array(
				$A->PO_NO,
				$b,
				$A->PARTIAL,
                $A->REMARK_STATUS,
                $A->PARTIAL_QTY,
                $A->ARTICLE,
                $A->MODEL_NAME,
       
				$A->CONFIRM_REPRESENTATIVE,
                $A->CONFIRM_PRODUCTION_MANAGER,

                $A->LEVEL,
				$A->GENDER,
				$A->INSPECT_DATE,

				$A->LANDT,
				$A->ZHSDD,
				$A->CONFIRM_REPRESENTATIVE_DTTM,
				$A->CONFIRM_PRODUCTION_MANAGER_DTTM,
                $A->INSPECT_RESULT
				// ""
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $inspect_list->num_rows(), 
			"recordsFiltered" => $inspect_list->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
    }

	public function ic(){
		// sesscheck();
		$po 		= $this->input->post('PO_NO');
		$partial 	= $this->input->post('PARTIAL');
		$remark 	= $this->input->post('REMARK');
		$level 		= $this->input->post('LEVEL');
		$level_user	= $this->input->post('LEVEL_USER');
		// $level_user	= $this->session->userdata('LEVEL');

		$url 		= base_url().'index.php/c_aql_inspect/ic_view/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
		echo json_encode($url);

	}
 
	public function ic_guest(){
		// sesscheck();
		$po 		= $this->input->post('PO_NO');
		$partial 	= $this->input->post('PARTIAL');
		$remark 	= $this->input->post('REMARK');
		$level 		= $this->input->post('LEVEL');
		$level_user	= $this->input->post('LEVEL_USER');
		// $level_user	= $this->session->userdata('LEVEL');

		$url 		= base_url().'index.php/c_aql_inspect/ic_view_guest/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
		echo json_encode($url);

	}

	public function ic_view($po, $partial, $remark, $level, $level_user){
		// sesscheck();
		$datasub['formtitle'] = "INSPECTION CERTIFICATE" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['ic'] 		= $this->M_aql_pivot->ic_view($po, $partial, $remark, $level, $level_user);
		
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/ic_view', $subdata);
		$this->load->view('template/footer');
	}

	public function ic_view_guest($po, $partial, $remark, $level, $level_user){
		// sesscheck();
		$datasub['formtitle'] = "INSPECTION CERTIFICATE" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['ic'] 		= $this->M_aql_pivot->ic_view($po, $partial, $remark, $level, $level_user);
		
		$this->load->view('template/header_awal', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/ic_view', $subdata);
		$this->load->view('template/footer');
	}
	
	

	public function daily_report_inspection(){
		sesscheck();
		$datasub['formtitle'] = "DAILY AQL INSPECTION" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
				
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/inspect_report');
		$this->load->view('template/footer');
	}

	public function daily_report_inspection_(){
		sesscheck();
		$draw 			= intval($this->input->get("draw"));
		$start 			= intval($this->input->get("start"));
        $length	 		= intval($this->input->get("length"));
        
       	$inspect_list  = $this->M_aql_pivot->daily_report();
		$data          = array();
		$no            = $start;
	
		foreach ($inspect_list->result() as $A){
           
			$no++;
			$data[] = array(
				$no,
				$A->IC_NUMBER,
				$A->CELL,
                $A->MODEL_NAME,
                $A->ARTICLE,
				$A->PO_NO,
				
                $A->CustomerOrderNumber,
				$A->DESTINATION,
                $A->CUSTOMER,
                $A->TOTAL_QTY,
				$A->PARTIAL_QTY,
				   
				$A->LEVEL,
				$A->TOTAL_INSPECT,
				$A->MINOR_ACC,

				$A->MINOR_REJ_DATA,
				$A->MAJOR_ACC,
				$A->MAJOR_REJ_DATA,
				$A->CRITIC_ACC,
				$A->CRITIC_REJ_DATA,
				
				$A->INSPECTOR,
				$A->SDD,
				$A->INSPECT_DATE,
				$A->INSPECT_RESULT,
				$A->REJECT,
                
				// ""
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $inspect_list->num_rows(),
			"recordsFiltered" => $inspect_list->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
	}


	
	public function monthly_report_inspection(){
		$datasub['formtitle'] = "MONTHLY AQL REPORT" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
				
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/monthly_inspect_report');
		$this->load->view('template/footer');
	}

	public function monthly_report_inspection_(){
		$draw 			= intval($this->input->get("draw"));
		$start 			= intval($this->input->get("start"));
        $length	 		= intval($this->input->get("length"));
        
       	$inspect_list  = $this->M_aql_pivot->monthly_report();
		$data          = array();
		$no            = $start;
	
		foreach ($inspect_list->result() as $A){
           
			$no++;
			$data[] = array(
				$no,
				$A->IC_NUMBER,
				$A->CELL,
                $A->MODEL_NAME,
                $A->ARTICLE,
				$A->PO_NO,
				
                $A->CustomerOrderNumber,
				$A->DESTINATION,
                $A->CUSTOMER,
                $A->TOTAL_QTY,
				$A->PARTIAL_QTY,
				   
				$A->LEVEL,
				$A->TOTAL_INSPECT,
				$A->MINOR_ACC,

				$A->MINOR_REJ_DATA,
				$A->MAJOR_ACC,
				$A->MAJOR_REJ_DATA,
				$A->CRITIC_ACC,
				$A->CRITIC_REJ_DATA,
				
				$A->INSPECTOR,
				$A->SDD,
				$A->INSPECT_DATE,
				$A->INSPECT_RESULT,
				$A->REJECT,
				// str_replace(';', '<br /><br />', $A->REJECT),
                
				// ""
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $inspect_list->num_rows(),
			"recordsFiltered" => $inspect_list->num_rows(),
			"data" => $data
		);
		echo json_encode($output);

		// $data = $this->M_aql_pivot->monthly_report();
		// echo json_encode($data);
	}



	public function monthly_third_inspection(){
		$datasub['formtitle'] = "MONTHLY THIRD PARTY REPORT" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
				
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/monthly_third_report');
		$this->load->view('template/footer');
	}

	public function monthly_report_third_(){
		$draw 			= intval($this->input->get("draw"));
		$start 			= intval($this->input->get("start"));
        $length	 		= intval($this->input->get("length"));
        
       	$inspect_list  = $this->M_aql_pivot->monthly_third();
		$data          = array();
		$no            = $start;
	
		foreach ($inspect_list->result() as $A){
		
			$data[] = array(
				$A->IMPACTIVA,
				$A->FACTORY,
                $A->DESTINATION,
                $A->PO_NO,
				$A->ARTICLE,
				
                $A->MODEL_NAME,
				$A->TOTAL_QTY,
                $A->INSPECT_DATE,
                $A->INSPECTOR,
				$A->PARTIAL_QTY,
				   
				$A->TOTAL_INSPECT,
				$A->MINOR_ACC,
				$A->MINOR_REJ_DATA,
				$A->MAJOR_ACC,
				$A->MAJOR_REJ_DATA,
				$A->CRITIC_ACC,
				$A->CRITIC_REJ_DATA,
				
				$A->INSPECT_RESULT,
				$A->REJECT,
				$A->CELL
                
				// ""
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $inspect_list->num_rows(),
			"recordsFiltered" => $inspect_list->num_rows(),
			"data" => $data
		);
		echo json_encode($output);

		// $data = $this->M_aql_pivot->monthly_report();
		// echo json_encode($data);
	}

	public function summary_third(){
		sesscheck();
		$data1 = $this->M_aql_pivot->summary_third_total();
		$data2 = $this->M_aql_pivot->summary_third_defect();
		echo json_encode(array('haha1'=>($data1->row_array()), 'haha2'=>($data2->result())));
	}


	public function monthly_summary_third(){
		$datasub['formtitle'] = "MONTHLY THIRD PARTY SUMMARY" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
				
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/summary_third');
		$this->load->view('template/footer');
	}

	public function summary_third_fac(){
		$tanggal = $this->input->post('tanggal');
        $data = $this->M_aql_pivot->summary_third_fac($tanggal)->result();
        
        echo json_encode($data);
	}
	
	public function summary_third_date(){
		$tanggal = $this->input->post('tanggal');
        $data = $this->M_aql_pivot->summary_third_date($tanggal)->result();
        
        echo json_encode($data);
    }


	public function monthly_third_inspection_ys(){
		$datasub['formtitle'] = "MONTHLY THIRD PARTY INSPECTION" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['level_user']= '3';
		$subdata['level'] = 'II';
		$subdata['judul'] = 'MONTHLY THIRD PARTY INSPECTION-YS';
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/monthly_validator_report', $subdata);
		$this->load->view('template/footer');
	}


	public function monthly_report_validator(){
		$datasub['formtitle'] = "MONTHLY VALIDATON REPORT" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['judul'] = 'MONTHLY VALIDATION REPORT';	
		$subdata['level_user']= '5';
		$subdata['level'] = 'S4';		
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/monthly_validator_report', $subdata);
		$this->load->view('template/footer');
	}

	public function monthly_report_validator_ys(){
		$datasub['formtitle'] = "MONTHLY VALIDATON REPORT  - YS & SCCHO" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['judul'] = 'MONTHLY VALIDATION REPORT - YS & SCCHO';	
		$subdata['level_user']= '6';
		$subdata['level'] = 'S4';		
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/monthly_validator_report', $subdata);
		$this->load->view('template/footer');
	}

	public function monthly_report_validator_(){
		$draw 			= intval($this->input->get("draw"));
		$start 			= intval($this->input->get("start"));
        $length	 		= intval($this->input->get("length"));
        
       	$inspect_list  = $this->M_aql_pivot->monthly_validator();
		$data          = array();
		$no            = $start;
	
		foreach ($inspect_list->result() as $A){
		
			$data[] = array(
				$A->FACTORY,
				$A->CELL,
				$A->PO_NO,
                $A->PARTIAL_QTY,
				$A->PARTIAL,
				
				$A->INSPECT_DATE,
				$A->DESTINATION,
				$A->MODEL_NAME,
				$A->ARTICLE,
				
				$A->TOTAL_INSPECT,
				$A->RELEASE,
				$A->REJECT,
				$A->INSPECTOR,
				
				$A->REMARK,
				$A->MINOR_REJ_DATA,
				$A->MAJOR_REJ_DATA,
				$A->CRITIC_REJ_DATA,

				$A->A100,
				$A->A200,
				$A->A300,
				$A->A310,

				$A->A320,
				$A->A330,
				$A->A340,
				$A->A350,
				
				$A->A360,
				$A->A400,
				$A->A500,
				$A->A600,
				
				$A->A700,
				$A->A800,
				$A->A900,
				$A->A1000,
				
				$A->A1100,
				$A->A1200,
				$A->A1300,
				$A->TOTAL_DEFECT,
				$A->AQL_INSPECTOR,

				// ""
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $inspect_list->num_rows(),
			"recordsFiltered" => $inspect_list->num_rows(),
			"data" => $data
		);
		echo json_encode($output);

		// $data = $this->M_aql_pivot->monthly_report();
		// echo json_encode($data);
	}



	public function summary_aql(){
		sesscheck();
		$datasub['formtitle'] = "SUMMARY OF AQL INSPECTION" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
				
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/summary_aql');
		$this->load->view('template/footer');
	}

	public function summary_aql_(){
		sesscheck();
		//$level_user	= $this->session->userdata('LEVEL');
		
		$data = $this->M_aql_pivot->summary_aql();
		echo json_encode($data);
	}

	public function edit_carton(){
		sesscheck();
		$datasub['formtitle'] = "EDIT CARTON NUMBER" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/edit_carton');
		$this->load->view('template/footer');
	}

	public function edit_carton_(){
		sesscheck();
		$draw 			= intval($this->input->get("draw"));
		$start 			= intval($this->input->get("start"));
        $length	 		= intval($this->input->get("length"));
        
       	$inspect_list  = $this->M_aql_pivot->edit_carton();
		$data          = array();
		$no            = $start;
	
		foreach ($inspect_list->result() as $A){
           
			$no++;
			$data[] = array(
				$no,
				$A->PO_NO,
				$A->PARTIAL,
                $A->LEVEL,
                $A->REMARK,
				
				$A->CARTON_NO,
				$A->CARTON_QTY,
				$A->SIZE,
				$A->QTY_INSPECT,
				'<button type="button" class="btn btn-warning btn-xs edit"  data-PO="'.$A->PO_NO.'" data-PARTIAL="'.$A->PARTIAL.'"
				 	data-REMARK="'.$A->REMARK.'" data-LEVEL="'.$A->LEVEL.'" ctn_no="'.$A->CARTON_NO.'" 
					size="'.$A->SIZE.'" ctn_qty="'.$A->CARTON_QTY.'" qty_inspect="'.$A->QTY_INSPECT.'">Edit</button>'
               
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $inspect_list->num_rows(),
			"recordsFiltered" => $inspect_list->num_rows(),
			"data" => $data
		);
		// $output = $this->M_aql_pivot->edit_carton();
		echo json_encode($output);
	}

	public function edit_carton__(){
		sesscheck();
		$data = $this->M_aql_pivot->edit_carton_();
		echo json_encode($data);
	}

	public function export_excel(){
		// sesscheck();
		$po 		= $this->input->post('PO_NO');
		$partial 	= $this->input->post('PARTIAL');
		$remark 	= $this->input->post('REMARK');
		$level 		= $this->input->post('LEVEL');
		$level_user	= $this->input->post('LEVEL_USER');

		// $url 		= base_url().'index.php/C_report2/index/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
		// // echo json_encode($url);
		// echo json_encode(array('status'=>'simpan berhasil', 'url'=>$url));

		$url 		= base_url().'index.php/C_report2/index/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
		echo json_encode($url);

	}

	public function export_excel_ic(){
		// sesscheck();
		$po 		= $this->input->post('PO_NO');
		$partial 	= $this->input->post('PARTIAL');
		$remark 	= $this->input->post('REMARK');
		$level 		= $this->input->post('LEVEL');
		$level_user	= $this->input->post('LEVEL_USER');

		$url 		= base_url().'index.php/C_report_ic_excel/get_report/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
		echo json_encode($url);

	}

	public function lab_result(){
		sesscheck();
		$po 		= $this->input->post('PO_NO');
		
		$url 		= '<iframe src="http://10.10.10.98/qip/apps/?po=0126806913&art=&search=Search+PO" type="application/pdf" style="width: 100%; height: 500px; padding: 0;"></iframe>';
			
		echo json_encode($url);

	}

	public function view_detail_po(){
		$data = $this->M_aql_pivot->view_detail_po();
		echo json_encode($data);
	}

	public function po_reject(){
	
		$datasub['formtitle'] = "PO REJECT" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		
		$datasub['all'] 		= $this->M_aql_pivot->po_reject_all()->result_array();
		$datasub['cell'] 		= $this->M_aql_pivot->cell()->result_array();
		
		$this->load->view('template/header_awal', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/po_reject');
		$this->load->view('template/footer');
	}

	public function po_reject_summary(){
		$data = $this->M_aql_pivot->po_reject_all()->result();
		echo json_encode($data);
	}

	public function po_reject_byfactory(){
		$data = $this->M_aql_pivot->po_reject_byfactory()->result();
		echo json_encode($data);
	}

	public function po_reject_byname(){
		$data = $this->M_aql_pivot->po_reject_byname()->result();
		echo json_encode($data);
	}

	public function po_reject_detail(){ 
		$data = $this->M_aql_pivot->po_reject_detail();
		echo json_encode($data);
	}

	public function po_reject_detail_all(){ 
		$tanggal = $this->input->post('tanggal');

		$url 		= base_url().'index.php/C_Po_reject/index/'.$tanggal;
		echo json_encode($url);
		// po_reject_summary
	}

	public function packing_plan(){
		sesscheck();
		$datasub['formtitle'] = "PACKING PLAN" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/packing_plan');
		$this->load->view('template/footer');
	}

	public function packing_plan_(){
		$data = $this->M_aql_pivot->packing_plan();
		echo json_encode($data);
	}


	public function export_third(){
		sesscheck();
		$tanggal = $this->input->post('start_date');

		$url 		= base_url().'index.php/C_third_summary/index/'.$tanggal;
		echo json_encode($url);

	}

	public function summary_validation(){
		sesscheck();
		$data1 = $this->M_aql_pivot->summary_validation_total();
		$data2 = $this->M_aql_pivot->summary_validation_defect();
		echo json_encode(array('haha1'=>($data1->row_array()), 'haha2'=>($data2->result())));
		
	}

	public function summary_inspection(){
		$datasub['formtitle'] = "SUMMARY INSPECTION" ; 
		
		$this->load->view('template/header_awal', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/summary_inspection');
		$this->load->view('template/footer');
	}

	public function summary_inspection_(){
		$this->M_aql_pivot->summary_inspection();
		$data_tampil = $this->M_aql_pivot->summary_inspection_view();
		$data_tambah = $this->M_aql_pivot->summary_inspection_sum();
		$this->M_aql_pivot->drop_summary_inspection();
		echo json_encode(array('view_summary'=>$data_tampil, 'view_jumlah'=>$data_tambah));
	}

	public function input_repacking(){
		$datasub['formtitle'] = "INPUT REPACKING" ; 
		
		$this->load->view('template/header_awal', $datasub);
		$this->load->view('QIP/Inspection/template_baru/input_repacking');
		$this->load->view('template/footer');
	}

	public function input_repacking2(){
		//DataTables Variables
		$draw 	= intval($this->input->get("draw"));
		$start	= intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		
		$coba 	= $this->M_aql_pivot->list_repacking();
		$data 	= array();
		$no		= $start;
		foreach($coba->result() as $a){
			$no++;
			$data[] = array(
				$no,
				$a->PO_NO,
				$a->PARTIAL,
				$a->TANGGAL,
				$a->REJECT_DESC,
				// $a->STATUS_PO,
				// $a->MaxTime,
				'<button type="button" class="btn btn-primary btn-xs delete"  po="'.$a->PO_NO.'" partial="'.$a->PARTIAL.'">View Document</button>'
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


	public function import_repacking()
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
			$createArray = array('PO_NO','PARTIAL', 'STATUS', 'SIZE', 'QTY', 'TANGGAL');
			$makeArray = array('PO_NO'=>'PO_NO', 'PARTIAL'=>'PARTIAL', 'STATUS'=>'STATUS', 'SIZE'=>'SIZE', 'QTY'=>'QTY', 'TANGGAL'=>'TANGGAL');
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
					$PARTIAL 	= $SheetDataKey['PARTIAL'];
					$STATUS 	= $SheetDataKey['STATUS'];
					$SIZE 		= $SheetDataKey['SIZE'];
					$QTY 		= $SheetDataKey['QTY'];
					$TANGGAL 	= $SheetDataKey['TANGGAL'];

					$PO_NO 		= filter_var(trim($allDataInSheet[$i][$PO_NO]), FILTER_SANITIZE_STRING);
					$PARTIAL 	= filter_var(trim($allDataInSheet[$i][$PARTIAL]), FILTER_SANITIZE_STRING);
					$STATUS 	= filter_var(trim($allDataInSheet[$i][$STATUS]), FILTER_SANITIZE_STRING);
					$SIZE 		= filter_var(trim($allDataInSheet[$i][$SIZE]), FILTER_SANITIZE_STRING);
					$QTY 		= filter_var(trim($allDataInSheet[$i][$QTY]), FILTER_SANITIZE_STRING);
					$TANGGAL 	= filter_var(trim($allDataInSheet[$i][$TANGGAL]), FILTER_SANITIZE_STRING);
					$UPLOAD		= date('Y-m-d H:i:s');

					$fetchData[] = array( 'PO_NO' => $PO_NO, 'PARTIAL' => $PARTIAL, 'STATUS' => $STATUS, 'SIZE' => $SIZE, 'QTY' => $QTY, 'TANGGAL' => $TANGGAL, 'UPLOAD_TIME' => $UPLOAD);
				}   
				$data['dataInfo'] = $fetchData;
				$this->M_aql_pivot->setBatchImport($fetchData);
				$insert = $this->M_aql_pivot->importRepacking();
				// echo $fetchData;
				echo "IMPORT DATA BERHASIL";
				
			} else {
				echo "IMPORT DATA TIDAK BERHASIL, SILAHKAN CEK KEMBALI FILE YANG ADA IMPORT";
			}
			// $this->load->view('spreadsheet/display', $data);
		}       
		
	}

	public function import_defect()
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
			$createArray = array('PO_NO','PARTIAL', 'DEFECT', 'SIZE', 'QTY', 'TANGGAL', 'BGRADE', 'CGRADE');
			$makeArray = array('PO_NO'=>'PO_NO', 'PARTIAL'=>'PARTIAL', 'DEFECT'=>'DEFECT', 'SIZE'=>'SIZE', 'QTY'=>'QTY', 'TANGGAL'=>'TANGGAL', 'BGRADE'=>'BGRADE', 'CGRADE'=>'CGRADE');
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
					$PARTIAL 	= $SheetDataKey['PARTIAL'];
					$DEFECT 	= $SheetDataKey['DEFECT'];
					$SIZE 		= $SheetDataKey['SIZE'];
					$QTY 		= $SheetDataKey['QTY'];
					$TANGGAL 	= $SheetDataKey['TANGGAL'];
					$BGRADE 	= $SheetDataKey['BGRADE'];
					$CGRADE 	= $SheetDataKey['CGRADE'];

					$PO_NO 		= filter_var(trim($allDataInSheet[$i][$PO_NO]), FILTER_SANITIZE_STRING);
					$PARTIAL 	= filter_var(trim($allDataInSheet[$i][$PARTIAL]), FILTER_SANITIZE_STRING);
					$DEFECT 	= filter_var(trim($allDataInSheet[$i][$DEFECT]), FILTER_SANITIZE_STRING);
					$SIZE 		= filter_var(trim($allDataInSheet[$i][$SIZE]), FILTER_SANITIZE_STRING);
					$QTY 		= filter_var(trim($allDataInSheet[$i][$QTY]), FILTER_SANITIZE_STRING);
					$TANGGAL 	= filter_var(trim($allDataInSheet[$i][$TANGGAL]), FILTER_SANITIZE_STRING);
					$BGRADE 	= filter_var(trim($allDataInSheet[$i][$BGRADE]), FILTER_SANITIZE_STRING);
					$CGRADE 	= filter_var(trim($allDataInSheet[$i][$CGRADE]), FILTER_SANITIZE_STRING);
					$UPLOAD		= date('Y-m-d H:i:s');

					$fetchData[] = array( 'PO_NO' => $PO_NO, 'PARTIAL' => $PARTIAL, 'DEFECT' => $DEFECT, 'SIZE' => $SIZE, 'QTY' => $QTY, 'TANGGAL' => $TANGGAL, 'BGRADE' => $BGRADE, 'CGRADE' => $CGRADE, 'UPLOAD_TIME' => $UPLOAD);
				}   
				$data['dataInfo'] = $fetchData;
				$this->M_aql_pivot->setBatchImport($fetchData);
				$insert = $this->M_aql_pivot->importDefect();
				// echo $fetchData;
				echo "IMPORT DATA BERHASIL";
				
			} else {
				echo "IMPORT DATA TIDAK BERHASIL, SILAHKAN CEK KEMBALI FILE YANG ANDA IMPORT";
			}
			// $this->load->view('spreadsheet/display', $data);
		}       
		
	}

	public function view_repacking($PO){
		$datasub['formtitle'] = "VIEW REPACKING" ; 

		$data['po_info']	= $this->M_aql_pivot->po_info();
		$data['bgrade'] 	= $this->M_aql_pivot->bgrade();
		$data['repacking'] 	= $this->M_aql_pivot->repacking();
		$data['cgrade'] 	= $this->M_aql_pivot->cgrade();
		$data['defect'] 	= $this->M_aql_pivot->defect();
		$data['apa'] 		= $this->M_aql_pivot->defect_count();
		
		$this->load->view('template/header_awal', $datasub);
		$this->load->view('QIP/Inspection/template_baru/view_repacking', $data);
		$this->load->view('template/footer');
	}

	public function view_repacking_(){

		$this->M_aql_pivot->summary_inspection();
		$data_tampil = $this->M_aql_pivot->summary_inspection_view();
		$data_tambah = $this->M_aql_pivot->summary_inspection_sum();
		$this->M_aql_pivot->drop_summary_inspection();
		echo json_encode(array('view_summary'=>$data_tampil, 'view_jumlah'=>$data_tambah));
	}

	public function delete_inspection(){
		sesscheck();
		$datasub['formtitle'] = "DELETE INSPECTION RESULT" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/delete_inspection');
		$this->load->view('template/footer');
	}

	public function delete_inspection_(){
		sesscheck();
		$draw 			= intval($this->input->get("draw"));
		$start 			= intval($this->input->get("start"));
        $length	 		= intval($this->input->get("length"));
        
       	$inspect_list  = $this->M_aql_pivot->delete_inspection();
		$data          = array();
		$no            = $start;
	
		foreach ($inspect_list->result() as $A){
           if($A->INSPECT_RESULT=='Y'){
			   $b = '<div class="bg-success color-palette"><span>RELEASE</span></div>';

		   }else if($A->INSPECT_RESULT =='N'){
				$b = '<div class="bg-danger color-palette"><span>REJECT</span></div>';
		   }else{
			   $b = '';
		   }
			$no++;
			$data[] = array(
				$no,
				$A->PO_NO,
				$A->PARTIAL,
				$A->REMARK,
                $A->LEVEL,
                $A->LEVEL_USER,
				$A->INSPECTOR,
				$b,
				'<button type="button" class="btn btn-danger btn-xs delete"  data-PO="'.$A->PO_NO.'" data-PARTIAL="'.$A->PARTIAL.'"
				 	data-REMARK="'.$A->REMARK.'" data-LEVEL="'.$A->LEVEL.'" data-LEVEL_USER="'.$A->LEVEL_USER.'">Delete</button>'
               
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $inspect_list->num_rows(),
			"recordsFiltered" => $inspect_list->num_rows(),
			"data" => $data
		);
		// $output = $this->M_aql_pivot->edit_carton();
		echo json_encode($output);
	}

	public function delete_inspection__(){
		$po 		= $_POST["PO_NO"];
		$partial 	= $_POST["PARTIAL"];
		$level 		= $_POST["LEVEL"];
		$remark 	= $_POST["REMARK"];
		$level_user = $_POST["LEVEL_USER"];

		$this->M_aql_pivot->delete_inspection_($po, $partial, $level, $level_user, $remark);
		echo "Berhasil Delete Data";
	}

	public function import_pivot(){
		// $level = $this->session->userdata('LEVEL');
		// if($level){
			$factory = $this->session->userdata('FACTORY');
			$data['pagetitle']="IMPORT PIVOT RESULT";
			$subdata['formtitle'] = "IMPORT PIVOT RESULT";
			// $subdata['query'] = $this->M_aql_pivot->list_import_pivot();
			
			$datasub['username'] = $this->session->userdata('USERNAME');
			$datasub['tingkat'] = $this->session->userdata('LEVEL');
			$datasub['formtitle'] = "IMPORT PIVOT RESULT";
			$this->load->view('template/header', $datasub);
			$this->load->view('QIP/Inspection/template_baru/Aql_Report/import_pivot', $subdata);
			$this->load->view('template/footer');

		// }else{
		// 	redirect('C_Login');
		// }	
	}

	public function list_import_pivot(){
		sesscheck();
		$draw 			= intval($this->input->get("draw"));
		$start 			= intval($this->input->get("start"));
        $length	 		= intval($this->input->get("length"));
        
       	$import_pivot  = $this->M_aql_pivot->list_import_pivot();
		$data          = array();
		$no            = $start;
	
		foreach ($import_pivot->result() as $A){
           
			$no++;
			$data[] = array(
				$no,
				$A->PO_NO,
				$A->LEVEL_INSPECTOR,
				$A->INSPECT_DATE,
                $A->INSPECTOR,
                $A->RESULT,
				
				$A->REMARK,
				$A->GREY_CARTON,
				$A->UPLOAD_DATE,
				'<button type="button" class="btn btn-danger btn-xs delete"  data-ID="'.$A->ID_TRANSAKSI.'">Delete</button>'
               
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $import_pivot->num_rows(),
			"recordsFiltered" => $import_pivot->num_rows(),
			"data" => $data
		);
		
		echo json_encode($output);
	}

	public function import_pivot_()
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
			$createArray = array('PO_NO', 'LEVEL_INSPECTOR','INSPECT_DATE', 'INSPECTOR', 'RESULT', 'REMARK', 'GREY_CARTON');
			$makeArray = array('PO_NO'=>'PO_NO', 'LEVEL_INSPECTOR'=>'LEVEL_INSPECTOR','INSPECT_DATE'=>'INSPECT_DATE', 'INSPECTOR'=>'INSPECTOR', 'RESULT'=>'RESULT', 'REMARK'=>'REMARK', 'GREY_CARTON'=>'GREY_CARTON');
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
					$addresses 		= array();
					$PO_NO 				= $SheetDataKey['PO_NO'];
					$LEVEL_INSPECTOR	= $SheetDataKey['LEVEL_INSPECTOR'];
					$INSPECT_DATE 		= $SheetDataKey['INSPECT_DATE'];
					$INSPECTOR 			= $SheetDataKey['INSPECTOR'];
					$RESULT 			= $SheetDataKey['RESULT'];
					$REMARK 			= $SheetDataKey['REMARK'];
					$GREY_CARTON 		= $SheetDataKey['GREY_CARTON'];
					
					$PO_NO 			= filter_var(trim($allDataInSheet[$i][$PO_NO]), FILTER_SANITIZE_STRING);
					$LEVEL_INSPECTOR= filter_var(trim($allDataInSheet[$i][$LEVEL_INSPECTOR]), FILTER_SANITIZE_STRING);
					$INSPECT_DATE 	= filter_var(trim($allDataInSheet[$i][$INSPECT_DATE]), FILTER_SANITIZE_STRING);
					$INSPECTOR 		= filter_var(trim($allDataInSheet[$i][$INSPECTOR]), FILTER_SANITIZE_STRING);
					$RESULT 		= filter_var(trim($allDataInSheet[$i][$RESULT]), FILTER_SANITIZE_STRING);
					$REMARK 		= filter_var(trim($allDataInSheet[$i][$REMARK]), FILTER_SANITIZE_STRING);
					$GREY_CARTON 	= filter_var(trim($allDataInSheet[$i][$GREY_CARTON]), FILTER_SANITIZE_STRING);
					$UPLOAD			= date('Y-m-d H:i:s');

					$fetchData[] = array( 'PO_NO' => $PO_NO, 'LEVEL_INSPECTOR'=> $LEVEL_INSPECTOR, 'INSPECT_DATE' => $INSPECT_DATE, 'INSPECTOR' => $INSPECTOR, 'RESULT' => $RESULT, 'REMARK' => $REMARK, 'GREY_CARTON' => $GREY_CARTON, 'UPLOAD_DATE' => $UPLOAD);
				}   
				$data['dataInfo'] = $fetchData;
				$this->M_aql_pivot->setBatchImport($fetchData);
				$insert = $this->M_aql_pivot->importPivot();
				// echo $fetchData;
				$this->M_aql_pivot->send_to_mes();
				$this->M_aql_pivot->change_status();
				echo "IMPORT DATA BERHASIL";
				
			} else {
				echo "IMPORT DATA TIDAK BERHASIL, SILAHKAN CEK KEMBALI FILE YANG ANDA IMPORT";
			}
			// $this->load->view('spreadsheet/display', $data);
		}       
		
	}

	public function delete_import_pivot(){
		$delete = $this->M_aql_pivot->delete_import_pivot();
		echo json_encode($delete);
	}

	public function go_page(){
		$PO_NO       = $_POST['PO_NO'];
		$PARTIAL     = $_POST['PARTIAL'];
		$LEVEL       = $_POST['LEVEL'];
		$STAGE       = $_POST['STAGE'];
		$REMARK      = $_POST['REMARK'];
		$LEVEL_USER = $_POST['LEVEL_USER'];

		if ($STAGE == '2'){
			$url 			= base_url().'index.php/c_pivot_validation/validation/'.$PO_NO.'/'.$PARTIAL.'/'.$REMARK.'/'.$LEVEL.'/'.$LEVEL_USER;
		}else if ($STAGE == '3'){
			$url 			= base_url().'index.php/C_aql_reject/add_reject/'.$PO_NO.'/'.$PARTIAL.'/'.$REMARK.'/'.$LEVEL.'/'.$LEVEL_USER;
		}

		echo json_encode($url);
	}
}
