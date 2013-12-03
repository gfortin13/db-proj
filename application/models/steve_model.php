<?php
class Steve_model extends CI_Model {

	public function __construct()
	{
		$this->db1 = $this->load->database('main', TRUE);
		//$this->load->library('SSH');
	}
	
	public function getAllUsers(){
		$sql ="SELECT * FROM User";

		$query = $this->db1->query($sql);
		return $query->result_array();
	}
	public function getArticleById($articleID){
		$sql = "SELECT * FROM Article WHERE articleID=$articleID"

		$query = $this->db1->query($sql);
		return $query->row_array();
	}
}