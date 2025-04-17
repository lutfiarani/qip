<?php

function sesscheck(){
  $CI =& get_instance();
  $is_logged_in = $CI->session->userdata('logged_in_qip');
     if($is_logged_in)
     {
       $output = new stdClass;
       $output->user_id = $CI->session->userdata('USERID');
       return $output;
     }else{
        // redirect('C_Export/');
        echo '<script type="text/javascript">alert("Session Habis");window.location = "'.base_url().'index.php/C_export/";</script>';
     }
}
