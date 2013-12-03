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
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['articleID'] = $articleID;
		$articleInfo = $this->steve_model->getArticleById($articleID);
		$data['title'] = $articleInfo['title'];
		$data['abstract'] = $articleInfo['abstract'];
		$data['subject'] = $this->readonly_model->getSubjectCnameById($articleInfo['shid']);

		$data['fileID'] = $articleInfo['fileID'];


		$this->form_validation->set_rules('chair_comments', 'Comments to Program Chair', 'trim|required|xss_clean');
		$this->form_validation->set_rules('public_comments', 'Comments to Author', 'trim|required|xss_clean');
		$this->form_validation->set_rules('score', 'Article Score', 'trim|required|xss_clean');
		$this->form_validation->set_rules('confidence', 'Confidence Level', 'trim|required|xss_clean');
		$this->form_validation->set_rules('originality', 'Originality', 'trim|required|xss_clean');
		

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header', $data);
			$this->load->view('review_article');
			$this->load->view('footer');	
		}
		else
		{
			$data['review'] = $this->input->post();
			$userLoggedIn = $this->session->userdata('logged_in');
			$data['reviewerID'] = $userLoggedIn['user']['userID'];
			$this->steve_model->submitReview($data['reviewerID'], $data['articleID'], $data['review']);
			
		}



	}

	public function update($articleID)
	{
		$this->load->helper('form');
		
		$this->load->library('form_validation');

		$userLoggedIn = $this->session->userdata('logged_in');
		$data['reviewerID'] = $userLoggedIn['user']['userID'];

		$data['articleID'] = $articleID;
		$articleInfo = $this->steve_model->getArticleById($articleID);
		$data['title'] = $articleInfo['title'];
		$data['abstract'] = $articleInfo['abstract'];
		$data['subject'] = $this->readonly_model->getSubjectCnameById($articleInfo['shid']);

		$data['fileID'] = $articleInfo['fileID'];

		$reviewInfo = $this->steve_model->getReviewById($data['reviewerID'], $data['articleID']);
		$data['public_comments'] = $reviewInfo['public_comments'];
		$data['chair_comments'] = $reviewInfo['chair_comments'];

		$this->form_validation->set_rules('chair_comments', 'Comments to Program Chair', 'trim|required|xss_clean');
		$this->form_validation->set_rules('public_comments', 'Comments to Author', 'trim|required|xss_clean');
		$this->form_validation->set_rules('score', 'Article Score', 'trim|required|xss_clean');
		$this->form_validation->set_rules('confidence', 'Confidence Level', 'trim|required|xss_clean');
		$this->form_validation->set_rules('originality', 'Originality', 'trim|required|xss_clean');
		

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header', $data);
			$this->load->view('update_review');
			$this->load->view('footer');	
		}
		else
		{
			$data['review'] = $this->input->post();
			$this->steve_model->updateReview($data['reviewerID'], $data['articleID'], $data['review']);
			
		}

	}

}