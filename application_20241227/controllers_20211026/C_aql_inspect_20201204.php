<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_aql_inspect extends CI_Controller {

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
       
		$this->load->model('M_aql_inspect');
		$this->load->library('Excel');
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
		$subdata['inspector'] = $this->M_aql_inspect->inspector_list($level);
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/input_aql', $subdata);
		$this->load->view('template/footer');
    }
    
    public function input_validation(){
		sesscheck();
		$level = $this->session->userdata('LEVEL');
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
        $datasub['formtitle']="AQL VALIDATION INPUT";
		$subdata['sub']= 1;
		$subdata['inspector'] = $this->M_aql_inspect->inspector_list($level);
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/validation_aql', $subdata);
		$this->load->view('template/footer');
    }
    
    function get_data_po($po){
		sesscheck();
        $dataPO = $this->M_aql_inspect->get_data_po($po);
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
		$insert = $this->M_aql_inspect->insert_partial($data);
		echo json_encode($insert);
	}

	function update_partial(){
		sesscheck();
        $data=$this->M_aql_inspect->update_partial();
        echo json_encode($data);
    }
 
	function list_partial(){
        sesscheck();

        $data = $this->M_aql_inspect->list_partial();
        echo json_encode($data);
	}

	function view_detail_per_partial(){
		sesscheck();
		$data = $this->M_aql_inspect->view_detail_per_partial();
		echo json_encode($data);
	}

	function aql_carton_cek_(){
		sesscheck();
		$po 		= $this->input->post('PO_NO');
		$partial 	= $this->input->post('PARTIAL');
		$qty 		= $this->input->post('QTY');
		$level 		= $this->input->post('LEVEL');
		
		// $cek_carton = $this->M_aql_inspect->aql_carton_cek($po, $partial, $level, $remark);
		$data	 	= $this->M_aql_inspect->random_belumsave($po, $partial, $level);
		echo json_encode($data);
	}

	function delete_random(){
		sesscheck();
		$data=$this->M_aql_inspect->delete_random();
        echo json_encode($data);
	}

	function edit_random(){
		sesscheck();
		$data=$this->M_aql_inspect->edit_random();
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
					'CTN_QTY'	=> $ctn_qty_edit[$index],
					'CTN_NO'	=> $ctn_no_edit[$index],
					'SIZE' 		=> $size_edit[$index],
					'QTY'		=> $qty_edit[$index]
				));
				
				$index++;
			}

		}
		$po_edit1		= $po_edit[0];
		$partial_edit1	= $partial_edit[0];
		$level_edit1	= $level_edit[0];

		
		$sql 		= $this->M_aql_inspect->save_batch($data);
		echo json_encode($sql);

	}

	function save_first_data(){
		sesscheck();
		$po_edit 		= $_POST['PO'];
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

		$first_data = $this->M_aql_inspect->save_first_data($po_edit1, $partial_edit1, $level_edit1, $level_user, $INSPECTOR);
		$data_first = $first_data->row_array();
		$remark     = $data_first['REMARK'];

		$url 		= base_url().'index.php/c_aql_inspect/add_reject/'.$po_edit1.'/'.$partial_edit1.'/'.$remark.'/'.$level_edit1.'/'.$level_user;
		echo json_encode(array('status'=>'simpan berhasil', 'url'=>$url));
	}

	

	//-------------------PAGE REJECT AQL----------------------------------
	public function add_reject($po, $partial, $remark, $level, $level_user){
		sesscheck();
		$datasub['formtitle']="AQL REJECT INPUT";
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['sub']= 1;
		$subdata['inspector'] = $this->M_aql_inspect->inspector_list($level_user);
		$subdata['basic'] = $this->M_aql_inspect->aql_report_basic_info($po, $partial, $remark, $level, $level_user);
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/add_reject', $subdata);
		//Inspection\template_baru\Aql_Report
		$this->load->view('template/footer');
	}

	public function aql_report_basic_info(){
		sesscheck();
		$dataPO = $this->M_aql_inspect->aql_report_basic_info();
       	echo json_encode($dataPO);
		
	}

	public function aql_report_basic_info_(){
		sesscheck();
		$dataPO = $this->M_aql_inspect->aql_report_basic_info();
       	echo json_encode($dataPO);
		
	}

	public function detail_reject_code(){
		sesscheck();
		$data = $this->M_aql_inspect->detail_reject_code();
		echo json_encode($data);
	}

	public function input_reject(){
		sesscheck();
		$level_user	= $this->session->userdata('LEVEL');

		$data = $this->M_aql_inspect->input_reject($level_user);
		echo json_encode('ok');
	}

	public function view_defect(){
		sesscheck();
		$data = $this->M_aql_inspect->view_defect();

		echo json_encode($data);
	}

	function delete_defect(){
		sesscheck();
		$data = $this->M_aql_inspect->delete_defect();

		echo json_encode($data);
	}


	public function report_(){
		sesscheck();
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		// $level_user	= $this->session->userdata('LEVEL');
		$level_user = $this->input->post('LEVEL_USER'); 

        $cek_second = $this->M_aql_inspect->cek_second_data($po, $partial, $level, $remark, $level_user);

        if ($cek_second->num_rows() > 0 ){
           
            $url 	= base_url().'index.php/C_aql_inspect/report_inspect/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
            

        }else{

            $save_second = $this->M_aql_inspect->save_second_data($po, $partial, $level, $remark, $level_user);
            $url 	= base_url().'index.php/C_aql_inspect/report_inspect/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
            

        }
        echo json_encode(array('status'=>'simpan berhasil', 'url'=>$url));
        // echo json_encode($url);
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

		$subdata['report'] 		= $this->M_aql_inspect->report($po, $partial, $remark, $level, $level_user);
		$subdata['report2'] 	= $this->M_aql_inspect->report2($po, $partial, $remark, $level, $level_user, $level_user2);
		$subdata['report3'] 	= $this->M_aql_inspect->report3($po, $partial, $remark, $level, $level_user);
		$subdata['codenya'] 	= $this->M_aql_inspect->code_reject()->result_array();
	
		$subdata['id_qc'] 		= $this->M_aql_inspect->view_id_qc();

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

		$subdata['report'] 		= $this->M_aql_inspect->report($po, $partial, $remark, $level, $level_user);
		$subdata['report2'] 	= $this->M_aql_inspect->report2($po, $partial, $remark, $level, $level_user, $level_user2);
		$subdata['report3'] 	= $this->M_aql_inspect->report3($po, $partial, $remark, $level, $level_user);
		$subdata['codenya'] 	= $this->M_aql_inspect->code_reject()->result_array();
	
		$subdata['id_qc'] 		= $this->M_aql_inspect->view_id_qc();

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
        
        $report2 = $this->M_aql_inspect->report2($po, $partial, $remark, $level, $level_user, $level_user2);
        
        echo json_encode($report2);
    }
    
    public function report4_guest(){
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		$level_user2= 2;
		$level_user = $this->input->post('LEVEL_USER'); 
        
        $report4 = $this->M_aql_inspect->report3($po, $partial, $remark, $level, $level_user);
        $code    = $this->M_aql_inspect->code_reject()->result();
        $report2 = $this->M_aql_inspect->report2($po, $partial, $remark, $level, $level_user, $level_user2);
        
        echo json_encode(array('report'=>$report4, 'code'=>$code, 'report2'=>$report2));
	}

    public function report1(){
		$po 	= $this->input->post('PO_NO'); 
		$partial= $this->input->post('PARTIAL'); 
		$remark = $this->input->post('REMARK'); 
		$level 	= $this->input->post('LEVEL'); 
		// $level_user	= $this->session->userdata('LEVEL');
		$level_user = $this->input->post('LEVEL_USER'); 
        
        $report1 = $this->M_aql_inspect->report($po, $partial, $remark, $level, $level_user)->row_array();
        
        echo json_encode($report1);
    }
    
    public function report2(){
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		// $level_user	= $this->session->userdata('LEVEL');
		$level_user = $this->input->post('LEVEL_USER'); 
        
        $report = $this->M_aql_inspect->report($po, $partial, $remark, $level, $level_user)->result();
        
        echo json_encode($report);
    }
    
    public function report3(){
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		$level_user2	= $this->session->userdata('LEVEL');
		$level_user = $this->input->post('LEVEL_USER'); 
        
        $report2 = $this->M_aql_inspect->report2($po, $partial, $remark, $level, $level_user, $level_user2);
        
        echo json_encode($report2);
    }
    
    public function report4(){
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		$level_user2	= $this->session->userdata('LEVEL');
		$level_user = $this->input->post('LEVEL_USER'); 
        
        $report4 = $this->M_aql_inspect->report3($po, $partial, $remark, $level, $level_user);
        $code    = $this->M_aql_inspect->code_reject()->result();
        $report2 = $this->M_aql_inspect->report2($po, $partial, $remark, $level, $level_user, $level_user2);
        
        echo json_encode(array('report'=>$report4, 'code'=>$code, 'report2'=>$report2));
	}

	public function confirm_inspector(){
		sesscheck();
        $PO_NO      = $this->input->post('PO_NO');
        $PARTIAL    = $this->input->post('PARTIAL');
        $REMARK     = $this->input->post('REMARK');
        $LEVEL      = $this->input->post('LEVEL');
        $USERID     = $this->input->post('INSPECTOR');
		// $FLAG       = $this->input->post('FLAG');
		$LEVEL_USER	= $this->session->userdata('LEVEL');
		$COMMENT	= $this->input->post('COMMENT');
		$ID_QC	= $this->input->post('ID_QC');
		
		

		if (($LEVEL_USER == 3) || ($LEVEL_USER == 2) || ($LEVEL_USER == 6) ){
			$FLAG = 1;
			if(is_null($ID_QC)){
				$input = $this->M_aql_inspect->input_id_qc($PO_NO, $PARTIAL, $REMARK, $LEVEL, $LEVEL_USER, $ID_QC);
			}else{
				foreach($ID_QC as $ID_QC2){ 
					$input = $this->M_aql_inspect->input_id_qc($PO_NO, $PARTIAL, $REMARK, $LEVEL, $LEVEL_USER, $ID_QC2);
				};
			}
			$data = $this->M_aql_inspect->confirm_inspector($PO_NO, $PARTIAL, $REMARK, $LEVEL, $USERID, $LEVEL_USER, $FLAG, $COMMENT);
		} else if ($LEVEL_USER == 4){
			$FLAG = 2;
			$data = $this->M_aql_inspect->confirm_inspector_repre($PO_NO, $PARTIAL, $REMARK, $LEVEL, $USERID, $LEVEL_USER, $FLAG);
		}else if ($LEVEL_USER == 5){
			$FLAG = 3;
			$data = $this->M_aql_inspect->confirm_inspector_repre($PO_NO, $PARTIAL, $REMARK, $LEVEL, $USERID, $LEVEL_USER, $FLAG);
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
		$inspect_list  = $this->M_aql_inspect->inspect_list($flag);
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
				<button type="button" class="btn btn-success btn-xs confirm" data-PO="'.$A->PO_NO.'" data-PARTIAL="'.$A->PARTIAL.'" data-REMARK="'.$A->REMARK.'" data-LEVEL="'.$A->LEVEL.'" data-FLAG="'.$flag.'" data-INSPECTOR="'.$inspector.'">Confirm</button>';
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
                $A->INSPECT_RESULT,
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
		$subdata['ic'] 		= $this->M_aql_inspect->ic_view($po, $partial, $remark, $level, $level_user);
		
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/ic_view', $subdata);
		$this->load->view('template/footer');
	}

	public function ic_view_guest($po, $partial, $remark, $level, $level_user){
		// sesscheck();
		$datasub['formtitle'] = "INSPECTION CERTIFICATE" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['ic'] 		= $this->M_aql_inspect->ic_view($po, $partial, $remark, $level, $level_user);
		
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
        
       	$inspect_list  = $this->M_aql_inspect->daily_report();
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
		$datasub['formtitle'] = "DAILY AQL INSPECTION" ; 
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
        
       	$inspect_list  = $this->M_aql_inspect->monthly_report();
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

		// $data = $this->M_aql_inspect->monthly_report();
		// echo json_encode($data);
	}



	public function monthly_third_inspection(){
		$datasub['formtitle'] = "DAILY AQL INSPECTION" ; 
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
        
       	$inspect_list  = $this->M_aql_inspect->monthly_third();
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

		// $data = $this->M_aql_inspect->monthly_report();
		// echo json_encode($data);
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
		
        $data = $this->M_aql_inspect->summary_third_fac();
        
        echo json_encode($data);
	}
	
	public function summary_third_date(){
		
        $data = $this->M_aql_inspect->summary_third_date();
        
        echo json_encode($data);
    }





	public function monthly_report_validator(){
		$datasub['formtitle'] = "MONTHLY VALIDATON REPORT" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
				
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/monthly_validator_report');
		$this->load->view('template/footer');
	}

	public function monthly_report_validator_(){
		$draw 			= intval($this->input->get("draw"));
		$start 			= intval($this->input->get("start"));
        $length	 		= intval($this->input->get("length"));
        
       	$inspect_list  = $this->M_aql_inspect->monthly_validator();
		$data          = array();
		$no            = $start;
	
		foreach ($inspect_list->result() as $A){
		
			$data[] = array(
				$A->FACTORY,
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

		// $data = $this->M_aql_inspect->monthly_report();
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
		
		$data = $this->M_aql_inspect->summary_aql();
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
        
       	$inspect_list  = $this->M_aql_inspect->edit_carton();
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
		// $output = $this->M_aql_inspect->edit_carton();
		echo json_encode($output);
	}

	public function edit_carton__(){
		sesscheck();
		$data = $this->M_aql_inspect->edit_carton_();
		echo json_encode($data);
	}

	public function export_excel(){
		sesscheck();
		$po 		= $this->input->post('PO_NO');
		$partial 	= $this->input->post('PARTIAL');
		$remark 	= $this->input->post('REMARK');
		$level 		= $this->input->post('LEVEL');
		$level_user	= $this->input->post('LEVEL_USER');

		$url 		= base_url().'index.php/C_report2/index/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
		echo json_encode($url);

	}

	public function export_excel_ic(){
		sesscheck();
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
		$data = $this->M_aql_inspect->view_detail_po();
		echo json_encode($data);
	}

	public function po_reject(){
	
		$datasub['formtitle'] = "PO REJECT" ; 
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		
		$datasub['all'] 		= $this->M_aql_inspect->po_reject_all()->result_array();
		$datasub['cell'] 		= $this->M_aql_inspect->cell()->result_array();
		
		$this->load->view('template/header_awal', $datasub);
		$this->load->view('QIP/Inspection/template_baru/Aql_Report/po_reject');
		$this->load->view('template/footer');
	}

	public function po_reject_summary(){
		$data = $this->M_aql_inspect->po_reject_all()->result();
		echo json_encode($data);
	}

	public function po_reject_byfactory(){
		$data = $this->M_aql_inspect->po_reject_byfactory()->result();
		echo json_encode($data);
	}

	public function po_reject_byname(){
		$data = $this->M_aql_inspect->po_reject_byname()->result();
		echo json_encode($data);
	}

	public function po_reject_detail(){
		$data = $this->M_aql_inspect->po_reject_detail();
		echo json_encode($data);
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
		$data = $this->M_aql_inspect->packing_plan();
		echo json_encode($data);
	}


	public function summary_excel(){
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        //style
        $judul_1 = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 16,
                'name'  => 'Arial'
            ], 
        );

        $judul_2 = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 16,
                'name'  => 'Arial'
            ], 
        );

        $center = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 24,
                'name'  => 'Arial'
            ], 
            
        );

        $judulcenter = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 48,
                'name'  => 'Arial',
                'bold' => true
            ], 
            'borders' => array(
                'top' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => array('argb' => '000000'),
                ),
            ),
            
        );

        $kontentboldleft = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 24,
                'name'  => 'Arial',
                'bold' => true
            ], 
            'borders' => array(
                'top' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
                'bottom' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            
            
        );

        $kontentboldboderkanan= array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'font' => [
                'size' => 24,
                'name'  => 'Arial',
                'bold' => true
            ], 
            'borders' => array(
                'top' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
                'bottom' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
                'right' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            
            
        );

        $konten = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 12,
                'bold' => true,
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'ffff00',
                ],
                'endColor' => [
                    'argb' => 'FFFFFFF',
                ],
            ],
        );

        $outline = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 24
            ], 
            'borders' => array(
                'outline' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            )
        );

        $top = array(
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'font' => [
                'size' => 24
            ], 
            'borders' => array(
                'top' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            )
        );

        $writer = new Xlsx($spreadsheet);
        
        $sheet->getColumnDimension('A')->setWidth(21.29);
        $sheet->getColumnDimension('B')->setWidth(17.00);
        $sheet->getColumnDimension('C')->setWidth(17.00);
        $sheet->getColumnDimension('D')->setWidth(13.22);
        $sheet->getColumnDimension('E')->setWidth(17.22);
        $sheet->getColumnDimension('F')->setWidth(14.89);
        $sheet->getColumnDimension('G')->setWidth(14.89);
        $sheet->getColumnDimension('H')->setWidth(12.56);
        $sheet->getColumnDimension('I')->setWidth(9.44);
        $sheet->getColumnDimension('J')->setWidth(10.44);
        $sheet->getColumnDimension('K')->setWidth(21.33);
        $sheet->getColumnDimension('L')->setWidth(15.22);
        $sheet->getColumnDimension('M')->setWidth(10.33);
        $sheet->getColumnDimension('N')->setWidth(12.67);
        $sheet->getColumnDimension('O')->setWidth(20.11);
        $sheet->getColumnDimension('P')->setWidth(17.33);
        $sheet->getColumnDimension('Q')->setWidth(12.89);
        $sheet->getColumnDimension('R')->setWidth(10.00);
        $sheet->getColumnDimension('S')->setWidth(10.89);

