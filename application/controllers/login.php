<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Login';
		$data['page_title'] = 'Log In';

		/*echo "<pre>";
		print_r($data['countries']);
		echo "</pre>";
		die;*/
		$this->form_validation->set_rules('user_id', 'User ID', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_valid_credentials');

		

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('header', $data);
			$this->load->view('login');
			$this->load->view('footer');	
		}
		else
		{
			$data['user'] = $this->user;

			/*echo "<pre>";
			print_r($data['user']);
			echo "</pre>";*/

			if($data['user']['validated']){
				// login session
				$sess_array['user'] = $data['user'];
				$this->session->set_userdata('logged_in', $sess_array);
				redirect('profile', 'refresh');
			}
			else{
				if($this->_less_than24H($data['user'])){
					$this->data_model->validateUser($data['user']['userID']);
					// login session
					$sess_array['user'] = $data['user'];
					$this->session->set_userdata('logged_in', $sess_array);
					redirect('profile', 'refresh');
				}
				else{
					$this->data_model->deleteUser($data['user']['userID']);

					redirect('register', 'refresh');
				}
			}
			echo "logging in..";
			die;
		}
	}

	public function valid_credentials($password){
		$data['credential'] = $this->input->post();
		$this->user = $this->data_model->getUserWithCredentials($data['credential']);
		
		if($this->user){
			return TRUE;
		}
		else{
			$this->form_validation->set_message('valid_credentials', 'User ID or password do not match.');
		 	
			return FALSE;
		}
	}

	private function _less_than24H($user){
		/*$datetime1 = new DateTime($user['date_created']);
		$datetime2 = new DateTime(date("Y-m-d H:i:s"));
		$interval = $datetime1->diff($datetime2);
		if($interval->format('%i') < 1440){
			return TRUE;
		}
		else{
			return false;
		}*/
		return true;
	}
}