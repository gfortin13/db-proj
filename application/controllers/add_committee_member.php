<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_committee_member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('readonly_model');
		$this->load->model('steve_model');
	}


	public function index(){
		
	}

	public function add($eventID){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['users'] = $this->steve_model->getAllUsers();
		$data['eventID'] = $eventID;
		$data['event']['eventID'] = $data['eventID'];

		$this->form_validation->set_rules('userID', 'User', 'trim|required|xss_clean');


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header', $data);
			$this->load->view('add_committee_member');
			$this->load->view('footer');	
		}
		else
		{
			$data['committee_member'] = $this->input->post();
			$data['roleID'] = $this->data_model->getRoleID("Program Committee");
			
			$data['committee_member']['roleID'] = $data['roleID'];

			$this->data_model->registerToEvent($data['event'], $data['committee_member']);

		}

	}
}