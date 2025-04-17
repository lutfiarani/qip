<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_rani extends CI_Controller {

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
       
		// $this->load->model('M_aql_inspect');
		// $this->load->library('Excel');
		// sesscheck();
        
    }

	public function index()
	{
		// sesscheck();
		// $subdata['formtitle']="DAILY AQL INSPECTION";
		// $subdata['sub']= 1;
		$this->load->view('rani');
		// $this->load->view('QIP/Inspection/template_baru/Aql_Report/Daily_report', $subdata);
		// $this->load->view('template/footer');

	}

	

}
