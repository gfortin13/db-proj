<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'AdminLogin';
		$data['page_title'] = 'Log In';

		/*echo "<pre>";
		print_r($data['countries']);
		echo "</pre>";
		die;*/
		$this->form_validation->set_rules('admin_id', 'Admin ID', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_validateAdmin');

		

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header', $data);
			$this->load->view('adminlogin');
			$this->load->view('footer');	
		}
		else
		{
			$data['admin'] = $this->admin;
			$sess_array['admin'] = $data['admin'];
			$this->session->set_userdata('adminlogged', $sess_array);
			redirect('adminProfile', 'refresh');
			/*echo "<pre>";
			print_r($data['user']);
			echo "</pre>";*/
			
		}
	}
	public function validateAdmin(){
		$data['credential'] = $this->input->post();
		$this->admin = $this->data_model->getAdminWithCredentials($data['credential']);
	if($this->admin){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('valid_credentials', 'Admin ID or password do not match.');
			return FALSE;
		}
	}
}