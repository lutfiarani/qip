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

	public function validation($po, $partial, $level, $user){
		sesscheck();
		$level 					= $this->session->userdata('LEVEL');
		$datasub['username'] 	= $this->session->userdata('USERNAME');
		$datasub['tingkat'] 	= $this->session->userdata('LEVEL');
		$datasub['formtitle'] 	= "AQL INSPECTION VALIDATION";
			
        // data tampil
		$subdata['PO_NO'] 		= $po;
		$subdata['PARTIAL'] 	= $partial;
		$subdata['LEVEL'] 		= 'II'; 
		$subdata['LEVEL_USER'] 	= $user;
		$this->load->view('template/header', $datasub);
		$artikel				= $this->M_validation->get_article($po)->num_rows();
		if($artikel > 0){
			$subdata['ARTICLE']		= $this->M_validation->get_article($po)->row();
		}else{
			$subdata['ARTICLE']		= $this->M_validation->get_article_ckd($po)->row();
		}
		
		$subdata['sub']			= 1;
		$subdata['inspector'] 	= $this->M_aql_pivot->inspector_list($level);
		$cek_val				= $this->M_validation->cek_val($po, $partial,  $level='II', $user)->num_rows();
		$cek_kriteria_cpsia		= $this->M_validation->cek_kriteria_cpsia($po);
		$cek_cpsia				= $this->M_validation->apps_cpsia($po);

		if($cek_kriteria_cpsia->num_rows() > 0){
			if($cek_kriteria_cpsia->row()->KRITERIA=='NO'){
				$cpsia 			= 'na';
				$comment_cpsia	= '';
			}else if(($cek_kriteria_cpsia->row()->KRITERIA=='YES')&&($cek_cpsia->num_rows() > 0)){//($cek_cpsia->statusnya=='yes')){
				if($cek_cpsia->row()->statusnya=='yes'){
					$cpsia 			= 'yes';
					$comment_cpsia	= $cek_cpsia->row()->coc;
				}else if($cek_cpsia->row()->statusnya=='no'){
					$cpsia 			= 'no';
					$comment_cpsia	= $cek_cpsia->row()->coc;
				}
				
			}else if(($cek_kriteria_cpsia->row()->KRITERIA=='YES')&&($cek_cpsia->num_rows() == 0)){
				$cpsia 			= 'no';
				$comment_cpsia	= '';
			}else{
				$cpsia 			= 'na';
				$comment_cpsia 	= '';
			}
		}else{
			$cpsia 			= 'yes';
			$comment_cpsia 	= '';
		}
		

		if($cek_val == '0'){
			$subdata['a01'] 		= $this->M_validation->apps_a01($po);
			$subdata['cpsia'] 		= $cpsia;//$this->M_validation->apps_cpsia($po);
			$subdata['cpsia_cmnt'] 	= $comment_cpsia;
			$subdata['fgt'] 		= $this->M_validation->fgt($po);
			$subdata['cma'] 		= $this->M_validation->cma($po);
			$subdata['product'] 	= $this->M_validation->disp_product($po);
			$subdata['flag']		= 1;
			$this->load->view('QIP/Inspection/template_baru/pivot/validation', $subdata);
		}else{
			$subdata['mcs'] 		= $this->M_validation->val_result($po, $partial, $level, $user, $code='1');
			$subdata['shas'] 		= $this->M_validation->val_result($po, $partial, $level, $user, $code='2');
			$subdata['a01'] 		= $this->M_validation->val_result($po, $partial, $level, $user, $code='3');
			$subdata['cpsia'] 		= $this->M_validation->val_result($po, $partial, $level, $user, $code='4');
			$subdata['customer'] 	= $this->M_validation->val_result($po, $partial, $level, $user, $code='5');
			$subdata['fg'] 			= $this->M_validation->val_result($po, $partial, $level, $user, $code='6');
			$subdata['warehouse'] 	= $this->M_validation->val_result($po, $partial, $level, $user, $code='7');
			$subdata['fgt'] 		= $this->M_validation->val_result($po, $partial, $level, $user, $code='8');
			// $subdata['cma'] 		= $this->M_validation->val_result($po, $partial, $level, $user, $code='9');
			$subdata['uv_c'] 		= $this->M_validation->val_result($po, $partial, $level, $user, $code='10');
			$subdata['anti_mold'] 	= $this->M_validation->val_result($po, $partial, $level, $user, $code='11');
			$subdata['visual'] 		= $this->M_validation->val_result($po, $partial, $level, $user, $code='12');
			$subdata['factory'] 	= $this->M_validation->val_result($po, $partial, $level, $user, $code='13');
			$subdata['slip_on'] 	= $this->M_validation->val_result($po, $partial, $level, $user, $code='14');
			// $subdata['moisture'] 	= $this->M_validation->val_result($po, $partial, $level, $user, $code='15');
			$subdata['moisture_box'] 	= $this->M_validation->val_result($po, $partial, $level, $user, $code='16');
			$subdata['moisture_product']= $this->M_validation->val_result($po, $partial, $level, $user, $code='17');
			$subdata['flag']		= 2;
			
			$this->load->view('QIP/Inspection/template_baru/pivot/validation_available', $subdata);
			
		}
		
		
		$this->load->view('QIP/Inspection/template_baru/pivot/validation_script');
		$this->load->view('template/footer');
		
    }

	public function save_validation(){
		// $po                 = $_POST['PO_NO'];
        // $partial            = $_POST['PARTIAL'];
        // $level              = $_POST['LEVEL'];
        // $level_user         = $_POST['LEVEL_USER'];

		// $data 				= $this->M_validation->save_validation();
		// $stage				= '3';
		// $update_stage 		= $this->M_validation->edit_stage($po, $partial, $level, $level_user, $stage);
		$this->save_first_data();
		
	}

	function save_first_data(){
		sesscheck();
		$po             = $_POST['PO_NO'];
        $partial        = $_POST['PARTIAL'];
        $level          = $_POST['LEVEL'];
        $level_user     = $_POST['LEVEL_USER'];
		$stage	 		= '3';
		$INSPECTOR 		= $this->session->userdata('USERNAME');
		
		$cek_first		= $this->M_validation->cek_first_data($po, $partial, $level, $level_user);
		if($cek_first->num_rows() == 0){
			$first_data 	= $this->M_aql_pivot->save_first_data($po, $partial, $level, $stage, $level_user, $INSPECTOR);
		}
		
		$remark     	= 1;
		$data 			= $this->M_validation->save_validation($remark);
		$update_stage 	= $this->M_validation->edit_stage($po, $partial, $level, $level_user, $remark, $stage);
		
		// $url 			= base_url().'index.php/c_pivot_validation/validation/'.$po_edit1.'/'.$partial_edit1.'/'.$remark.'/'.$level_edit1.'/'.$level_user;
		
		// echo json_encode(array('status'=>'simpan berhasil', 'url'=>$url));
		$url 				= base_url().'index.php/C_aql_reject/add_reject/'.$po.'/'.$partial.'/'.$remark.'/'.$level.'/'.$level_user;
		echo json_encode(array('status'=>'simpan berhasil', 'url'=>$url));
	}

	public function save_image(){
		$data 			= [];
		$PO_NO1 		= $_POST['PO_NO1'];
		$PARTIAL1 		= $_POST['PARTIAL1'];
		$LEVEL1 		= $_POST['LEVEL1'];
		$LEVEL_USER1 	= $_POST['LEVEL_USER1'];
		$ARTICLE1 		= $_POST['ARTICLE1'];
		$picture_code 	= $_POST['picture_code'];
		$photo_name 	= $_POST['photo_name'];
		

		$datas 			= array();

		$count = count($_FILES['files']['name']);
		for($i = 0; $i<$count; $i++){
			if(!empty($_FILES['files']['name'][$i])){
				$nama 						= uniqid(mt_rand(), true);//$_FILES['files']['name'][$i];
				$extension					= pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
				$_FILES['file']['name'] 	= preg_replace('/\s+/', '_', $nama);//$_FILES['files']['name'][$i];
				$_FILES['file']['type'] 	= $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error'] 	= $_FILES['files']['error'][$i];
				$_FILES['file']['size'] 	= $_FILES['files']['size'][$i];

				$config['upload_path'] 		= 'template/images/aql_image/'; 
				$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
				$config['max_size'] 		= '5000'; // max_size in kb
				$config['file_name'] 		= $nama . '.' . $extension;//preg_replace('/\s+/', '_', $nama);

				$lokasi = $config['upload_path'] . basename($config['file_name']);
		
				$this->load->library('upload',$config); 
				if (file_exists($lokasi)) {
					unlink($lokasi);
				}			
				
				$temp = explode(".", $_FILES["file"]["name"][$i]);
				$newfilename = round(microtime(true)) . '.' .basename($config['file_name']);
				move_uploaded_file($_FILES["file"]["tmp_name"], $config['upload_path'] . basename($config['file_name']));
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					$data['totalFiles'][] = $filename;
				}
			}

			if($_FILES['files']['name'][$i]!=''){
				array_push($datas, array(
					'PO_NO' 		=> $PO_NO1[$i],
					'PARTIAL' 		=> $PARTIAL1[$i],
					'LEVEL' 		=> $LEVEL1[$i],
					'LEVEL_USER' 	=> $LEVEL_USER1[$i],
					'ARTICLE' 		=> $ARTICLE1[$i],
					'PHOTO_CODE' 	=> $picture_code[$i],
					'PHOTO_NAME' 	=> basename($config['file_name']),
					'SEQ' 			=> $picture_code[$i]
				));
				// $index++;
				
			}
			
			
		}
		$sql 		= $this->M_validation->save_image($datas);
		
		echo json_encode('berhasil');
	}

	public function save_image_single(){
		$PO_NO1 		= $_POST['PO_NO1'];
		$PARTIAL1 		= $_POST['PARTIAL1'];
		$LEVEL1 		= $_POST['LEVEL1'];
		$LEVEL_USER1 	= $_POST['LEVEL_USER1'];
		$ARTICLE1 		= $_POST['ARTICLE1'];
		$picture_code 	= $_POST['picture_code'];
		$photo_name 	= $_POST['photo_name'];

		$nama 						= uniqid(mt_rand(), true);//$_FILES['files']['name'][$i];
		$extension					= pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
		$_FILES['file']['name'] 	= preg_replace('/\s+/', '_', $nama);//$_FILES['files']['name'][$i];
		$_FILES['file']['type'] 	= $_FILES['files']['type'];
		$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
		$_FILES['file']['error'] 	= $_FILES['files']['error'];
		$_FILES['file']['size'] 	= $_FILES['files']['size'];

		$config['upload_path'] 		= 'template/images/aql_image/'; 
		$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
		$config['max_size'] 		= '500000'; // max_size in kb
		$config['file_name'] 		= $nama . '.' . $extension;//preg_replace('/\s+/', '_', $nama);

		$lokasi = $config['upload_path'] . basename($config['file_name']);

		$this->load->library('upload',$config); 
		if (file_exists($lokasi)) {
			unlink($lokasi);
		}			
		
		move_uploaded_file($_FILES["file"]["tmp_name"], $config['upload_path'] . basename($config['file_name']));
		if($this->upload->do_upload('file')){
			$uploadData = $this->upload->data();
			$filename = $uploadData['file_name'];
		}


		if($_FILES['files']['name']!=''){
			array_push($datas, array(
				'PO_NO' 		=> $PO_NO1,
				'PARTIAL' 		=> $PARTIAL1,
				'LEVEL' 		=> $LEVEL1,
				'LEVEL_USER' 	=> $LEVEL_USER1,
				'ARTICLE' 		=> $ARTICLE1,
				'PHOTO_CODE' 	=> $picture_code,
				'PHOTO_NAME' 	=> basename($config['file_name']),
				'SEQ' 			=> $picture_code
			));
			// $index++;
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

	public function disp_measurements(){
		$po                 = $_POST['PO_NO'];
        $partial            = $_POST['PARTIAL'];
        $level              = $_POST['LEVEL'];
        $level_user         = $_POST['LEVEL_USER'];
		$data				= $this->M_validation->disp_measurements($po, $partial, $level, $level_user);
		echo json_encode($data);
	}

	public function image_product(){
		$data = $this->M_validation->image_product();
		
		echo json_encode($data);
	}

	public function updateBookingCtn(){
		$update = $this->M_validation->updateBookingCtn();
        echo json_encode("berhasil");
	}

	public function view_random(){
		$PO_NO 		= $_POST['PO_NO'];
		$PARTIAL 	= $_POST['PARTIAL']; 

		$data 		= $this->M_validation->view_random($PO_NO, $PARTIAL);
		echo json_encode($data);
	}
	
	public function view_booking_ctn(){
		$PO_NO 		= $_POST['PO_NO'];
		$PARTIAL 	= $_POST['PARTIAL']; 

		$data 		= $this->M_validation->view_booking_ctn($PO_NO, $PARTIAL);
		echo json_encode($data);
	}

	public function update_random(){
		$PO_NO 		= $_POST['PO_NO'];
		$PARTIAL 	= $_POST['PARTIAL']; 
		$SIZE 		= $_POST['SIZE'];
		$VALUE 		= $_POST['VALUE'];

		$data 		= $this->M_validation->update_random($PO_NO, $PARTIAL, $SIZE, $VALUE);
		echo json_encode($data);
	}

	public function delete_display(){
		$path 		= 'template/images/aql_image/'; 
		$name 		= preg_replace('/\s+/', '_', $_POST['NAME']);
		$lokasi 	= $path . $name;
		
		if (file_exists($lokasi)) {
			unlink($lokasi);
		}			

		$data 		= $this->M_validation->delete_display();
		echo json_encode($data);
	}
}

