<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_SDD_Report extends CI_Controller {

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
       
		$this->load->model('M_SDD_Report', 'sdd');
		// $this->load->library('Excel');
		// sesscheck();
        
    }

	public function index()
	{
		$data['formtitle']="SDD List";
		$data['sub']= 1;
        $this->load->view('template/header_ysha', $data);
		$this->load->view('QIP/SDD/SDD_list',$data);
		$this->load->view('template/footer');
    }

    public function list_SDD(){
        $list = $this->sdd->list_SDD();
        echo json_encode($list);
    }

    public function list_model(){
        $model = $this->sdd->list_model();
        echo json_encode($model);
    }

    public function list_po(){
        $model = $this->sdd->list_po();
        echo json_encode($model);
    }
// -------------------------------------------------------------------MODEL LIST--------------------------------------------------------
    public function model()
	{
		$data['formtitle']="Model List";
		$data['sub']= 1;
        $this->load->view('template/header_ysha', $data);
		$this->load->view('QIP/SDD/Model_list',$data);
		// $this->load->view('template/footer');
    }

    public function model_list(){
        $data = $this->sdd->model_list();
        echo json_encode($data);
    }

    public function model_list_po(){
        $data = $this->sdd->model_list_model_po();
        echo json_encode($data);
    }
}
