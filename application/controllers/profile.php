<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
{
	var $data;

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		echo "hello!!!";
	}

	private function loadHelperModules()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	private function setPageTitles()
	{
		$this->data['title'] = 'User Profile';
		$this->data['page_title'] = "User Profile";
	}

	private function show($page = 'profile', $errors = NULL)
	{
		$this->load->view('header', $this->data);
		$this->load->view($page, $errors);
		$this->load->view('footer');
	}
}