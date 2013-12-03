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

		$this->form_validation->set_rules('users', 'Users', 'trim|required|xss_clean');


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header', $data);
			$this->load->view('add_committee_member');
			$this->load->view('footer');	
		}

	}
}