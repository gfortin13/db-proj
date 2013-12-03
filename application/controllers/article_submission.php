<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_submition extends CI_Controller
{
	var $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		//$this->load->model('readonly_model');
	}

	public function index()
	{
		$this->loadHelperModules();
		$this->setPageTitles();		

		//$this->data['user'] = $this->session->userdata('logged_in');
		$this->data['user']['email'] = "test@test.com";

		if (empty($this->data['user']))
		{
			$this->showPage();
		}
		else if($this->validateAuthor())
		{
			$this->showPage();
		}
	}

	public function submit()
	{
		$this->loadHelperModules();
		$this->setPageTitles();

		$this->form_validation->set_rules('paper_title', 'Paper_title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('paper_abstract', 'Paper_abstract', 'trim|required|xss_clean');
		$this->form_validation->set_rules('paper_file', 'Paper_file', 'trim|required|xss_clean');
		$this->form_validation->set_rules('key_words', 'Key_words', 'trim|required|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			$this->showPage();
		}
		else
		{
			$this->load->view('header', $this->data);
			$this->load->view('article_submition');
			$this->load->view('footer');
		}
	}

	private function loadHelperModules()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	private function setPageTitles()
	{
		$this->data['title'] = 'Article Submition';
		$this->data['page_title'] = "Article Submition";
	}

	private function showPage()
	{
		$this->load->view('header', $this->data);
		$this->load->view('article_submition');
		$this->load->view('footer');
	}

	private function validateAuthor()
	{
		/*
		logic to check if the user is really an author here!!!
		*/
		
		// get userID from email
		// check if the userID is an author
		// if yes return true
		// else return false

		return true;
	}
}