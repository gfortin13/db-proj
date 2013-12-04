<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_articles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('readonly_model');
		$this->load->model('steve_model');
	}


	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$userLoggedIn = $this->session->userdata('logged_in');
		$data['articles'] = $this->steve_model->getArticlesByUser($userLoggedIn['user']['userID']);

		$this->load->view('header', $data);
		$this->load->view('view_articles');
		$this->load->view('footer');	


	}

	public function view($articleID){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['article'] = $this->steve_model->getArticleById($articleID);


		$this->load->view('header', $data);
		$this->load->view('view_article');
		$this->load->view('footer');

	}

	public function view_articles_from_event($eventID){
		$data['articles'] = $this->steve_model->getArticlesByEvent($eventID);

		$this->load->view('header', $data);
		$this->load->view('view_event_articles');
		$this->load->view('footer');	


	}
}