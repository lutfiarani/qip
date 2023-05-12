<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {

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
       
        $this->load->model('M_Login');
        
    }

	public function index()
	{
       
		$this->load->view('login');
	}

	public function masuk(){
        $akun = array(
                'USERNAME' => $this->input->post('username'),
                'PASSWORD' => $this->input->post('password')   
        ); //data loginnya
        $login = $this->M_Login->getUser($akun); // mencari data di user dimana username dan paswornya sesuai dg data login.
       // print_r($akun);
        $level = $this->session->userdata('LEVEL');
        // session_start();  
        if(isset($_POST["username"]))  
        {  
            $_SESSION["name"] = $_POST["username"];  
            $_SESSION['last_login_timestamp'] = time();  
            
            // header("location:index.php");      
            if($level == 1){
                redirect('C_Export/admin'); 
                // header('location: C_Export/admin'); 
            }else if(($level == 2)||($level == 3)){
                redirect('C_aql_inspect/input_aql'); 
                // header('location : C_aql_inspect/input_aql'); 
                
            }else if($level == 6){
                redirect('C_Export/po_validation'); 
                // header('location : C_aql_inspect/input_validation'); 
            }else if($level == 7){
                redirect('C_Inspection/input_schedule_ppic'); 
                // header('location : C_aql_inspect/input_validation'); 
            }  else if(($level == 5)||($level == 4)){
                redirect('C_aql_inspect/inspect_list'); 
                // header('location : C_aql_inspect/input_validation'); 
            }else if(($level == 8)){
                redirect('C_dev_stage'); 
                // header('location : C_aql_inspect/input_validation'); 
            }
             
        } 


        // echo $level;
       
        
        if('username' == null || 'username'==""){
            alert ("username harus diisi");
            redirect('C_Login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->session->set_userdata(array('name'=> null, 'USERID'=>null, 'USERNAME'=>null, 'USERNAME'=>null, 'LEVEL'=>null, 'SIGN'=>null, 'logged_in_qip'=>false));
        redirect('C_Export/');
    }





}
