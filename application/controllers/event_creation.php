<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_creation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('readonly_model');
	}


	public function index()
	{
		
	}

	public function create($confID)
	{
		$data['confID'] = $confID;

		$data['confName'] = $this->data_model->getConferenceName($confID);

		$data['admin'] = $this->session->userdata('admin_logged');
		if(isset($data['admin'])){
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Event Creation';
			$data['page_title'] = 'Add new event';

			$data['hierarchy'] = $this->readonly_model->getAllSubjects();

			$this->form_validation->set_rules('name', 'Event Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('description', 'Event Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('hierarchy', 'Hierarchy', 'trim|xss_clean');
			$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('end_date', 'Start Date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('submission_start_date', 'Submission Start Date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('submission_end_date', 'Submission End Date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('review_start_date', 'Review Start Date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('review_end_date', 'Review End Date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('decision_date', 'Decision Date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('chair_email', 'Program Chair E-mail', 'trim|required|valid_email|xss_clean|callback_user_exists');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('header', $data);
				$this->load->view('event_creation');
				$this->load->view('footer');	
			}
			else
			{
				$data['event'] = $this->input->post();
				$data['event']['confID'] = $data['confID'];

				$data['eventID'] = $this->data_model->createEvent($data['event']);
				$data['event']['eventID'] = $data['eventID'];

				$data['program_chair'] = $this->program_chair;
				$data['roleID'] = $this->data_model->getRoleID("Program Chair");
				$data['program_chair']['roleID'] = $data['roleID'];	

				$this->data_model->registerToEvent($data['event'], $data['program_chair']);
				
				
			}
		}
		else{
			redirect('adminlogin', 'refresh');
		}


	}
	public function user_exists($chair_email){
		$this->program_chair = $this->data_model->getUserByEmail($chair_email);
		//echo "<pre>";
		//print_r($data['program_chair']);
		//echo "</pre>";
		//die;
		if ($this->program_chair == false)
		{
			$this->form_validation->set_message('chair_email', 'Email does not belong to any user in the system');
			return false;
		}
		else
		{
			return true;
		}
	}

}