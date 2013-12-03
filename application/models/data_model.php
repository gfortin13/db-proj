<?php
class Data_model extends CI_Model {

	public function __construct()
	{
		$this->db1 = $this->load->database('main', TRUE);
		//$this->load->library('SSH');
	}
	
	public function testQuery(){
		$query = $this->db1->query('SELECT data FROM test');
		
		return $query->result_array();
	}

	public function createUser($user){
		$sql = "INSERT INTO User (title, first_name, last_name, address, city, 
			province, postal_code, email, department, countryID, orgID, password, date_created) 
			VALUES ('" . $user['title'] . "', '" . $user['first_name'] . "', '" . $user['last_name'] . "', '" . 
			$user['address'] . "', '" . $user['city'] . "', '" . $user['province'] . "', '" . $user['postcode'] . "', '" . 
			$user['email'] . "', '" . $user['department'] . "', " . $user['country'] . ", " . $user['organization'] . ", '" .
			$user['password'] . "', CURRENT_TIMESTAMP)";

		$this->db1->query($sql);
	}

	public function getUserIdByEmail($email){
		$sql = "SELECT userID FROM User WHERE email = '$email'";
	
		$query = $this->db1->query($sql);

		return $query->row_array();
	}

	public function getAdminWithCredentials($credentials){
		$email = $credentials['admin_id'];
		$password = $credentials['password'];
		$sql = "SELECT * FROM Admin WHERE email = '$email' AND password = '$password' LIMIT 1";
		$query = $this->db1->query($sql);

		if($query -> num_rows() == 1)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}

	}
	
	public function getUserWithCredentials($credentials){
		$email = $credentials['email'];
		$password = $credentials['password'];
		$sql = "SELECT * FROM User WHERE email = '$email' AND password = '$password' LIMIT 1";
	
		$query = $this->db1->query($sql);
		if($query -> num_rows() == 1)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}
	
	public function validateUser($email){
		$sql ="UPDATE User SET validated = 1 WHERE email = $email";

		$this->db1->query($sql);
	}

	public function deleteUser($email){
		$sql ="DELETE FROM User WHERE email = $email";

		$this->db1->query($sql);
	}

	public function createConference($conference){
		$sql = "INSERT INTO Conference (title, description, start_date, end_date, shid) 
			VALUES ('" . $conference['name'] . "', '" . $conference['description'] . "', '" . $conference['start_date'] . "', '" . 
			$conference['end_date'] . "', " . $conference['hierarchy'] . ")";

		$this->db1->query($sql);
	}

	public function getConferenceName($id){
		$sql = "SELECT title from Conference WHERE id=$id";

		$query = $this->db1->query($sql);
		if($query -> num_rows() == 1)
		{
			$row = $query->row();
			return $row->title;
		}
		else
		{
			return false;
		}

	}

	public function createEvent($event){
		$sql = "INSERT INTO Events (confID, title, description, start_date, end_date, submission_start, submission_end, review_start, review_end, decision_date)
			VALUES ('" . $event['confID'] . "', '" . $event['description'] . "', '" . $event['start_date'] . "', '" . $event['end_date'] . "', '" . 
				$event['submission_start_date'] . "', '" . $event['submission_end_date'] . "', '" . $event['review_start_date'] . "', '" . $event['review_end_date'] . "', '" . 
				$event['decision_date'] . ")";
		
		$this->db1->query($sql);
	}
}