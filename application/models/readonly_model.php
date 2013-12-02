<?php
class Readonly_model extends CI_Model {

	public function __construct()
	{
		
		$this->db2 = $this->load->database('readonly', TRUE);

		//$this->load->database();
		//$this->load->library('SSH');
	}
	
	public function getAllCountries(){
		$query = $this->db2->query('SELECT * FROM country');
		
		return $query->result_array();
	}

	public function getAllOrganizations(){
		$query = $this->db2->query('SELECT * FROM org');
		
		return $query->result_array();
	}

	public function getAllSubjects(){
		$query = $this->db2->query('SELECT * FROM sh');
		
		return $query->result_array();
	}
}