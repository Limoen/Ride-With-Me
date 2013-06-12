<?php
include_once ("Db.class.php");
class Checkin {
	private $m_sUser_Applicant;
	private $m_sDriver;
	private $m_iRide_id;
	private $m_iUser_Applicant_id;
	private $m_iDriver_id;
	
	public function __set($p_sProperty, $p_vValue) {
		switch($p_sProperty) {
			case "User_Applicant" :
			$this -> m_sUser_Applicant = $p_vValue;
			break;
			
			case "Driver" :
			$this -> m_sDriver = $p_vValue;
			break;
			
			case "Ride_id" :
			$this -> m_iRide_id = $p_vValue;
			break;
			
			case "User_Applicant_id" :
			$this -> m_iUser_Applicant_id = $p_vValue;
			break;
			
			case "Driver_id" :
			$this -> m_iDriver_id = $p_vValue;
			break;
		}
	}
	
	public function __get($p_sProperty) {
		switch($p_sProperty) {
			case "User_Applicant" :
			return $this -> m_sUser_Applicant;
			break;
			
			case "Driver" :
			return $this -> m_sDriver;
			break;
			
			case "Ride_id" :
			return $this -> m_iRide_id;
			break;
			
			case "User_Applicant_id" :
			return $this -> m_iUser_Applicant_id;
			break;
			
			case "Driver_id" :
			return $this -> m_iDriver_id;
			break;
		}
	}
	
	public function Savecheckin() {
		
		$db = new Db();
		
		$insert = "INSERT INTO checkin (
								checkin_applicant,
								checkin_driver,
								checkin_ride_id,
								checkin_applicant_id,
								checkin_driver_id
						  ) VALUES (
						  		'" . $db -> mysqli -> real_escape_string($this -> User_Applicant) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Driver) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_id) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> User_Applicant_id) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Driver_id) . "'
						  )";

		$db -> mysqli -> query($insert);
	}
}


?>