<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conference_creation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('readonly_model');
	}

	public function index()
	{
		if(isset($this->session->userdata('admin_logged'))){
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Conference Creation';
			$data['page_title'] = 'Add new conference';

			$this->form_validation->set_rules('name', 'Conference Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('description', 'Conference Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('hierarchy', 'Hierarchy', 'trim|xss_clean');
			$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|xss_clean');
			$this->form_validation->set_rules('end_date', 'Start Date', 'trim|required|xss_clean');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('header', $data);
				$this->load->view('conference_creation');
				$this->load->view('footer');	
			}
			else
			{

			}
		}
		else{
			redirect('adminlogin', 'refresh');
		}
	}

}