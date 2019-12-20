<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('register_model');


    }
	public function index()
	{
		$this->load->view('register_view');
	}
	public function test()
	{
		$this->load->view('email_verification');
	}
	function validate_captcha() {
        $captcha = $this->input->post('g-recaptcha-response');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdwnMgUAAAAABcYCBVpb63w6xNQJWB7U-1h0IfO&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
      
            $this->session->set_flashdata('message', 'Sorry Google Recaptcha Unsuccessful!!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function validation()
    {
        $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'required');
        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Please check the  captcha form');
        if($this->form_validation->run())
        {
        $verification_key = md5(rand());
        $encrypted_password = $this->encryption->encrypt($this->input->post('user_password'));
        $data = array(
            'name'  => $this->input->post('user_name'),
            'email'  => $this->input->post('user_email'),
            'password' => $encrypted_password,
            'verification_key' => $verification_key
        );
        $id = $this->register_model->insert($data);
        if($id > 0)
        {
            $subject = "Please verify email for login";
            $message = "
            <p>Hi ".$this->input->post('user_name')."</p>
            <p>This is email verification mail from Register system. For complete registration process and login into system. First you want to verify you email by click this <a href='".base_url()."register/verify_email/".$verification_key."'>link</a>.</p>
            <p>Once you click this link your email will be verified and you can login into system.</p>
            <p>Thanks,</p>
            ";
            //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
            $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_port' => 587,
            'smtp_user'  => 'omarwx', 
            'smtp_pass'  => '+TbcL2^vfk&S!LH', 
            'mailtype'  => 'html',
            'charset'    => 'iso-8859-1',
            'wordwrap'   => TRUE
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('info@webslesson.info');
            $this->email->to($this->input->post('user_email'));
            $this->email->subject($subject);
            $this->email->message($message);
            if($this->email->send())
            {
            $this->session->set_flashdata('message', 'Check in your email for email verification mail');
            redirect('register');
            }
        }
        }
        else
        {
            $this->session->set_flashdata('error_msg', 'Please check the  captcha form');
            redirect('register');
        }
    }
    function verify_email()
    {
     if($this->uri->segment(3))
     {
      $verification_key = $this->uri->segment(3);
      if($this->register_model->verify_email($verification_key))
      {
       $data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'login">here</a></h1>';
      }
      else
      {
       $data['message'] = '<h1 align="center">Invalid Link</h1>';
      }
      $this->load->view('email_verification', $data);
     }
    }
   
}
