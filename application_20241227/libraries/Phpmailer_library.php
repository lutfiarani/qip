<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Phpmailer_library
{
    public function __construct()
    {
        log_message('Debug', 'PHPMailer class is loaded.');
    }

    public function load()
    {
        
        require_once(APPPATH."vendor/phpmailer/src/Exception.php");
        require_once(APPPATH."vendor/phpmailer/src/PHPMailer.php");
        require_once(APPPATH."vendor/phpmailer/src/SMTP.php");
        require_once(APPPATH."vendor/autoload.php");

        $objMail = new PHPMailer;
        return $objMail;
    }
}

?>