<?php
include_once ("Db.class.php");
class Ride {
	private $m_dRide_Date;
	private $m_tRide_Time;
		private $m_sRide_Country;
		private $m_sRide_State;
		private $m_sRide_City;
		private $m_sRide_Street;
		private $m_iRide_StreetNumber;
		private $m_sRide_CountryTo;
		private $m_sRide_StateTo;
		private $m_sRide_CityTo;
		private $m_sRide_StreetTo;
		private $m_iRide_StreetNumberTo;
		private $m_sRide_Description;
		private $m_iRide_Seats;

	public function __set($p_sProperty, $p_vValue) {
		switch($p_sProperty) {
			
			case "Ride_Date" :
			if(!empty($p_vValue))
			{
				$this -> m_dRide_Date = $p_vValue;
			}
			else
			{
				throw new Exception("Ow! Give a date for your ride please, please");
			}
			break;
		
			case "Ride_Time" :
			if(!empty($p_vValue))
			{
				$this -> m_tRide_Time = $p_vValue;
			}
			else
			{
				throw new Exception("Ow! Give a start hour for your ride please, please");
			}
			break;
		
			case "Ride_Country" :
				if(!empty($p_vValue) && $p_vValue != "Select Country")
			{
				$this -> m_sRide_Country = $p_vValue;
			}
			else
			{
				throw new Exception("Ow! Select a country for your ride, please");
			}
			break;
				
			case "Ride_State" :
			if(!empty($p_vValue) && $p_vValue != "Select State")
			{
				$this -> m_sRide_State = $p_vValue;
			}
			else
			{
				throw new Exception("Ow! Select a state for your ride, please");
			}
			break;
				
			case "Ride_City" :
			if(!empty($p_vValue) && $p_vValue != "Select City")
			{
				$this -> m_sRide_City = $p_vValue;
			}
			else
			{
				throw new Exception("Ow! Select a city for your ride, please");
			}
			break;	
		
			case "Ride_Street" :
			if(!empty($p_vValue))
			{
				if(is_numeric($p_vValue) == false) {
					$this -> m_sRide_Street = $p_vValue;
				} else {
					throw new Exception("Ow! Give a correct departing street name, please. No numbers");
				}
			}
			else
			{
				throw new Exception("Could we get your departing street, please?");
			}
			break;
			
			case "Ride_StreetNumber" :
			if(!empty($p_vValue))
			{
				if(is_numeric($p_vValue) == true) {
					$this -> m_iRide_StreetNumber = $p_vValue;
				} else {
					throw new Exception("Ow! That ain't no number, son!");
				}
			}
			else
			{
				throw new Exception("Ow! You forgot a street number!");
			}
			break;			
			
			case "Ride_CountryTo" :
				if(!empty($p_vValue) && $p_vValue != "Select Country")
			{
				$this -> m_sRide_CountryTo = $p_vValue;
			}
			else
			{
				throw new Exception("Ow! Select a country for your ride, please");
				
			}
			break;
				
			case "Ride_StateTo" :
			if(!empty($p_vValue) && $p_vValue != "Select State")
			{
				$this -> m_sRide_StateTo = $p_vValue;
			}
			else
			{
				throw new Exception("Ow! Select a state for your ride, please");
			}
			break;
				
			case "Ride_CityTo" :
			if(!empty($p_vValue) && $p_vValue != "Select City")
			{
				$this -> m_sRide_CityTo = $p_vValue;
			}
			else
			{
				throw new Exception("Ow! Select a city for your ride, please");
			}
			break;	

			case "Ride_StreetTo" :
			if(!empty($p_vValue))
			{
				if(is_numeric($p_vValue) == false) {
					$this -> m_sRide_Street = $p_vValue;
				} else {
					throw new Exception("Ow! Give a correct destination street name, please. No numbers");
				}
			}
			else
			{
				throw new Exception("Could we get your destination street, please?");
			}
			break;
				
			case "Ride_StreetNumberTo" :
			if(!empty($p_vValue))
			{
				if(is_numeric($p_vValue) == true) {
					$this -> m_iRide_StreetNumber = $p_vValue;
				} else {
					throw new Exception("Ow! That ain't no destination number, son!");
				}
			}
			else
			{
				throw new Exception("Ow! You forgot a destination street number!");
			}
			break;			
				
			case "Ride_Description" :
			$this -> m_sRide_Description = $p_vValue;
			break;	
			
			case "Ride_Seats" :
			if(!empty($p_vValue))
			{
				if(is_numeric($p_vValue) == true) {
					$this -> m_iRide_Seats = $p_vValue;
				} else {
					throw new Exception("Ow! That ain't no destination number, son!");
				}
			}
			else
			{
				throw new Exception("How many people will you be taking along?");
			}
			break;	
		}
	}

	public function __get($p_sProperty) {
		switch($p_sProperty) {
			case "Ride_Date" :
				return $this -> m_dRide_Date;
				break;
			
			case "Ride_Time" :
				return $this -> m_tRide_Time;
				break;
			
			case "Ride_Country" :
				return $this -> m_sRide_Country;
				break;

				case "Ride_State" :
				return $this -> m_sRide_State;
				break;
				
				case "Ride_City" :
				return $this -> m_sRide_City;
				break;
				
				case "Ride_Street" :
				return $this -> m_sRide_Street;
				break;
				
				case "Ride_StreetNumber" :
				return $this -> m_iRide_StreetNumber;
				break;
				
				case "Ride_CountryTo" :
				return $this -> m_sRide_CountryTo;
				break;

				case "Ride_StateTo" :
				return $this -> m_sRide_StateTo;
				break;
				
				case "Ride_CityTo" :
				return $this -> m_sRide_CityTo;
				break;
				
				case "Ride_StreetTo" :
				return $this -> m_sRide_StreetTo;
				break;
				
				case "Ride_StreetNumberTo" :
				return $this -> m_iRide_StreetNumberTo;
				break;
				
				case "Ride_Description" :
				return $this -> m_sRide_Description;
				break;
				
				case "Ride_Seats" :
				return $this -> m_iRide_Seats;
				break;
	
		}

	}

