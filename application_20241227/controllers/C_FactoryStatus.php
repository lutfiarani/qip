<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_FactoryStatus extends CI_Controller {

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
       
		$this->load->model('M_FactoryStatus', 'FS');
		// $this->load->library('Excel');
		// sesscheck();
        
    }

	public function index()
	{
		sesscheck();
		$datasub['formtitle']="FACTORY STATUS";
		$datasub['sub']= 11;
        $datasub['username'] = $this->session->userdata('USERNAME'); 
		$datasub['tingkat'] = $this->session->userdata('LEVEL');
		$this->load->view('template/header', $datasub);
		$this->load->view('QIP/Inspection/template_baru/FactoryStatus/FSinput_page', $datasub);
		$this->load->view('template/footer');

	}

    public function building_info(){
        $info = $this->FS->building_info();
        echo json_encode(array('list'=>$info));
    }

    public function updateGedung(){
        $update = $this->FS->updateGedung();
        echo json_encode($update);
    }

    public function display_image_fs(){
        $display = $this->FS->display_image_fs();
        echo json_encode($display);
    }
    public function save_image_fs(){
        $id 		                = $_POST['id'];
		$nama 						= uniqid(mt_rand(), true);//$_FILES['files']['name'][$i];
		$extension					= pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
		
        $_FILES['file']['name'] 	= preg_replace('/\s+/', '_', $nama);//$_FILES['files']['name'][$i];
		$_FILES['file']['type'] 	= $_FILES['files']['type'];
		$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
		$_FILES['file']['error'] 	= $_FILES['files']['error'];
		$_FILES['file']['size'] 	= $_FILES['files']['size'];

		$config['upload_path'] 		= 'template/images/adidas_data/'; 
		$config['allowed_types'] 	= 'jpg|jpeg|png|gif';
		$config['max_size'] 		= '5000'; // max_size in kb
		$config['file_name'] 		=  $nama . '.' . $extension;//$_FILES['files']['name'];

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
		
		$update_image = $this->FS->update_image($id, basename($config['file_name']));
	
		
		
		echo json_encode('berhasil');
    }

    public function import_BGrade(){
        if(!empty($_FILES['customFile']['name'])) { 
			// get file extension
			$extension = pathinfo($_FILES['customFile']['name'], PATHINFO_EXTENSION);

			if($extension == 'csv'){
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} elseif($extension == 'xlsx') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			// file path
			$spreadsheet = $reader->load($_FILES['customFile']['tmp_name']);
			$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
								
			// array Count
			$arrayCount = count($allDataInSheet);
			$flag = 0;
			$createArray = array('EX_FTY', 'PO_NO','QTY', 'AVR_FOB', 'AMOUNT_FOB');
			$makeArray = array('EX_FTY'=>'EX_FTY', 'PO_NO'=>'PO_NO','QTY'=>'QTY', 'AVR_FOB'=>'AVR_FOB', 'AMOUNT_FOB'=>'AMOUNT_FOB');
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
					$EX_FTY 		= $SheetDataKey['EX_FTY'];
					$PO_NO	        = $SheetDataKey['PO_NO'];
					$QTY 		    = $SheetDataKey['QTY'];
					$AVR_FOB 		= $SheetDataKey['AVR_FOB'];
					$AMOUNT_FOB 	= $SheetDataKey['AMOUNT_FOB'];
					
					
					$EX_FTY 		= filter_var(trim($allDataInSheet[$i][$EX_FTY]), FILTER_SANITIZE_STRING);
					$PO_NO          = filter_var(trim($allDataInSheet[$i][$PO_NO]), FILTER_SANITIZE_STRING);
					$QTY 	        = filter_var(trim($allDataInSheet[$i][$QTY]), FILTER_SANITIZE_STRING);
					$AVR_FOB 		= filter_var(trim($allDataInSheet[$i][$AVR_FOB]), FILTER_SANITIZE_STRING);
					$AMOUNT_FOB 	= filter_var(trim($allDataInSheet[$i][$AMOUNT_FOB]), FILTER_SANITIZE_STRING);
					
					$UPLOAD			= date('Y-m-d H:i:s');

					$fetchData[] = array( 'EX_FTY' => $EX_FTY, 'PO_NO'=> $PO_NO, 'QTY' => $QTY, 'AVR_FOB' => $AVR_FOB, 'AMOUNT_FOB' => $AMOUNT_FOB);
				}   
				$data['dataInfo'] = $fetchData;
				$this->FS->setBatchImport($fetchData);
				$insert = $this->FS->importBGrade();
                $this->FS->delete_blank();
				
				echo json_encode("Y");
				
			} else {
				echo json_encode("N");
			}
			
		}    
    }

    public function last_bgrade(){
        $data = $this->FS->last_bgrade();
        echo json_encode($data);
    }

	

}
