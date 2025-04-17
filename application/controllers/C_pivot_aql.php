<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class C_Pivot_aql extends CI_Controller {
	
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
        $this->load->model('M_pivot_client', 'pivot');
        $this->load->model('M_pivot_aql');
		// $this->load->library('Excel');
        
    }
	public function index(){
		sesscheck();
		$subdata['formtitle']="PIVOT INTERFACE";
        $subdata['username'] = $this->session->userdata('USERNAME');
		$subdata['tingkat'] = $this->session->userdata('LEVEL');

		$subdata['sub']= 1;
		$this->load->view('template/header', $subdata);
		$this->load->view('QIP/Pivot/interface_', $subdata);
		$this->load->view('template/footer');
	}

	
	function get_data_po($po){
		// sesscheck();
        $dataPO = $this->M_pivot_aql->get_data_po($po);
        header('Content-Type: application/json');
        $jumlah_data = $dataPO->num_rows();
        if($jumlah_data == 0){
            echo json_encode(array('status'=>'error'));
        }else{
            echo json_encode(array('status'=>'ok','dataPO'=>($dataPO->row())));
        }
	} 

   
	public function get_po_pivot(){
        $po     = $_POST['PO_NO'];
		$po_trans = $this->M_pivot_aql->cek_po_trans($po);
        $data   = $this->M_pivot->get_po_pivot($po_trans->po);
        
        echo json_encode($data);
    }

    public function chart_inline(){
		$data['data'] 	= $this->M_pivot_aql->chart_inline();
		$view = $this->load->view('QIP/Inspection/template_baru/pivot/chart_inline', $data);
		return $view;
	}

    public function chart_endline(){
		$data['data'] 	= $this->M_pivot_aql->chart_endline();
		$view = $this->load->view('QIP/Inspection/template_baru/pivot/chart_endline', $data);
		return $view;
	}

    public function chart_rework(){
		$data['data'] 	= $this->M_pivot_aql->chart_rework();
		$view = $this->load->view('QIP/Inspection/template_baru/pivot/chart_rework', $data);
		return $view;
	}

    public function chart_aql(){
		$data['data'] 	= $this->M_pivot_aql->chart_defect();
		$view = $this->load->view('QIP/Inspection/template_baru/pivot/chart_aql', $data);
		return $view;
	}
    
	public function upload_image(){
	
		$nama = $this->input->post('nama');
		$data = $this->M_pivot_aql->upload_foto($nama);
		echo "berhasil";
	}

	public function tampil_foto(){
		$data = $this->M_pivot_aql->tampil_foto();
		echo json_encode($data);
	}

	public function get_transform($po){
		$data['po'] = $po;
		$data['decoded_data']   = $this->M_pivot_aql->get_po_trans($po);
		$this->load->view('display_data', $data);
	}

	public function get_po_trans(){
		$po     		= $this->input->post('PO_NO');
		$decoded_data   = $this->M_pivot_aql->get_po_trans($po);
		echo json_encode($decoded_data);
    }

	public function save_po_trans(){
		$PO 			= $_POST['PO'];
		$SKU 			= $_POST['SKU'];
		$SIZE 			= $_POST['SIZE'];
		$PROJECT_CODE	= $_POST['PROJECT_CODE'];
		$data 			= array();

		$index = 0; 
		if(is_array($PO) || is_object($PO))
		{
			foreach($PO as $data_PO){ 
				array_push($data, array(
					'PO_NO'				=> $data_PO,
					'SKU'				=> $SKU[$index],  
					'SIZE'				=> $SIZE[$index],  
					'PROJECT_CODE'		=> $PROJECT_CODE[$index],
				));
				$index++;
			}
		}

		$this->M_pivot_aql->save_po_trans($data);
		return json_encode('berhasil');
		// print_r($data);
	}



}
