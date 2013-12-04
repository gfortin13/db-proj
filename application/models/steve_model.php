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

	public function getReviewById($reviewerID, $articleID){
		$sql = "SELECT * from Reviews WHERE userID=$reviewerID AND articleID=$articleID";

		$query = $this->db1->query($sql);

		return $query->row_array();
	}

	public function updateReview($reviewerID, $articleID, $review){
		$sql = "UPDATE Reviews SET score = '" . $review['score'] . "', confidence = '" . $review['confidence'] . "', 
		originality = '" . $review['originality'] . "', public_comments = '" . $review['public_comments'] . "', chair_comments = '" . $review['chair_comments'] . "' 
		WHERE userID = $reviewerID AND articleID = $articleID";

		$this->db1->query($sql);
	}

	public function getFileLocation($fileID){
		$sql = "SELECT location FROM Files WHERE fileID = $fileID";

		$query = $this->db1->query($sql);
		$row = $query->row();
		return $row->location;
	}

	public function getArticlesByUser($userID){
		$sql = "SELECT * FROM Article INNER JOIN Submits on Article.articleID = Submits.articleID where Submits.userID = $userID";

		$query = $this->db1->query($sql);
		return $query->result_array();
	}

	public function getArticlesByEvent($eventID){
		$sql = "SELECT * FROM Submits INNER JOIN Article ON Submits.articleID = Article.articleID WHERE Submits.eventID = $eventID";

		$query = $this->db1->query($sql);
		return $query->result_array();
	}
}