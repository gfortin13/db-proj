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

		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}
}