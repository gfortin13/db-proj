<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_creation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('readonly_model');
	}

	public function index()
	{

	}

}