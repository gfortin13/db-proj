<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('test_model');
		$this->load->model('readonly_model');
	}

	public function index()
	{
		$data['title'] = 'Test';
		$data['page_title'] = 'test';

		$data['test'] = $this->test_model->testQuery();
		$data['readonly'] = $this->readonly_model->testQuery();
		/*echo "<pre>";
		print_r($data['test']);
		print_r($data['readonly']);
		echo "</pre>";
		die;*/

		$this->load->view('header', $data);
		$this->load->view('test');
		$this->load->view('footer');
	}
}