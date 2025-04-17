<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class C_AqlReport extends CI_Controller {
	
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
       
		$this->load->model('M_AqlReport', 'AR');
    }
	
	public function index(){
        $subdata['formtitle'] = "Summary AQL Report";
		$this->load->view('template/header_awal');
		$this->load->view('QIP/Inspection/Report/AQLSummaryReport', $subdata);
		$this->load->view('template/footer');
	}

    public function SummaryReport(){
		$from 			= $this->input->post('from'); 
		$to 			= $this->input->post('to'); 

        $result 		= $this->AR->SummaryReport($from, $to);
		$defect_list 	= $this->AR->list_defect();

        echo json_encode(array('defect'=>$defect_list, 'data'=>$result));
		// echo json_encode($result);
    }

	public function Category(){
		$subdata['formtitle'] = "Summary Internal System AQL Inspection";
		$this->load->view('template/header_awal');
		$this->load->view('QIP/Inspection/Report/AQL_Report_PerCategory', $subdata);
		$this->load->view('template/footer');
	}

	public function category_(){
		$from 		= $this->input->post('from'); 
		$to 		= $this->input->post('to');

		$inspection = $this->AR->InspectionSummary($from, $to);
		$defect 	= $this->AR->DefectTracking($from, $to);
		$inspector 	= $this->AR->InspectorPerformance($from, $to);

		echo json_encode(array('inspection'=> $inspection, 'defect'=>$defect, 'inspector'=>$inspector));
	}

   

}
