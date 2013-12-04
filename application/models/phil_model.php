
<?php
class Phil_model extends CI_Model {

	public function __construct()
	{
		$this->db1 = $this->load->database('main', TRUE);
	}
	public function updateNews($news)
	{	
		$newsID = $news['newsID'];
		$title = $news['title'];
		$content = $news['content'];
		$postDate = $news['postDate'];

		$sql = "UPDATE News
				SET title = '$title', content = '$content', postDate = '$postDate'
				WHERE newsID = '$newsID'";

		$this->db1->query($sql);
	}
	public function deleteGlobalNews($news)
	{
		$newsID = $news['newsID'];
		$sql = "DELETE FROM News
				WHERE newsID='$newsID'";

		$this->db1->query($sql);
	}
	public function createGlobalNews($news)
	{
		$title = $news['title'];
		$content = $news['content'];
		$postDate = $news['postDate'];

		$sql = "INSERT INTO News (title, content, postDate) 
				VALUES ('" . $title . "', '" . $content . "', '" . $postDate . "')";

		$this->db1->query($sql);

		$sql = "SELECT newsID 
				FROM News 
				WHERE title = '$title' AND content = '$content' AND postDate = '$postDate' 
				LIMIT 1";
		
		$query = $this->db1->query($sql);

		$newsIDResult = $query->row_array();

		$newsID = $newsIDResult['newsID'];

		$sql = "INSERT into GlobalNews (newsID)
				VALUES ('" . $newsID . "')";

		$this->db1->query($sql);
	}

	public function getNewsById($newsID)
	{
		$sql = "SELECT newsID, title, content, postDate FROM News WHERE newsID = '$newsID'";
	
		$query = $this->db1->query($sql);

		return $query->row_array();
	}
}