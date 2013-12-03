<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filedownload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('steve_model');
	}

	public function index()
	{
		
	}
	public function file($fileID){
		$this->load->helper('download');

		$fileLocation = $this->steve_model->getFileLocation($fileID);
		$data = file_get_contents($fileLocation);
		$name = 'article.pdf';

		force_download($name, $data);

	}
}