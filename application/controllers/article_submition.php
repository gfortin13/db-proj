<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_submition extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('data_model');
		//$this->load->model('readonly_model');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['user'] = $this->session->userdata('logged_in');
		$data['page_title'] = "Tomas is the best :)";

		echo "<pre>";
		print_r($data['user']);
		echo "</pre>";

		$this->load->view('header', $data);
		$this->load->view('article_submition');
		$this->load->view('footer');
	}
}