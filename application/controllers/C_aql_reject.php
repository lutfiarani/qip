<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_aql_reject extends CI_Controller {

    public function __construct(){
        parent:: __construct(); 
        date_default_timezone_set('Asia/Jakarta');
       
		$this->load->model('M_aql_pivot');
        $this->load->model('M_aql_reject');
		$this->load->model('M_validation');
		// $this->load->library('Excel');
		// //sesscheck();
        
    }

    public function index(){

    }

//-------------------PAGE REJECT AQL----------------------------------
	public function add_reject($po, $partial, $remark, $level, $level_user){
		//sesscheck();
		$datasub['formtitle']="AQL REJECT INPUT";
		$datasub['username'] = $this->session->userdata('USERNAME');
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$subdata['sub']= 1;
		$subdata['inspector'] = $this->M_aql_pivot->inspector_list($level_user);
		$subdata['basic'] = $this->M_aql_pivot->aql_report_basic_info($po, $partial, $remark, $level, $level_user);
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/pivot/add_reject', $subdata);
		//Inspection\template_baru\Aql_Report
		$this->load->view('template/footer');
	}

	public function aql_report_basic_info(){
		//sesscheck();
		$dataPO = $this->M_aql_pivot->aql_report_basic_info();
       	echo json_encode($dataPO);
		
	}

	public function aql_report_basic_info_(){
		//sesscheck();
		$dataPO = $this->M_aql_pivot->aql_report_basic_info();
       	echo json_encode($dataPO);
		
	}

	public function detail_reject_code(){
		//sesscheck();
		$data = $this->M_aql_reject->detail_reject_code();
		echo json_encode($data);
	}

	public function input_reject(){
		//sesscheck();
		$level_user	= $this->session->userdata('LEVEL');

		$data = $this->M_aql_reject->input_reject($level_user);
		echo json_encode('ok');
	}

	public function view_defect(){
		//sesscheck();
		$data = $this->M_aql_reject->view_defect();

		echo json_encode($data);
	}

	function delete_defect(){
		//sesscheck();
		$data = $this->M_aql_reject->delete_defect();

		echo json_encode($data);
	}


       public function save_image(){
        //sesscheck();
		$CODE           = $_POST['CODE'];
        $REJECT_CODE    = $_POST['REJECT_CODE'];
        $PO_NO          = $_POST['PO_NO'];
        $PARTIAL        = $_POST['PARTIAL'];
        $LEVEL_USER     = $_POST['LEVEL_USER'];
        $REMARK         = $_POST['REMARK'];
        $LEVEL          = $_POST['LEVEL'];

        $_FILES['file']['name'] = $_FILES['files']['name'];
        $_FILES['file']['type'] = $_FILES['files']['type'];
        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
        $_FILES['file']['error'] = $_FILES['files']['error'];
        $_FILES['file']['size'] = $_FILES['files']['size'];

        $config['upload_path'] = 'template/images/aql_image/reject'; 
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '5000'; // max_size in kb
        $config['file_name'] = $_FILES['files']['name'];

        $lokasi = $config['upload_path'] . basename($config['file_name']);

        $this->load->library('upload',$config); 
        if (file_exists($lokasi)) {
            unlink($lokasi);
        }			
        
        if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
        }
		$column = "REJECT_IMG";
		$update_reject = $this->M_aql_reject->update_reject($PO_NO, $PARTIAL, $LEVEL, $LEVEL_USER, $REMARK, $REJECT_CODE, $CODE, $column, $filename);
	
		echo json_encode('berhasil');
	}

	

    public function update_comment(){
        $CODE           = $_POST['CODE'];
        $REJECT_CODE    = $_POST['REJECT_CODE'];
        $PO_NO          = $_POST['PO_NO'];
        $PARTIAL        = $_POST['PARTIAL'];
        $LEVEL_USER     = $_POST['LEVEL_USER'];
        $REMARK         = $_POST['REMARK'];
        $LEVEL          = $_POST['LEVEL'];
        $column         = $_POST['column'];
        $value          = $_POST['value'];

        $data = $this->M_aql_reject->update_reject($PO_NO, $PARTIAL, $LEVEL, $LEVEL_USER, $REMARK, $REJECT_CODE, $CODE, $column, $value);
        echo json_encode($data);
    }


    public function report_(){
		//sesscheck();
		$po 		= $this->input->post('PO_NO'); 
		$partial	= $this->input->post('PARTIAL'); 
		$remark 	= $this->input->post('REMARK'); 
		$level 		= $this->input->post('LEVEL'); 
		// $level_user	= $this->session->userdata('LEVEL');
		$level_user = $this->input->post('LEVEL_USER'); 

        $cek_second = $this->M_aql_pivot->cek_second_data($po, $partial, $level, $remark, $level_user);

        if ($cek_second->num_rows() > 0 ){
           
            $url 	= base_url().'index.php/C_aql_pivot/report_inspect/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
            

        }else{

            $save_second 		= $this->M_aql_reject->save_second_data($po, $partial, $level, $remark, $level_user);
            $stage				= '4';
		    $update_stage 		= $this->M_validation->edit_stage($po, $partial, $level, $level_user, $remark, $stage);
			$url 	        	= base_url().'index.php/C_aql_pivot/report_inspect/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
            

        }
        echo json_encode(array('status'=>'simpan berhasil', 'url'=>$url));
        // echo json_encode($url); 
	}

    public function view_image(){
        $data = $this->M_aql_reject->view_image();
        echo json_encode($data);
    }

}