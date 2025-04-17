<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Inspection extends CI_Controller {

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
       
        $this->load->model('M_Inspection');
        
    }

	public function index()
	{
        
		$ana= $this->M_Inspection->total_container();
		$container = count($ana);
		if ( $this->input->post('INSPECTION_DATE', true) === NULL){
			$tgl = date('Y-m-d');
		} else{
			$tgl = $this->input->post('INSPECTION_DATE', true);
		}
		
		
		$subdata['query'] = $this->M_Inspection->tampil_INSPECTIONss($tgl);
		$subdata['action']= site_url('C_INSPECTION/index');
		
		$subdata['formtitle'] = "INSPECTION SCHEDULE TANGGAL ".$tgl;
		$data['pagetitle']="TODAY CONTAINER LOADING SCHEDULE <br>".$tgl;
		$data['content'] = $this->load->view('QIP/INSPECTION_Schedule/Inspection_List_admin',$subdata,true);
		$this->load->view('template2',$data);
	}

	public function inspect_admin2(){
		if ( $this->input->post('INSPECTION_DATE', true) === NULL){
			$tgl = date('Y-m-d');
		} else{
			$tgl = $this->input->post('INSPECTION_DATE', true);
		}
		$data = $this->M_Inspection->tampil_INSPECTIONss($tgl);
        echo json_encode($data);

	}
	
	public function inspect_admin()
	{
		$level = $this->session->userdata('LEVEL');
        $factory = $this->session->userdata('FACTORY');
		$po='';
		$subdata['query'] = $this->M_Inspection->search_loadplan($po);
		$data['pagetitle']="INSPECTION SCHEDULE";
		$subdata['formtitle'] = "CARI PO LOADPLAN";
		$subdata['action']= site_url('C_Inspection/search_inspect/');
        $data['content'] = $this->load->view('QIP/Inspection/cari_inspection',$subdata,true);
        $this->load->view('template_admin',$data);
	}
	
	public function search_inspect()
	{
		$po = $this->input->post('PO_NO', true);
		$level = $this->session->userdata('LEVEL');
        $factory = $this->session->userdata('FACTORY');
       	$data['pagetitle']="INSPECTION SCHEDULE";
		$subdata['query'] = $this->M_Inspection->search_loadplan($po);
        $subdata['action']= site_url('C_Inspection/search_inspect/');
		$subdata['formtitle'] = "LIST PO LOADPLAN";
        $data['content'] = $this->load->view('QIP/Inspection/cari_inspection',$subdata,true);
        $this->load->view('template_admin',$data);
    }

    public function inspect($fac)
	{
        $data['pagetitle']="INSPECTION SCHEDULE";
        if ( $this->input->post('INSPECT_DATE', true) === NULL){
			$tgl = date('Y-m-d');
		} else{
			$tgl = $this->input->post('INSPECT_DATE', true);
		}
		$subdata['formtitle'] = "INSPECTION SCHEDULE TANGGAL ".$tgl." GEDUNG ".$fac;
        $subdata['action']= site_url('C_Inspection/inspect/'.$fac);
        $this->M_Inspection->loadplan($tgl,$fac);
        $subdata['query'] = $this->M_Inspection->tampil_loadplan($tgl,$fac);
        $subdata['banyak'] = $this->M_Inspection->inspect_count($fac);
        $data['content'] = $this->load->view('QIP/Inspection/Inspection_List_non_admin',$subdata,true);
        $this->M_Inspection->drop_loadplan($fac);
        $this->load->view('template2',$data);
	}

	public function inspect2($fac)
	{
        $data['pagetitle']="INSPECTION SCHEDULE";
        if ( $this->input->post('INSPECT_DATE', true) === NULL){
			$tgl = date('Y-m-d');
		} else{
			$tgl = $this->input->post('INSPECT_DATE', true);
		}
		$subdata['formtitle'] = "INSPECTION SCHEDULE TANGGAL ".$tgl." GEDUNG ".$fac;
        $subdata['action']= site_url('C_Inspection/inspect/'.$fac);
        $this->M_Inspection->loadplan($tgl,$fac);
        $subdata['query'] = $this->M_Inspection->tampil_loadplan($tgl,$fac);
        $subdata['banyak'] = $this->M_Inspection->inspect_count($fac);
        $data['content'] = $this->load->view('QIP/Inspection/Inspection_List_non_admin',$subdata,true);
        $this->M_Inspection->drop_loadplan($fac);
		$this->load->view('template/header');
		$this->load->view('QIP/Inspection/inspection_schedule',$subdata);
		$this->load->view('template/footer');
	}

	public function inspect_data($tgl,$fac){
		$this->M_Inspection->loadplan($tgl,$fac);
		$data_inspect = $this->M_Inspection->tampil_loadplan($tgl,$fac);
		$this->M_Inspection->drop_loadplan($fac);
        //$qty_inspect = $this->M_Inspection->inspect_count($fac);
		echo json_encode($data_inspect);
	}


	public function input_inspection($PO){
		$data = array(
            'PO_NO' => $PO
        );
		$insert = $this->M_Inspection->insert_inspection($data);
       
		if($insert == 1)
		{
			$this->session->set_flashdata('message', 'Berhasil yey');
		}else{
			$this->session->set_flashdata('message', 'Tidak Berhasil hmm');
		}
		redirect('C_Inspection/inspect_admin');
	}

	public function insert_status($PO,$STATUS){
		$data = array(
						'PO_NO' => $PO,
						'STATUS_PO' => $STATUS
		);
		$insert = $this->M_Inspection->insert_status($data);
		redirect('C_inspection/list_inspection');
	}

	public function list_inspection(){
		$level = $this->session->userdata('LEVEL');
		$factory = $this->session->userdata('FACTORY');
		$data['pagetitle']="INSPECTION SCHEDULE";
		$subdata['formtitle'] = "LIST DATA INSPECTION SCHEDULE";
		//$subdata['query'] = $this->M_Inspection->list_inspection();
		//$data['content'] = $this->load->view('QIP/Inspection/List_inspection_2',$subdata,true);
		//$this->load->view('template_admin',$data);
		$this->load->view('template/header');
		$this->load->view('QIP/Inspection/template_baru/List_inspection_2',$subdata);
		$this->load->view('template/footer');
		
	}

	public function list_inspection_2(){
		$coba = $this->M_Inspection->list_inspection();
		/*foreach($coba as $tampil){
		}*/
        echo json_encode($coba);
	}

	public function update_status(){
		$data = array(
				'PO_NO' => $this->input->post('PO_NO'),
				'STATUS_PO' => $this->input->post('STATUS_PO')
		);
		$update = $this->M_Inspection->insert_status($data);
		echo json_encode($update);
	}

	public function delete($id){
		
		$this->M_Inspection->delete($id);
		redirect('C_Inspection/list_inspection/');
		
	}

	
	
	





}
