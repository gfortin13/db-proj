<?php
class Test_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		//$this->load->library('SSH');
	}
	
	public function testQuery(){
		$query = $this->db->query('SELECT data FROM test');
		
		return $query->row_array();
	}
}