//row
        $sheet->getRowDimension('1')->setRowHeight(115.50);
        $sheet->getRowDimension('2')->setRowHeight(30.00);
        $sheet->getRowDimension('3')->setRowHeight(30.00);
        $sheet->getRowDimension('4')->setRowHeight(30.00);
        $sheet->getRowDimension('5')->setRowHeight(30.00);
        $sheet->getRowDimension('6')->setRowHeight(30.00);
        $sheet->getRowDimension('7')->setRowHeight(58.50);
        $sheet->getRowDimension('8')->setRowHeight(78.75);
        $sheet->getRowDimension('9')->setRowHeight(52.50);
        $sheet->getRowDimension('10')->setRowHeight(30.00);
        $sheet->getRowDimension('11')->setRowHeight(30.00);
        $sheet->getRowDimension('12')->setRowHeight(30.00);
        $sheet->getRowDimension('13')->setRowHeight(30.00);
        $sheet->getRowDimension('14')->setRowHeight(30.00);
        $sheet->getRowDimension('15')->setRowHeight(30.00);
        $sheet->getRowDimension('16')->setRowHeight(30.00);
        $sheet->getRowDimension('17')->setRowHeight(30.00);
        $sheet->getRowDimension('18')->setRowHeight(30.00);
        $sheet->getRowDimension('19')->setRowHeight(30.75);
        $sheet->getRowDimension('20')->setRowHeight(30.00);
        $sheet->getRowDimension('21')->setRowHeight(30.00);
        $sheet->getRowDimension('22')->setRowHeight(30.00);
        $sheet->getRowDimension('23')->setRowHeight(30.00);
        $sheet->getRowDimension('24')->setRowHeight(30.00);
        $sheet->getRowDimension('25')->setRowHeight(30.00);      
        $sheet->getRowDimension('26')->setRowHeight(30.00);
        $sheet->getRowDimension('27')->setRowHeight(30.00);
        $sheet->getRowDimension('28')->setRowHeight(30.00);
        $sheet->getRowDimension('29')->setRowHeight(30.75);
        $sheet->getRowDimension('30')->setRowHeight(30.75);
        $sheet->getRowDimension('31')->setRowHeight(30.75);
        $sheet->getRowDimension('32')->setRowHeight(30.75);
        $sheet->getRowDimension('33')->setRowHeight(30.00);
        $sheet->getRowDimension('34')->setRowHeight(30.00);
        $sheet->getRowDimension('35')->setRowHeight(30.00);
        $sheet->getRowDimension('36')->setRowHeight(30.00);
        $sheet->getRowDimension('37')->setRowHeight(30.00);
        $sheet->getRowDimension('38')->setRowHeight(30.00);
        $sheet->getRowDimension('39')->setRowHeight(30.00);
        $sheet->getRowDimension('40')->setRowHeight(30.00);
        $sheet->getRowDimension('41')->setRowHeight(30.75);
        $sheet->getRowDimension('42')->setRowHeight(30.00);
        $sheet->getRowDimension('43')->setRowHeight(30.00);
        $sheet->getRowDimension('44')->setRowHeight(30.00);
        $sheet->getRowDimension('45')->setRowHeight(30.00);
        $sheet->getRowDimension('46')->setRowHeight(30.00);
        $sheet->getRowDimension('47')->setRowHeight(30.00);
        $sheet->getRowDimension('48')->setRowHeight(30.00);
        $sheet->getRowDimension('49')->setRowHeight(30.00);
        $sheet->getRowDimension('50')->setRowHeight(30.00);
        $sheet->getRowDimension('51')->setRowHeight(30.00);
        $sheet->getRowDimension('52')->setRowHeight(30.00);
        $sheet->getRowDimension('53')->setRowHeight(30.00);
        $sheet->getRowDimension('54')->setRowHeight(30.00);

        $report = $this->M_aql_inspect->ic_view($po, $partial, $remark, $level, $level_user);

        $sheet->setCellValue('A1', 'IC NUMBER : ')->getStyle('A1')->applyFromArray($judul_1);
        $sheet->mergeCells('B1:C1');
        $sheet->setCellValue('B1', $report['IC_NUMBER'])->getStyle('B1:C1')->applyFromArray($judul_1);

        $sheet->setCellValue('A2', 'adidas  Sourcing Limited')->getStyle('A2')->applyFromArray($judul_2);
        $sheet->setCellValue('A3', 'Indonesia Representative Office, ')->getStyle('A3')->applyFromArray($judul_2);
        $sheet->setCellValue('A4', 'Artha Graha building 10th Floor 5C5D lot.25')->getStyle('A4')->applyFromArray($judul_2);
        $sheet->setCellValue('A5', 'Jl. Jendral Sudirman Kav.52-53')->getStyle('A5')->applyFromArray($judul_2);
        $sheet->setCellValue('A6', 'Jakarta | Indonesia')->getStyle('A6')->applyFromArray($judul_2);

        $sheet->mergeCells('A8:R8');
        $sheet->setCellValue('A8', 'INSPECTION CERTIFICATE')->getStyle('A8:R8')->applyFromArray($judulcenter);

        $sheet->mergeCells('A10:C10');
        $sheet->setCellValue('A10', 'Customer Number')->getStyle('A10:C10')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('D10', ':')->getStyle('D10')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('E10:I10');
        $sheet->setCellValue('E10', $report['CUSTOMER'])->getStyle('E10:I10')->applyFromArray($kontentboldboderkanan);
        $sheet->mergeCells('J10:M10');
        $sheet->setCellValue('J10', 'T1 Supplier')->getStyle('J10:M10')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('N10', ':')->getStyle('N10')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('O10:R10');
        $sheet->setCellValue('O10', 'HWI')->getStyle('O10:R10')->applyFromArray($kontentboldboderkanan);

        $sheet->mergeCells('A11:C11');
        $sheet->setCellValue('A11', 'PO Number')->getStyle('A11:C11')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('D11', ':')->getStyle('D11')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('E11:I11');
        $sheet->setCellValue('E11', $report['PO_NO'])->getStyle('E11:I11')->applyFromArray($kontentboldboderkanan);
        $sheet->mergeCells('J11:M11');
        $sheet->setCellValue('J11', 'Model Name')->getStyle('J11:M11')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('N11', ':')->getStyle('N11')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('O11:R11');
        $sheet->setCellValue('O11', $report['MODEL_NAME'])->getStyle('O11:R11')->applyFromArray($kontentboldboderkanan);

        $sheet->mergeCells('A12:C12');
        $sheet->setCellValue('A12', 'Quantity')->getStyle('A12:C12')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('D12', ':')->getStyle('D12')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('E12:G12');
        $sheet->setCellValue('E12', $report['KWMENG'])->getStyle('E12:G12')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('H12:I12');
        $sheet->setCellValue('H12', 'PRS')->getStyle('H12:I12')->applyFromArray($kontentboldboderkanan);
        $sheet->mergeCells('J12:M12');
        $sheet->setCellValue('J12', 'Article Number')->getStyle('J12:M12')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('N12', ':')->getStyle('N12')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('O12:R12');
        $sheet->setCellValue('O12', $report['ARTICLE'])->getStyle('O12:R12')->applyFromArray($kontentboldboderkanan);

        $sheet->mergeCells('A14:C14');
        $sheet->setCellValue('A14', 'Destination')->getStyle('A14:C14')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('D14', ':')->getStyle('D14')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('E14:I14');
        $sheet->setCellValue('E14', $report['LANDT'])->getStyle('E14:I14')->applyFromArray($kontentboldboderkanan);

        $sheet->mergeCells('A15:C15');
        $sheet->setCellValue('A15', 'Part of Full Shipment')->getStyle('A15:C15')->applyFromArray($kontentboldleft);
        $sheet->setCellValue('D15', ':')->getStyle('D15')->applyFromArray($kontentboldleft);
        $sheet->mergeCells('E15:I15');
        $sheet->setCellValue('E15', '')->getStyle('E15:I15')->applyFromArray($kontentboldboderkanan)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffb239');;

        $sheet->setCellValue('A18', 'This merchandise has been checked by us and appears on this right Inspection to be in accordance with')->getStyle('A18')->applyFromArray($judul_2);
        $sheet->setCellValue('A19', 'adidas-Group standards.')->getStyle('A19')->applyFromArray($judul_2);
        $sheet->setCellValue('A21', 'Inspection has been done')->getStyle('A21')->applyFromArray($judul_2);

        $sheet->mergeCells('A23:L23');
        $sheet->setCellValue('A23', 'According to adidas-Group FINAL Line concept (100% inspection)')->getStyle('A23:L23')->applyFromArray($judul_2);

        $sheet->mergeCells('A25:I25');
        $sheet->setCellValue('A25', 'According to adidas-Group AQL Inspection Policy')->getStyle('A25:I25')->applyFromArray($judul_2);

        $sheet->setCellValue('N23', '')->getStyle('N23')->applyFromArray($outline);

        $sheet->setCellValue('N25', 'V')->getStyle('N25')->applyFromArray($outline);
        $sheet->setCellValue('O25', '( see page 2)')->getStyle('O25')->applyFromArray($judul_2);

        $sheet->setCellValue('A27', 'Note : In case that both FINAL 100% Inspection and AQL Inspection are performed e.g. during the transition periode to FINAL')->getStyle('A27')->applyFromArray($judul_2);

        $sheet->setCellValue('A28', 'line concept, both boxes will be ticked.')->getStyle('A28')->applyFromArray($judul_2);

        $sheet->mergeCells('P32:R32');
        $sheet->setCellValue('P32', $report['DATE_REPRESENTATIVE'])->getStyle('P32:R32')->applyFromArray($judul_2);

        $sheet->mergeCells('B34:E34');
        $sheet->setCellValue('B34', $report['SIGN_REPRESENTATIVE'])->getStyle('B34:E34')->applyFromArray($center);

        $sheet->mergeCells('A35:H35');
        $sheet->setCellValue('A35', 'Name Factory Representative')->getStyle('A35:H35')->applyFromArray($top);

        $sheet->mergeCells('K35:Q35');
        $sheet->setCellValue('K35', 'Signature / Date')->getStyle('K35:Q35')->applyFromArray($top);

        $sheet->mergeCells('P41:R41');
        $sheet->setCellValue('P41', $report['DATE_PRODUCTION_MANAGER'])->getStyle('P41:R41')->applyFromArray($judul_2);

        $sheet->mergeCells('B42:E42');
        $sheet->setCellValue('B42', $report['DATE_PRODUCTION_MANAGER'])->getStyle('B42:E42')->applyFromArray($center);

        $sheet->mergeCells('A43:H43');
        $sheet->setCellValue('A43', 'Name adidas-group Production Manager')->getStyle('A43:H43')->applyFromArray($top);

        $sheet->mergeCells('K43:Q43');
        $sheet->setCellValue('K43', 'Signature / Date')->getStyle('K43:Q43')->applyFromArray($top);

        $sheet->setCellValue('A46', 'Factory Representative and adidas-group Production Manager confirm with their signature that this PO meets adidas-Group')->getStyle('A46')->applyFromArray($judul_2);
        $sheet->setCellValue('A47', 'bonding and FGT standards and that valid A-01 and CPSIA certificate area available.')->getStyle('A47')->applyFromArray($judul_2);
        
        $sheet->setCellValue('A51', 'Date issued : 19-09-2016')->getStyle('A51')->applyFromArray($judul_2);
        $sheet->setCellValue('A52', 'Revision# : 0')->getStyle('A52')->applyFromArray($judul_2);
        $sheet->setCellValue('A53', 'Control # : QIP/APP/8-3')->getStyle('A53')->applyFromArray($judul_2);

        $spreadsheet->getActiveSheet()->getPageSetup()->setScale(100);
        $spreadsheet->getSheetByName('Worksheet 1');
		
		$filename = 'IC_Report_'. $po.'_'.$partial;
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

        $writer->save('php://output');
	}


}
