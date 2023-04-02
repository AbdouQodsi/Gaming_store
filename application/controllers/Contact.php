<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->library('email');
    }


	public function index() {
        if ($this->session->userdata('Active_login') === TRUE ) {
            $this->load->view('help');
            }
	}

	function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'ssl://smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'abdouqod2005@gmail.com';
        $mail->Password = 'mammunqzklcwinek';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        // $mail->setFrom('info@example.com', 'CodexWorld');
        // $mail->addReplyTo('info@example.com', 'CodexWorld');

        // Add a recipient
        $mail->addAddress('abdouqod2005@gmail.com');

        // Add cc or bcc 
        $mail->addCC($this->input->post('email'));
        $mail->addBCC($this->input->post('email'));

        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = $this->input->post('message');
			// $mailContent .= $this->input->post('message');
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }


	

}
