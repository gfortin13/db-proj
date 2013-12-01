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
	
	public function getUserWithCredentials($credentials){
		$userId = $credentials['user_id'];
		$password = $credentials['password'];
		$sql = "SELECT * FROM User WHERE userID = $userId AND password = '$password' LIMIT 1";
	
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

	public function validateUser($userID){
		$sql ="UPDATE User SET validated = 1 WHERE userID = $userID";

		$this->db1->query($sql);
	}

	public function deleteUser($userID){
		$sql ="DELETE FROM User WHERE userID = $userID";

		$this->db1->query($sql);
	}
}