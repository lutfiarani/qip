<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class C_ProductionByModel extends CI_Controller {
	
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
       
		$this->load->model('M_ProductionByModel', 'PM');
    }
	public function index(){
        $subdata['formtitle'] = "Production Result by Model";
		$this->load->view('template/header_ysha');
		$this->load->view('QIP/Inspection/ProductionResult/ProductionModel', $subdata);
		$this->load->view('template/footer_ysha');
	}

    public function ProdResult(){
        $result = $this->PM->ProdResult();
        echo json_encode($result);
    }

	public function AssyIn(){
		$subdata['formtitle']="PO China";
        $this->load->view('template/header_awal', $subdata);
		$this->load->view('QIP/ysha/assy_in_report', $subdata);
		$this->load->view('template/footer');
	}

	public function view_data(){
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $list = $this->PM->view_po_china();
        $data = array();
        $no = $start;
        foreach($list->result() as $a){
            $no++; 
            $data[] = array(
                // "<input type='checkbox' class='delete_check' id='delcheck_". $a->PO_NO."' onclick='checkcheckbox();' value='". $a->PO_NO."'>". $no, 
                $no, 
                $a->WORKDATE,
				$a->PO_NO,
				$a->CELL,
				$a->DESTINATION,
                $a->MODEL_NAME,
                $a->ART_NO,
                $a->QTY_SCAN
               
            );
        }
        $output = array(
            "draw"=> $draw,
            "recordsTotal" => $list->num_rows(),
            "recordsFiltered" => $list->num_rows(),
            "data" =>$data
        );
        echo json_encode($output);
    }


   

}
