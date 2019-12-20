<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
	 parent::__construct();
	 if(!$this->session->userdata('id'))
	 {
	  redirect('login');
	 }
	}
	public function index()
	{
		$this->load->model('user_model');
		$data['fetch_data'] = $this->user_model->fetch_data();
		$this->load->view('dashbord_view',$data);
	}
	function logout()
 {
  $data = $this->session->all_userdata();
  foreach($data as $row => $rows_value)
  {
   $this->session->unset_userdata($row);
  }
  redirect('login');
 }
}