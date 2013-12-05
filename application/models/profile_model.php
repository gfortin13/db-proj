<?php
class Profile_model extends CI_Model
{
	public function __construct()
	{
		$this->db1 = $this->load->database('main', TRUE);
	}

	public function updateUser($user)
	{
		$sql ="UPDATE User
			   SET title = '".$user['title']."', first_name = '".$user['first_name']."', last_name = '".$user['last_name']."',
			       address = '".$user['address']."', city = '".$user['city']."', province = '".$user['province']."',
			       postal_code = '".$user['postalcode']."', email = '".$user['email']."', department = '".$user['department']."',
			       countryID = '".$user['countryID']."', orgID = '".$user['orgID']."' 
			   WHERE userID = '".$user['user']['user']['userID']."'";

		$this->db1->query($sql);
	}
}