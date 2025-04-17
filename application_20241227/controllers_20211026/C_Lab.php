<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Lab extends CI_Controller {

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
       
        $this->load->model('M_Lab');
        sesscheck();
    }

	public function index()
	{
        $subdata['query'] = $this->M_Lab->coba2();
        //$data['content'] = $this->load->view('QIP/Lab/coba_select',$subdata,true);
		//$this->load->view('template2',$data);
       
	}

	
}
