<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dev_stage extends CI_Controller {

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
       
		// $this->load->model('M_stage');
		// $this->load->library('Excel');
        sesscheck();
    }

	public function index()
	{
		$datasub['username'] = $this->session->userdata('USERNAME');
        $datasub['tingkat'] = $this->session->userdata('LEVEL');
        $datasub['formtitle'] = "DAILY AQL INSPECTION";
        $this->load->view('template/header', $datasub);
        $this->load->view('Development/upload_stage');
        $this->load->view('template/footer');
    }


}
