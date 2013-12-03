<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_news extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('phil_model');
			$this->load->model('data_model');
		}
	public function index()
	{
		$data['admin'] = $this->session->userdata('admin_logged');
		if(isset($data['admin'])){
			$data["news"] = $this->phil_model->
		}
		else
		{
			redirect('adminlogin', 'refresh');
		}

	}



}