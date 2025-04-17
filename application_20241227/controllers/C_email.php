<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class C_email extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->library("phpmailer_library");
    }

    public function index() {
        // $this->load->view('email/contact');
        $this->training();
    }

    function send() {
        $this->load->config('email');
        $this->load->library('email');
        
        // $from = $this->config->item('smtp_user');
        // $to = $this->input->post('to');
        // $subject = $this->input->post('subject');
        // $message = $this->input->post('message');

        $this->email->set_newline("\r\n");
        $this->email->from('lutfiaranis@hsinni.com');
        $this->email->to('lutfiaranis@hsinni.com');
        $this->email->subject('coba');
        $this->email->message('cobaaaaaaa');

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }


    function training(){
        $this->load->config('email');
        $this->load->library('email');
        // $title1 = str_replace('%20', ' ', $title);

        $this->email->set_newline("\r\n");
        $this->email->from('quality.system@hsinni.com');
        $this->email->to('lutfiaranis@gmail.com');
        $this->email->subject('[EMAIL-SYSTEM-REMINDER]  Training Today');
        $this->email->set_mailtype('text');

        $message = '';
        $message .= 'Please prepare your training  today..<br><br>
        Good Luck..
        ';
        
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    function send_email2(){
        
            $mail = new PHPMailer(true);                            
            try {
                //Server settings
                $mail->isSMTP();                                     
                $mail->Host = 'mail.hsinni.com';                      
                $mail->SMTPAuth = true;                             
                $mail->Username = 'lutfiaranis';     
                $mail->Password = 'Galangse!@#3';             
                $mail->SMTPOptions = array(
                    'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    )
                );                         
                $mail->SMTPSecure =false;                           
                $mail->Port = 25;                                   

                //Send Email
                $mail->setFrom('panel.alarm@hsinni.com');
                
                //Recipients
                $mail->addAddress('lutfiaranis@hsinni.com');              
                $mail->addReplyTo('panel.alarm@hsinni.com');
                
                //Content
                $mail->isHTML(true);                                  
                $mail->Subject = 'coba kirim email development';
                $mail->Body    = 'coba kirim email development';

                $mail->send();
                
                $_SESSION['result'] = 'Ini email test untuk jpayroll';
                $_SESSION['status'] = 'ok';
            } catch (Exception $e) {
                $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
                $_SESSION['status'] = 'error';
            }

            // header("location: index.php");


    }
}