	// Bug opslaan. Allemaal velden, een optionele image en een sessienaam worden meegegeven.
	public function SaveRide() {

		$db = new Db();
		$insert = "INSERT INTO rides (
								ride_date,
								ride_time,
								ride_country,
								ride_state,
								ride_city,
								ride_street,
								ride_streetnumber,
								ride_countryto,
								ride_stateto,
								ride_cityto,
								ride_streetto,
								ride_streetnumberto,
								ride_description,
								ride_seats,
								username
								
					
						  ) VALUES (
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_Date) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_Time) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_Country) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_State) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_City) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_Street) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_StreetNumber) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_CountryTo) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_StateTo) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_CityTo) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_StreetTo) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_StreetNumberTo) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_Description) . "',
						  		'" . $db -> mysqli -> real_escape_string($this -> Ride_Seats) . "',
						  		'" . $_SESSION["username"] . "'
						  )";

						$db -> mysqli -> query($insert);

	}
	
	public function getRidesByName($username)
{
$db = new Db();
$select = "SELECT ride_id FROM rides WHERE username = '" . $_SESSION["username"] . "';";
$result = $db->mysqli->query($select);
while ($row=mysqli_fetch_assoc($result))
{
return $row['ride_id'];
}
}

	public function getRideById($ride_id)
	{
		$db = new Db();
		$select = "SELECT * FROM rides WHERE ride_id=".$ride_id.";";
		
		$result = $db->mysqli->query($select);
		return $data=$result->fetch_assoc();
	}
	/*
// Alle bugs tonen. Eerst in een array stoppen en deze dan uitlussen op de show_bugs page.
	public function GetAllBugs() {
		$db = new Db();

	
		$select = "SELECT * FROM tblbugs ORDER BY bug_id DESC";
		$result = $db -> conn -> query($select);
		//var_dump($select);
		$result_array=array();
		while ($row = mysqli_fetch_array($result)) {
             $result_array[]=$row;                                                                                          
		}
		return $result_array;
		
	}*/
	// Alle bugs tonen afh van username, die als variabele wordt megegeven (sessie['name']). Eerst in een array stoppen en deze dan uitlussen op de show_bugs page. 
	public function GetAllYourRides($username) {
		$db = new Db();
	
		$select = "SELECT * FROM rides WHERE username = '" . $username . "' ORDER BY ride_id DESC";
		
		$result = $db -> mysqli -> query($select);
	
		$result_array=array();
		while ($row = mysqli_fetch_array($result)) {
             $result_array[]=$row;                                                                                          
		}
		return $result_array;
		
	}
	/*
	public function GetAllRidesByUsername() {
		$db = new Db();
	
		$select = "SELECT * FROM rides WHERE ORDER BY ride_id DESC";
		
		$result = $db -> mysqli -> query($select);
	
		$result_array=array();
		while ($row = mysqli_fetch_array($result)) {
             $result_array[]=$row;                                                                                          
		}
		return $result_array;
		
	}
	*/
	/*
	
	public function getBugById($bug_id)
	{
		$db = new Db();
		$select = "SELECT * FROM tblbugs WHERE bug_id=".$bug_id.";";
		
		$result = $db->conn->query($select);
		return $data=$result->fetch_assoc();
	}
	
	// Status van een bepaalde bug (bepaald adhv bug_id) wijzigen als deze unsolved is.
	public	function changeBugStatus($bug_id)
	{
		$db = new Db();
		$select = "UPDATE tblbugs SET bug_status = 'solved' WHERE bug_id =" . $bug_id . " AND bug_status = 'unsolved' AND name ='" .  $_SESSION['name'] . "'";
		$result = $db->conn->query($select);
	}
	
	// Projecten tonen die gelijk zijn aan de value die is geselecteerd in de selectbox (wordt bepaald door de paramaeter choice_project) en de sessienaam gelinkt is aan de bug_to of de sessienaam 
	public function GetAllBugsByProjectName($Choice_project, $username) {
		$db = new Db();
		$select = "SELECT * FROM tblbugs WHERE project_title = '" .  $Choice_project . "' AND (name = '" . $username . "'OR bug_to = '" . $username . "')"; 
		$result = $db -> conn -> query($select);
		$result_array=array();
		while ($row = mysqli_fetch_array($result)) {
			   $result_array[]=$row;                                                                                    
		}
		return $result_array;
	 
	
	}
		// Bugs tonen die gelijk zijn aan de value die is geselecteerd in de selectbox (wordt bepaald door de paramaeter choice_status) en de sessienaam gelinkt is aan de bug_to of de sessienaam 
	
	public function GetAllBugsByBugStatus($Choice_status, $username) {
		$db = new Db();
		$select = "SELECT * FROM tblbugs WHERE bug_status = '" .  $Choice_status . "'AND (name =  '" . $username . "' OR bug_to = '" . $username . "')"; 
		$result = $db -> conn -> query($select);
		$result_array=array();
		while ($row = mysqli_fetch_array($result)) {
			   $result_array[]=$row;                                                                                    
		}
		return $result_array;
	 
	
	}
	*/
}
?>