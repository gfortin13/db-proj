<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
{
	var $header;
	var $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('readonly_model');
		$this->load->model('profile_model');
	}

	public function index()
	{
		$this->loadHelperModules();
		$this->setPageTitles();		

		$this->data['user'] = $this->session->userdata('logged_in');

		$this->data['user_titles'] = array("Mr." => "Mr.", "Ms." => "Ms.");
		$this->data['countries'] = $this->readonly_model->getAllCountries();
		$this->data['organizations'] = $this->readonly_model->getAllOrganizations();
		
		$this->data['first_name'] = $this->data['user']['user']['first_name'];
		$this->data['last_name'] = $this->data['user']['user']['last_name'];
		$this->data['address'] = $this->data['user']['user']['address'];
		$this->data['city'] = $this->data['user']['user']['city'];
		$this->data['province'] = $this->data['user']['user']['province'];
		$this->data['postalcode'] = $this->data['user']['user']['postal_code'];
		$this->data['email'] = $this->data['user']['user']['email'];
		$this->data['department'] = $this->data['user']['user']['department'];
		$this->data['title'] = $this->data['user']['user']['title'];
		$this->data['countryID'] = $this->data['user']['user']['countryID'];
		$this->data['orgID'] = $this->data['user']['user']['orgID'];

		$this->show();
	}

	public function update()
	{
		$this->loadHelperModules();

		$this->data['user'] = $this->session->userdata('logged_in');
		$this->data['fields'] = $this->input->post();

		$this->data['user_titles'] = array("Mr." => "Mr.", "Ms." => "Ms.");
		$this->data['countries'] = $this->readonly_model->getAllCountries();
		$this->data['organizations'] = $this->readonly_model->getAllOrganizations();
		
		$this->data['first_name'] = $this->data['fields']['first_name'];
		$this->data['last_name'] = $this->data['fields']['last_name'];
		$this->data['address'] = $this->data['fields']['address'];
		$this->data['city'] = $this->data['fields']['city'];
		$this->data['province'] = $this->data['fields']['province'];
		$this->data['postalcode'] = $this->data['fields']['postcode'];
		$this->data['email'] = $this->data['fields']['email'];
		$this->data['department'] = $this->data['fields']['department'];
		$this->data['title'] = $this->data['fields']['title'];
		$this->data['countryID'] = $this->data['fields']['country'];
		$this->data['orgID'] = $this->data['fields']['organization'];

		if ($this->data['user']['user']['first_name'] != $this->data['fields']['first_name'] ||
			$this->data['user']['user']['last_name'] != $this->data['fields']['last_name'] ||
			$this->data['user']['user']['address'] != $this->data['fields']['address'] ||
			$this->data['user']['user']['city'] != $this->data['fields']['city'] ||
			$this->data['user']['user']['province'] != $this->data['fields']['province'] ||
			$this->data['user']['user']['postal_code'] != $this->data['fields']['postcode'] ||
			$this->data['user']['user']['email'] != $this->data['fields']['email'] ||
			$this->data['user']['user']['department'] != $this->data['fields']['department'] ||
			$this->data['user']['user']['title'] != $this->data['fields']['title'] ||
			$this->data['user']['user']['countryID'] != $this->data['fields']['country'] ||
			$this->data['user']['user']['orgID'] != $this->data['fields']['organization'])
		{
			$this->profile_model->updateUser($this->data);
			$this->setPageTitles('Profile Updated');
			$this->show('profile_updated');
		}
		else
		{
			$this->setPageTitles();
			$this->show();
		}
	}

	private function loadHelperModules()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	private function setPageTitles($default = 'User Profile')
	{
		$this->header['title'] = $default;
		$this->header['page_title'] = $default;
	}

	private function show($page = 'profile')
	{
		$this->load->view('header', $this->header);
		$this->load->view($page, $this->data);
		$this->load->view('footer');
	}
}