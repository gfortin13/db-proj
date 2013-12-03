<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
	}

	public function index()
	{
		$data['title'] = 'ConfSys';
		$data['page_title'] = 'Home';

		$data['global_news'] = $this->data_model->getGlobalNews();

		$data['user'] = $this->session->userdata('logged_in');
		if(isset($data['user'])){
			$data['conferences'] = $this->data_model->getRegisteredConferences();

			$data['conference_news']
		}
		

		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}
}