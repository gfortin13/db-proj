
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
		$sql = "DELETE FROM GlobalNews
				WHERE newsID='$newsID'";

		$this->db1->query($sql);
	}
	public function createNews($news)
	{
		$sql = "INSERT INTO News (title, content, postDate) 
				VALUES ('" . $news['title'] . "', '" . $news['content'] . "', '" . $news['postDate'] . "')";

		$this->db1->query($sql);
	}
}