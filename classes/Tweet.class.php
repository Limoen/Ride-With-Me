<?php
	include_once("Db.class.php");
	class Tweet
	{
		private $m_sTweet;
		
		public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case "Tweet":
				$this->m_sTweet = $p_vValue;
				break;
			}
		}
		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case "Tweet":
				return $this->m_sTweet;
				break;
			}
		}
		public function Save()
		{
			if(!empty($_POST["tweet"]))
			{
				$db = new Db();
				$insert = "INSERT INTO tweets (
								name, 
								tweet
						  ) VALUES (
						  		'" . $_SESSION["name"] . "',
						  		'" . $db->mysqli->real_escape_string($this->Tweet) . "'
						  )";
				$db->mysqli->query($insert);
			}
			else 
			{
				throw new Exception("Can't post empty tweets");
			}	
		}
		public function getAll()
		{
			$db = new Db();
			$select = "SELECT * FROM tweets WHERE name = '" . $_SESSION["name"] . "' ORDER BY id DESC";
			$result = $db->mysqli->query($select);
			while($row = mysqli_fetch_array($result))
			{
				echo "<div class='tweets'>" . $row["tweet"] . "</div>";
				echo "<hr />";
			}
		}
	}
?>