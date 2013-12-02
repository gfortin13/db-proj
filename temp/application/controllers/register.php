<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('readonly_model');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Register';
		$data['page_title'] = 'Register New Account';

		$data['user'] = $this->input->post();

		$data['user_titles'] = array("Mr." => "Mr.", "Ms." => "Ms.");
		$data['countries'] = $this->readonly_model->getAllCountries();
		$data['organizations'] = $this->readonly_model->getAllOrganizations();

		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header', $data);
			$this->load->view('register');
			$this->load->view('footer');	
		}
		else
		{	
			echo "registered";
			die;
			/*
			// insert account and return it's ID
			$newId = $this->account_model->create_account($data['account']);
			// login session
			$sess_array['id'] = $newId;
			$sess_array['email'] = $data['account']['email'];
			$this->session->set_userdata('logged_in', $sess_array);
			
			redirect('profile', 'refresh');*/
		}
	}
}