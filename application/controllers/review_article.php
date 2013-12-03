<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review_article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('readonly_model');
		$this->load->model('steve_model');
	}


	public function index()
	{
		
	}

	public function review($articleID)
	{
		$data['articleID'] = $articleID;
		$data['articleInfo'] = $this->steve_model->getArticleById($articleID);

		$this->load->view('header', $data);
		$this->load->view('event_creation');
		$this->load->view('footer');	



	}

}