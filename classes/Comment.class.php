<?php
	include_once("Db.class.php");
	class Comment
	{
		private $m_sComment;
		
		
		public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case "Comment":
				$this->m_sComment = $p_vValue;
				break;
				
				
			}
		}
		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case "Comment":
				return $this->m_sComment;
				break;
				
				
			}
		}

		public function SaveComment($ride_id,$name)
		{
			
			if(!empty($_POST["comment"]))
			{
				
				$db = new Db();
				$insert = "INSERT INTO comments (
								username, 
								comment_text,
								ride_id
						  ) VALUES (
						  		'" . $name . "',
						  		'" . $db->mysqli->real_escape_string($this->Comment) . "',
						  		'" . $db->mysqli->real_escape_string($ride_id) . "'
						  		
						  		
						  )";
				$db->mysqli->query($insert);
			}
			else 
			{
				throw new Exception("Can't post empty comments");
			}
		}	
		
		
		public function GetAllComments($ride_id) {
		$db = new Db();
	
		$select = "SELECT * FROM comments WHERE ride_id =" . $ride_id . " ORDER BY comment_id DESC";
		
		$result = $db -> mysqli -> query($select);
	
		$result_array=array();
		while ($row = mysqli_fetch_array($result)) {
             $result_array[]=$row;                                                                                          
		}
		return $result_array;
		
	}
		
	}
?>