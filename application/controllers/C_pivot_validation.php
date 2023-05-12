<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class C_Pivot_validation extends CI_Controller {
	
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
        $this->load->model('M_validation');
        $this->load->model('M_pivot_client', 'pivot');
        $this->load->model('M_pivot_aql');
        $this->load->model('M_aql_pivot');
		// $this->load->library('Excel');
        
    }
	public function index(){
		sesscheck();
		// $subdata['formtitle']="PIVOT INTERFACE";
        // $subdata['username'] = $this->session->userdata('USERNAME');
		// $subdata['tingkat'] = $this->session->userdata('LEVEL');

		// $subdata['sub']= 1;
		// $this->load->view('template/header', $subdata);
		// $this->load->view('QIP/Pivot/interface_', $subdata);
		// $this->load->view('template/footer');
	}

	public function validation($po, $partial, $remark, $level, $user){
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
        // data tampil
		$subdata['PO_NO'] 		= $po;
		$subdata['PARTIAL'] 	= $partial;
		$subdata['LEVEL'] 		= 'II';
		$subdata['REMARK'] 		= $remark;
		$subdata['LEVEL_USER'] 	= $user;
		$subdata['ARTICLE']		= $this->M_validation->get_article($po);

		$subdata['a01'] 		= $this->M_validation->apps_a01($po);
        $subdata['cpsia'] 		= $this->M_validation->apps_cpsia($po);
        $subdata['fgt'] 		= $this->M_validation->fgt($po);
        $subdata['cma'] 		= $this->M_validation->cma($po);

		$subdata['product'] 	= $this->M_validation->disp_product($po);

        // /data tampil
		$subdata['sub']= 1;
		$subdata['inspector'] = $this->M_aql_pivot->inspector_list($level);
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/pivot/validation', $subdata);
		$this->load->view('template/footer');
    }

	public function save_validation(){
		$po                 = $_POST['PO_NO'];
        $partial            = $_POST['PARTIAL'];
        $remark             = $_POST['REMARK'];
        $level              = $_POST['LEVEL'];
        $level_user         = $_POST['LEVEL_USER'];

		$data 				= $this->M_validation->save_validation();
		$stage				= '3';
		$update_stage 		= $this->M_validation->edit_stage($po, $partial, $level, $level_user, $remark, $stage);

		$url 				= base_url().'index.php/C_aql_reject/add_reject/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
		echo json_encode(array('status'=>'simpan berhasil', 'url'=>$url));
	}

	public function save_image(){
		$data 			= [];
		$PO_NO1 		= $_POST['PO_NO1'];
		$PARTIAL1 		= $_POST['PARTIAL1'];
		$REMARK1 		= $_POST['REMARK1'];
		$LEVEL1 		= $_POST['LEVEL1'];
		$LEVEL_USER1 	= $_POST['LEVEL_USER1'];
		$ARTICLE1 		= $_POST['ARTICLE1'];
		$picture_code 	= $_POST['picture_code'];
		$photo_name 	= $_POST['photo_name'];

		$datas 			= array();

		$count = count($_FILES['files']['name']);
		for($i = 0; $i<$count; $i++){
			if(!empty($_FILES['files']['name'][$i])){

				$_FILES['file']['name'] 	= $_FILES['files']['name'][$i];
				$_FILES['file']['type'] 	= $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error'] 	= $_FILES['files']['error'][$i];
				$_FILES['file']['size'] 	= $_FILES['files']['size'][$i];

				$config['upload_path'] 		= 'template/images/aql_image/'; 
				$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
				$config['max_size'] 		= '5000'; // max_size in kb
				$config['file_name'] 		= $_FILES['files']['name'][$i];

				$lokasi = $config['upload_path'] . basename($config['file_name']);
		
				$this->load->library('upload',$config); 
				if (file_exists($lokasi)) {
					unlink($lokasi);
				}			
				
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					$data['totalFiles'][] = $filename;
				}
			}
		}
		$index = 0; 
		if(is_array($PO_NO1) || is_object($PO_NO1))
		{
			foreach($PO_NO1 as $dataPO){ 
				$nama_foto = preg_replace('/\s+/', '_', $photo_name);
				
				//savedata
				if($_FILES['files']['name'][$index]!=''){
					array_push($datas, array(
						'PO_NO' 		=> $dataPO,
						'PARTIAL' 		=> $PARTIAL1[$index],
						'REMARK' 		=> $REMARK1[$index],
						'LEVEL' 		=> $LEVEL1[$index],
						'LEVEL_USER' 	=> $LEVEL_USER1[$index],
						'ARTICLE' 		=> $ARTICLE1[$index],
						'PHOTO_CODE' 	=> $picture_code[$index],
						'PHOTO_NAME' 	=> $nama_foto[$index],
						'SEQ' 			=> $picture_code[$index]
					));
					$index++;
				}
			}
		}
		$sql 		= $this->M_validation->save_image($datas);
		
		echo json_encode('berhasil');
	}

	public function edit_stage(){
		$data = $this->M_validation->edit_stage($PO_NO1, $PARTIAL1, $LEVEL1, $LEVEL_USER1, $REMARK1, $stage);
		echo json_encode($data);
	}

	public function disp_product(){
		$po 	= $_POST['PO_NO']; 
		$data 	= $this->M_validation->disp_product($po);
		
		echo json_encode($data);
	}

	public function image_product(){
		$data = $this->M_validation->image_product();
		
		echo json_encode($data);
	}
}

