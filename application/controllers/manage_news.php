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
		

	}

	public function display_news_to_update($newsID)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['news'] =  $this->phil_model->getNewsById($newsID);

		$this->load->view('header', $data);
		$this->load->view('update_news');
		$this->load->view('footer');

	}

	public function display_add_global_news()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');


		$this->load->view('header');
		$this->load->view('add_global_news');
		$this->load->view('footer');
	}

	public function update_news()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('postDate', 'Date Posted', 'trim|required|xss_clean');

		$data['news'] = $this->input->post();

		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header');
			$this->load->view('update_news');
			$this->load->view('footer');	
		}
		else
		{
			$this->phil_model->updateNews($data['news']);

			$data['title'] = 'Update News Complete';
			$data['page_title'] = 'Update News Complete';

			$data['news'] =  $this->phil_model->getNewsById($data['news']['newsID']);

			$this->load->view('header',$data);
			$this->load->view('update_news_complete');
			$this->load->view('footer');
		}
	}
	public function add_global_news()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('postDate', 'Date Posted', 'trim|required|xss_clean');

		$data['news'] = $this->input->post();

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header');
			$this->load->view('add_global_news');
			$this->load->view('footer');	
		}
		else
		{
			$this->phil_model->createGlobalNews($data['news']);

			$data['title'] = 'Add Global News Complete';
			$data['page_title'] = 'Add Global News Complete';
			
			$this->load->view('header', $data);
			$this->load->view('add_global_news_complete');
			$this->load->view('footer');
		}
	}

	public function delete_news($newsID)
	{
		$this->phil_model->deleteGlobalNews($newsID);

		$this->load->view('header');
		$this->load->view('delete_news_complete');
		$this->load->view('footer');
	}

}