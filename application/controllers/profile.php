<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
		$this->load->model('readonly_model');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'User Profile';
		$data['page_title'] = 'User Profile';

		$data['user'] = $this->session->userdata('logged_in');

		echo "User array: <br />";
		print_r($data['user']);
		echo "<br />";

		$data['user_titles'] = array("Mr." => "Mr.", "Ms." => "Ms.");
		$data['countries'] = $this->readonly_model->getAllCountries();
		$data['organizations'] = $this->readonly_model->getAllOrganizations();

		/*echo "<pre>";
		print_r($data['countries']);
		echo "</pre>";
		die;*/
		$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
		$this->form_validation->set_rules('organization', 'Organization', 'trim|required|xss_clean');
		$this->form_validation->set_rules('department', 'Department', 'trim|required|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|xss_clean');
		$this->form_validation->set_rules('city', 'City', 'trim|xss_clean');
		$this->form_validation->set_rules('province', 'Province', 'trim|xss_clean');
		$this->form_validation->set_rules('postcode', 'Postcode', 'trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_email_matches');
		$this->form_validation->set_rules('conf_email', 'Confirm email', 'trim|required|xss_clean');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header', $data);
			$this->load->view('profile');
			$this->load->view('footer');	
		}
		else
		{
			$data['title'] = 'Registe Complete';
			$data['page_title'] = 'Register Complete';
			
			$data['user']['password'] = $this->_generateRandomString(8);
			$this->data_model->createUser($data['user']);
			$newId = $this->data_model->getUserIdByEmail($data['user']['email']);
			$data['user']['userId'] = $newId['userID'];

			if(false){
				mail($data['user']['email'], "Your user account", "Your user ID to connect is " . $newId);
				mail($data['user']['email'], "Your user password", "Your user ID to connect is " . $data['user']['password']);
				
			}
			$this->load->view('header', $data);
			$this->load->view('register_complete');
			$this->load->view('footer');
		}
	}

	public function email_matches($email)
	{
		$confirm_email = $this->input->post('conf_email');

		if($email == $confirm_email)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('email_matches', 'Email does not match please verify.');
		 	return false;
		}
	}

	private function _generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
   		}
    	return $randomString;
	}
}