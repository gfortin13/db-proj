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
		$sql = "SELECT * FROM Article WHERE articleID=$articleID";

		$query = $this->db1->query($sql);
		return $query->row_array();
	}

	public function submitReview($reviewerID, $articleID, $review){
		$sql = "INSERT INTO Reviews (userID, articleID, score, confidence, originality, public_comments, chair_comments) 
			VALUES ('" . $reviewerID . "', '" . $articleID . "', '" . $review['score'] . "', '" . 
			$review['confidence'] . "', '" . $review['originality'] . "', '" . $review['public_comments'] . "', '" . $review['chair_comments'] . "')";

		$this->db1->query($sql);
	}
}