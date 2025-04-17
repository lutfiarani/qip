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
       
		$this->load->model('M_stage');
		// $this->load->library('Excel');
        // sesscheck();
    }

	public function index()
	{
        sesscheck();
		$datasub['username']    = $this->session->userdata('USERNAME');
        $datasub['tingkat']     = $this->session->userdata('LEVEL');
        $datasub['formtitle']   = "DEVELOPMENT STAGE";
        $subdata['model']       = $this->M_stage->model();
        $subdata['stage']       = $this->M_stage->stage();
        $subdata['row']         = "";
        $this->load->view('template/header', $datasub);
        $this->load->view('Development/upload_stage', $subdata);
        $this->load->view('template/footer'); 
    }

    public function upload_stage(){
        sesscheck();
        $status     = $this->input->post('status');
        $model      = $this->input->post('model_tampil');
        $article    = strtoupper($this->input->post('article'));
        $model_input= strtoupper($this->input->post('model'));
        $stage      = $this->input->post('stage');
        $date       = $this->input->post('tanggal');
        $remark     = $this->input->post('remark');
       

        $config['upload_path'] = './upload/pdf';
        $config['allowed_types'] ='pdf';
        $config['encrypt_name'] = TRUE;
       
        $this->load->library('upload', $config);

        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
            $pdf    = $data['upload_data']['file_name'];

            if($status=='PASS'){
                // $result = $this->M_stage->save_upload($pdf, $status, $model, $stage, $date, $remark);
                $log    = $this->M_stage->save_log($pdf, $status);
                foreach ($_POST['model_tampil'] as $modelhaha) 
                {
                    $result = $this->M_stage->save_upload($model_input, $article, $pdf, $status, $modelhaha, $stage, $date, $remark);
                    
                }
            }else{
                $this->send_email($pdf, $status, $model_input, $stage, $date, $remark);
                $log    = $this->M_stage->save_log($pdf, $status);
                foreach ($_POST['model_tampil'] as $modelhaha) 
                {
                    $result = $this->M_stage->save_upload($model_input, $article, $pdf, $status, $modelhaha, $stage, $date, $remark);
                    
                }
            }
            
            
            echo json_decode('hore');
        }
    }

    public function upload_edit(){
        sesscheck();
        $config['upload_path'] = './upload/pdf';
        $config['allowed_types'] ='pdf';
        $config['encrypt_name'] = TRUE;
       
        $status     = 'RE-TRIAL PASSED';
        $file_awal  = $this->input->post('id_file');
              
        $this->load->library('upload', $config);

        if($this->upload->do_upload("file2")){
            $data = array('upload_data' => $this->upload->data());
            $pdf    = $data['upload_data']['file_name'];
     
            $result = $this->M_stage->upload_edit($file_awal, $pdf, $status);
            $email = $this-> resend_email($file_awal);
            echo json_decode('hore');
        }
    }

    public function view_upload_stage(){
        // sesscheck();
        $view = $this->M_stage->view_upload_stage();
        echo json_encode($view);
    }

    public function stage(){
        $stage = $this->M_stage->stage();
        echo json_encode($stage);

    }

    public function delete_file(){
        $delete = $this->M_stage->delete_file();
        echo json_encode($delete);
    }

    function send_email($pdf, $status, $model, $stage, $date, $remark) {
    // function send_email(){
        sesscheck();
        $this->load->config('email');
        $this->load->library('email');
        
        $nama_stage = $this->M_stage->nama_stage($stage);
        $nama = $nama_stage->STAGE_NAME;
        $kepada = $this->M_stage->list_email_kirim();

        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to($kepada);
        $this->email->subject('[NO-REPLY] System Alert for Style '.$model.' - ' .$nama.' Fail<br><br><br>');
        $this->email->set_mailtype('html');

        $alamat   = base_url('upload/pdf');
        $message  = '';
        $message .= 'This is email notification for '.$model.' - '.$nama.' Fail need to re-trial.<br>';
        $message .= 'Please hold or reschedule production start related this model until the report result Pass.<br>';
        $message .= $remark;
        $message .= '<br>For detail please click the link bellow.  <br>';
        $message .= '<a href="http://'.$alamat.'/'.$pdf.'">Link File</a>';

        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function resend_email($file_awal){
        sesscheck();
        $this->load->config('email');
        $this->load->library('email');
        

        $file = $this->input->post('nama_file');
        $kepada         = $this->M_stage->list_email_kirim();
        $data           = $this->M_stage->get_file($file_awal);
        $model_input    = $data->MODEL_INPUT;
        $stage          = $data->STAGE_NAME;
        $dokumen        = $data->DOKUMEN_UPDATE;
        
        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to($kepada);
        // $this->email->cc('quality.system@hsinni.com');
        $this->email->subject('[NO-REPLY] System Notification '.$model_input.' - ' .$stage.' Re-Trial Passed');
        $this->email->set_mailtype('html');

        $alamat   = base_url('upload/pdf');
        $message  = '';
        $message .= 'Just to inform you that '.$model_input.' - '.$stage.' Re-Trial has been Passed.<br>';
        $message .= 'It can be continued to the next step.<br>';
        $message .= '<br>For detail please click the link bellow.  <br>';
        $message .= '<a href="http://'.$alamat.'/'.$dokumen.'">Link File</a>';
        $message .= '<br><br>Thank You.  <br>';
        
        $this->email->message($message);

        if ($this->email->send()) {
       
            $update_status = $this->M_stage->update_status($file);
        } else {
            $update_status = show_error($this->email->print_debugger());
        }

       
        echo json_encode($update_status);
    }

    public function tampil_model(){
        echo $this->M_stage->tampil_model();
        // echo json_encode($tampil);
    }

    public function email_lab_test($material_name, $remark){
        // $alamat      = base_url('upload/pdf');
        $this->load->config('email');
        $this->load->library('email');
        
        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to('chris.qip@hsinni.com');
        $this->email->cc('quality.system@hsinni.com');
        $this->email->subject('[NO-REPLY] System Alert Lab Test '.$material_name.' Reject<br><br><br>');
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'This is email notification for '.$material_name.'  need to re-test.<br>';
        $message .= 'Please hold or reschedule production start related this material until the report result Pass.<br>';
        $message .= $remark;
        $message .= '<br>For detail please click the link bellow.  <br>';
        $message .= '<a href="http://10.10.10.98/link">Link File</a>';

        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function email_lab_retest($material_name){
        // $alamat      = base_url('upload/pdf');
        $this->load->config('email');
        $this->load->library('email');
        
        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to('chris.qip@hsinni.com');
        $this->email->cc('quality.system@hsinni.com');
        $this->email->subject('[NO-REPLY] System Notification Lab Test '.$material_name.' Re-test Passed<br><br><br>');
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'Just to inform you '.$material_name.'  Re-test Passed.<br>';
        $message .= 'It can be continued to the next step.<br>';
        $message .= 'Thank you.<br>';
       
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function email_lab_test_dev($model_name, $stage, $remark){
        $this->load->config('email');
        $this->load->library('email');
        
        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to('chris.qip@hsinni.com');
        $this->email->cc('quality.system@hsinni.com');
        $this->email->subject('[NO-REPLY] System Notification '.$model_name.' - FGT '.$stage.' Re Test Passed<br><br><br>');
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'This is email notification for '.$model_name.' - FGT '.$stage.' Fail need to re-test.<br>';
        $message .= 'Please hold or reschedule production start related this material until the report result Pass.<br>';
        $message .= $remark;
        $message .= '<br>For detail please click the link bellow.  <br>';
        $message .= '<a href="http://10.10.10.98/link">Link File</a>';

        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function email_lab_retest_dev($model_name, $stage){
        $this->load->config('email');
        $this->load->library('email');
        
        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to('chris.qip@hsinni.com');
        $this->email->cc('quality.system@hsinni.com');
        $this->email->subject('[NO-REPLY] System Alert '.$model_name.' - FGT '.$stage.' Re-test Passed<br><br><br>');
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'Just to inform you '.$model_name.' - FGT '.$stage.'  Re-test Passed.<br>';
        $message .= 'It can be continued to the next step.<br>';
        $message .= 'Thank you.<br>';

        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function email_lab_test_fgt($model_name, $remark){
        $this->load->config('email');
        $this->load->library('email');
        
        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to('chris.qip@hsinni.com');
        $this->email->cc('quality.system@hsinni.com');
        $this->email->subject('[NO-REPLY] System Alert '.$model_name.' - FGT Prod Fail<br><br><br>');
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'This is email notification for '.$model_name.' - FGT Prod Fail need to re-test.<br>';
        $message .= 'Please hold or reschedule production start related this material until the report result Pass.<br>';
        $message .= $remark;
        $message .= '<br>For detail please click the link bellow.  <br>';
        $message .= '<a href="http://10.10.10.98/link">Link File</a>';

        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function email_lab_retest_fgt($model_name){
        $this->load->config('email');
        $this->load->library('email');
        
        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to('chris.qip@hsinni.com');
        $this->email->cc('quality.system@hsinni.com');
        $this->email->subject('[NO-REPLY] System Notification '.$model_name.' - FGT Prod Re-test Passed<br><br><br>');
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'Just to inform you '.$model_name.' - FGT Prod Re-test Passed.<br>';
        $message .= 'It can be continued to the next step.<br>';
        $message .= 'Thank you.<br>';

        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function get_file(){
        $file   = $this->input->post('nama_file');
        $get    = $this->M_stage->get_file($file);

        echo json_encode($get);
    }

    public function email_list(){
        sesscheck();
		$datasub['username']    = $this->session->userdata('USERNAME');
        $datasub['tingkat']     = $this->session->userdata('LEVEL');
        $datasub['formtitle']   = "EMAIL LIST";
        $subdata['model']       = $this->M_stage->model();
        $subdata['stage']       = $this->M_stage->stage();
        $subdata['row']         = "";
        $this->load->view('template/header', $datasub);
        $this->load->view('Development/email_list', $subdata);
        $this->load->view('template/footer'); 
    }

    public function email_list_(){
        $email = $this->M_stage->email_list();
        echo json_encode($email);
    }

    public function insertEmail(){
        $insert = $this->M_stage->insertEmail();
        echo json_encode($insert);
    }

    public function deleteEmail(){
        $delete = $this->M_stage->deleteEmail();
        echo json_encode($delete);
    }

    public function email(){
        $this->load->config('email');
        $this->load->library('email');
        
        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to('lutfiaranis@hsinni.com');
        
        $this->email->subject('cobva');
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'test ya';
        $message .= 'It can be continued to the next step.<br>';
        $message .= 'Thank you.<br>';

        // echo $message

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function socialization($title, $tanggal, $time){
        $this->load->config('email');
        $this->load->library('email');
        
        $title1 = str_replace('%20', ' ', $title);

        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to('hwi-lab@hsinni.com');
        // $this->email->cc('quality.system@hsinni.com');
        $this->email->subject('[EMAIL-SYSTEM-REMINDER] '.$title1);
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'This is email reminder for socialization '.$title1.' . It will be held '.$tanggal.' at '.$time.'<br>';
        $message .= '--This email will be send to you every day until the socialization done--';
       

        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function calibration(){
        $this->load->config('email');
        $this->load->library('email');
        $penerima = 'cal.lab@hsinni.com,adm.lab@hsinni.com,reny.lab@hsinni.com ';
        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        
        $this->email->to($penerima);
        // $this->email->cc('quality.system@hsinni.com');
        $this->email->subject('[EMAIL-SYSTEM-REMINDER] REMINDER CALIBRATION        ');
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'Hi.., there are some machine need to calibrate soon., please see the list on link below..<br>
        <a href="http://10.10.10.98:8000/admin/Lab/CalibrationExpired">--Link--</a>
        <br>';
        
       

        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function training($variable, $title, $time){
        $this->load->config('email');
        $this->load->library('email');
        $title1 = str_replace('%20', ' ', $title);
        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to($variable);
        // $this->email->cc('quality.system@hsinni.com');
        $this->email->subject('[EMAIL-SYSTEM-REMINDER] '.$title1.' Training Today');
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'Please prepare your training '.$title1.' at '.$time.' today..<br>
        Good Luck..
        ';
        
       

        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function cma_test($po, $title, $speciment){
        $this->load->config('email');
        $this->load->library('email');
        $title1 = str_replace('%20', ' ', $title);
        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $penerima = 'reny.lab@hsinni.com,ysha@hsinni.com,a01.lab@hsinni.com,lab@hsinni.com,bonding.lab@hsinni.com,sistem.lab@hsinni.com ';
        $this->email->to($penerima);
        // $this->email->cc('quality.system@hsinni.com');
        $this->email->subject('[EMAIL-SYSTEM-ALERT] CMA TEST'.$title1.' FAILURE');
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'This Email is to inform you that CMA TEST '.$title1.' Failure PO '.$po.' please open below link for detail <br>
        http://10.10.10.98:8000/files/cma/'.$speciment;
        
       

        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function audit_h1($material, $supplier, $id){
        $this->load->config('email');
        $this->load->library('email');

        $material1  = str_replace('%20', ' ', $material);
        $supplier1  = str_replace('%20', ' ', $supplier);

        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');

        $penerima = 'yulita.dev@hsinni.com,fatma.dev@hsinni.com,erwin.dev@hsinni.com,scbae@hsinni.com,nofi.dev@hsinni.com,nova.dev@hsinni.com,ria.dev@hsinni.com,erlin.dev@hsinni.com,diah.dev@hsinni.com,heti.dev@hsinni.com';

        $this->email->to($penerima);
        
        $this->email->subject('[EMAIL-SYSTEM-ALERT] REPORT REJECT'.$material1.' FROM ' .$supplier1);
        $this->email->set_mailtype('html');

        $message = '';
        $message .= 'Dear Bu Ria, <br>
        Kindly find information for rejected material '.$material1.' from '.$supplier1.'<br>
        For detail please open link<br>

        http://10.10.10.98/admin/Lab/LabtestDev/'.$id.'';

       
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

}
