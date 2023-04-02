<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phpmailer_lib extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();

        require "vendor\phpmailer\phpmailer\PHPMailerAutoload";
        $this->Bizmailer = new PHPMailer();
        //Set the required config parameters
        $this->Bizmailer->isSMTP();                                      // Set mailer to use SMTP
        $this->Bizmailer->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        $this->Bizmailer->SMTPAuth = true;                               // Enable SMTP authentication
        $this->Bizmailer->Username = 'user@example.com';                 // SMTP username
        $this->Bizmailer->Password = 'secret';                           // SMTP password
        $this->Bizmailer->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->Bizmailer->Port = 465;    
        //return $api;
    }

}
