<?php
	class M_Login extends CI_Model{
		public function __construct(){
			parent:: __construct();
		}
		
		public function getUser($akun){
            //query datanya cari ada ato tidak di DB.
            $db2 = $this->load->database('qip',TRUE);
            $d = $this->db->query("SELECT * FROM [QIP].[dbo].[AQL_USER] WHERE USERID= '$akun[USERNAME]' AND PASSWORD='$akun[PASSWORD]' ");
            $dd = $d->row_array();
			//print_r($dd);
			//kalo datanya > 0 maka proses kalo tidak redirect
			if(count($dd) > 0){
				$this->session->set_userdata('USERID',$dd['USERID']);
				$this->session->set_userdata('USERNAME',$dd['USERNAME']);
				$this->session->set_userdata('LEVEL', $dd['LEVEL']);
				$this->session->set_userdata('SIGN', $dd['SIGN']);
				$this->session->set_userdata('logged_in_qip', true);
                // $this->session->set_userdata('FACTORY', $dd['FACTORY']);
			}else{
				redirect('c_login/');
			}
		}
		
		

	}

?>