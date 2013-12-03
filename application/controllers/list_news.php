<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class List_news extends CI_Controller {

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
			$data['globalNews'] = $this->data_model->getGlobalNews();
			$this->load->view('header', $data);
			$this->load->view('global_news');
			$this->load->view('footer');
		}
		else
		{
			redirect('adminlogin', 'refresh');
		}

	}
}