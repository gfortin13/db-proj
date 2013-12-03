<?php
class Article_submission_model extends CI_Model 
{
	public function __construct()
	{
		$this->db1 = $this->load->database('main', TRUE);
	}

	public function submitPaper($fields, $file)
	{
		$file_id = $this->saveFile($file);

		// save in article table :)
		$sql = "INSERT INTO Article (title, abstract, fileID, finalDecision, shID) VALUES ('".$fields['paper_title']."', '".$fields['paper_abstract']."', $file_id, 'processing', 1824)";
		$this->db1->query($sql);
	}

	private function saveFile($file)
	{
		$sql = "INSERT INTO Files (name, size, location) VALUES ('".$file['name']."', '".$file['size']."', '".$file['location']."')";
		$this->db1->query($sql);

		return $this->getMaxFileID();
	}

	public function getMaxFileID()
	{
		$sql = "SELECT MAX(fileID) as fileID FROM Files";
		$query = $this->db1->query($sql);

		return $query->row()->fileID;
	}
}