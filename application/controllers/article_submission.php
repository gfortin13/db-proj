<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_submission extends CI_Controller
{
	var $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_submission_model');
		$this->load->model('readonly_model');

	}

	public function index()
	{
		$this->loadHelperModules();
		$this->setPageTitles();

		$this->data['user'] = $this->session->userdata('logged_in');
		$this->data['subjects'] = $this->readonly_model->getAllSubjects();

		if (empty($this->data['user']) || !$this->validateAuthor())
		{
			$this->show('article_submission_invalid');
		}
		else
		{
			$this->show();
		}
	}

	public function submit()
	{
		$this->data['user'] = $this->session->userdata('logged_in');

		$this->loadHelperModules();
		$this->setPageTitles();

		$config['upload_path'] = './article_upload/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']	= '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$config['file_name'] = ($this->article_submission_model->getMaxFileID() + 1).".pdf";

		$this->load->library('upload', $config);

		$this->form_validation->set_rules('paper_title', 'Paper Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('paper_abstract', 'Paper Abstract', 'trim|required|xss_clean');
		$this->data['u_file'] = $_FILES['paper_file'];
		$this->data['u_file']['location'] = $config['upload_path']."".$config['file_name'];

		if ($this->form_validation->run() !== FALSE && !empty($this->data['u_file']) && $this->upload->do_upload('paper_file'))
		{
			$this->data['fields'] = $this->input->post();

			$this->article_submission_model->submitPaper($this->data['fields'], $this->data['u_file'], $this->data['user']['user']);

			$this->show('article_submission_complete');
		}
		else
		{
			$this->show();
		}
	}

	private function loadHelperModules()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	private function setPageTitles()
	{
		$this->data['title'] = 'Article Submission';
		$this->data['page_title'] = "Article Submission";
	}

	private function show($page = 'article_submission', $errors = NULL)
	{
		$this->load->view('header', $this->data);
		$this->load->view($page, $this->data);
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