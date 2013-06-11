<?php
include_once ("Db.class.php");
class Friend {
		private $m_sFriend_Applicant;
		private $m_sFriend_Recipient;
		private $m_sFriend_Status;
		// NIEUW ->
		private $m_sFriend_Recipient_id;
		private $m_sFriend_Applicant_id;
		// <- NIEUW


	public function __set($p_sProperty, $p_vValue) {
		switch($p_sProperty) {
			case "Friend_Applicant" :
					$this -> m_sFriend_Applicant = $p_vValue;
				
				break;
			case "Friend_Recipient" :
					$this -> m_sFriend_Recipient = $p_vValue;
				
				break;
				
			case "Friend_Status" :
					$this -> m_sFriend_Status = $p_vValue;
				
				break;

			//NIEUW ->
			case "Friend_Recipient_id" :
					$this -> m_sFriend_Recipient_id = $p_vValue;
				
				break;

			case "Friend_Applicant_id" :
					$this -> m_sFriend_Applicant_id = $p_vValue;
				
				break;	
			// <- NIEUW
			
		}
	}

	public function __get($p_sProperty) {
		switch($p_sProperty) {
			case "Friend_Applicant" :
				return $this -> m_sFriend_Applicant;
				break;

				case "Friend_Recipient" :
				return $this -> m_sFriend_Recipient;
				break;
				
				case "Friend_Status" :
				return $this -> m_sFriend_Status;
				break;

				// NIEUW ->
				case "Friend_Recipient_id" :
				return $this -> m_sFriend_Recipient_id;
				break;

				case "Friend_Applicant_id" :
				return $this -> m_sFriend_Applicant_id;
				break;
				// <- NIEUW
		}

	}


	public function Saverequest() {
		
		$db = new Db();
		
		$insert = "INSERT INTO friends (
								friend_applicant,
								friend_recipient,
								friend_status,
								friend_recipient_id,
								Friend_applicant_id
						  ) VALUES (
						  		
						  		'" . $db -> mysqli -> real_escape_string($this -> Friend_Applicant) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Friend_Recipient) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Friend_Status) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Friend_Recipient_id) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Friend_Applicant_id) . "'
						  		
						  )";

						$db -> mysqli -> query($insert);
					

	}
	
	public function getFriendById($user_id)
{
$db = new Db();
$select = "SELECT * FROM friends WHERE friend_recipient_id = '" . $user_id . "' ";
$result = $db->mysqli->query($select);
while ($row=mysqli_fetch_assoc($result))
{
return $row['friend_recipient_id'];
}
}

public function getFriendInfoById($user_id)
{
$db = new Db();
$select = "SELECT * FROM friends WHERE friend_recipient_id = '" . $user_id . "' ";
		
		$result = $db -> mysqli -> query($select);
	
		$result_array=array();
		while ($row = mysqli_fetch_array($result)) {
             $result_array[]=$row;                                                                                          
		}
		return $result_array;
		
	}

	public function GetAllFriendRequests($username) {
		$db = new Db();
	
		$select = "SELECT * FROM friends WHERE friend_recipient = '" . $username . "' AND friend_status = 'pending' ORDER BY friend_id DESC";
		
		$result = $db -> mysqli -> query($select);
	
		$result_array=array();
		while ($row = mysqli_fetch_array($result)) {
             $result_array[]=$row;                                                                                          
		}
		return $result_array;
		
	}
	
		
	
	public function GetAllYourFriends($id) {
		$db = new Db();
	
		$select = "SELECT * FROM friends WHERE (friend_recipient_id ='" . $id ."' OR friend_applicant_id = '" . $id . "') AND friend_status = 'Accepted' ORDER BY friend_id ASC";
		
		$result = $db -> mysqli -> query($select);
	
		$result_array=array();
		while ($row = mysqli_fetch_array($result)) {
             $result_array[]=$row;                                                                                          
		}
		return $result_array;
		
	}
	
	
	
	/*
	public function AcceptFriendRequest($username, $applicant){
		$db = new Db();
		$select = "UPDATE friends SET status = 'Accepted' WHERE friend recipient ='" . $username . "' AND friend_applicant = '" . $applicant . "'";  
	
		$result = $db->mysqli->query($select);
		return $data=$result->fetch_assoc();
	}
	
	public function AcceptFriendRequest($username, $applicant){
		$db = new Db();
		$select = "DELETE friends WHERE WHERE friend recipient ='" . $username . "' AND friend_applicant = '" . $applicant . "'";  
	
		$result = $db->mysqli->query($select);
		return $data=$result->fetch_assoc();
	}
	*/
}
?>