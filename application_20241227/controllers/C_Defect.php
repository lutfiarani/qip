<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Defect extends CI_Controller {

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
       
        $this->load->model('M_Defect');
        //sesscheck();
    }

	public function index()
	{
        $this->M_Defect->ranking();
        $data['nama1'] = $this->M_Defect->nama_defect(1);
        $data['defect1'] = $this->M_Defect->defect_per_hour(1);
        $this->load->view('QIP/Defect/top3defect1',$data);
		$this->M_Defect->hapus_ranking();
		
    }
    
   

    public function defect2()
	{
        
        $this->M_Defect->ranking();
        $data['nama2'] = $this->M_Defect->nama_defect(2);
        $data['defect2'] = $this->M_Defect->defect_per_hour(2);
        $this->load->view('QIP/Defect/top3defect2',$data);
		$this->M_Defect->hapus_ranking();
	}

	public function defect3()
	{
        $this->M_Defect->ranking();
        $data['nama3'] = $this->M_Defect->nama_defect(3);
        $data['defect3'] = $this->M_Defect->defect_per_hour(3);
        $this->load->view('QIP/Defect/top3defect3',$data);
		$this->M_Defect->hapus_ranking();
	}
	
}
