<?php
	include_once("Db.class.php");
	class User
	{
		private $m_sUsername;
		private $m_sFullname;
		private $m_sPhone;
		private $m_sEmail;
		private $m_sPassword;
		private $m_sCountry;
		private $m_sState;
		private $m_sCity;
		private $m_sStreet;
		private $m_sBio;
		private $m_sBug_Image;
		private $m_sBug_Name;
	private $m_sNewName;
		
		public function __set($p_sProperty, $p_vValue)
		{
			switch($p_sProperty)
			{
				case "Username":
				if(!empty($p_vValue))
				{
					$this->m_sUsername = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Give me your  name, please");
					
				}
				break;
				
				case "Fullname":
				if(!empty($p_vValue))
				{
					$this->m_sFullname = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Give me your full name, please");
					
				}
				break;
				
				case "Phone":
				if(!empty($p_vValue))
				{
					$this->m_sPhone = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Give me your phone number, please");
				}
				break;
				
				case "Email":
				if(!empty($p_vValue))
				{
					$this->m_sEmail = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Give me a correct email, please");
				}
				break;
				
				case "Password":
				if(!empty($p_vValue))
				{
					$this->m_sPassword = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Give me a correct password, sir");
				
				}
				break;
				
				case "Country":
				if(!empty($p_vValue))
				{
					$this->m_sCountry = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Select a country, please");
				
				}
				break;
				
				case "State":
				if(!empty($p_vValue))
				{
					$this->m_sState = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Select a state, please");
				
				}
				break;
				
				case "City":
				if(!empty($p_vValue))
				{
					$this->m_sCity = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Select a city, please");
				
				}
				break;
				
				case "Street":
				
					$this->m_sStreet = $p_vValue;
				
				
				break;
				case "NewName":
				
					$this->m_sNewName = $p_vValue;
					break;
				
				case "Bio":
				if(!empty($p_vValue))
				{
					$this->m_sBio = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Tell something more about your self, please");
				
				}
				break;
			}
		}
		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case "Username":
				return $this->m_sUsername;
				break;
				case "Fullname":
				return $this->m_sFullname;
				break;
				case "Phone":
				return $this->m_sPhone;
				break;
				case "Email":
				return $this->m_sEmail;
				break;
				case "Password":
				return $this->m_sPassword;
				break;
				case "Country":
				return $this->m_sCountry;
				break;
				case "State":
				return $this->m_sState;
				break;
				case "City":
				return $this->m_sCity;
				break;
				case "Street":
				return $this->m_sStreet;
				break;
				case "NewName":
				return $this->m_sNewName;
				break;
				case "Bio":
				return $this->m_sNewName;
				break;
			}
		}
		public function Register()
		{
			$salt = "ab4p73wo5n3ig247xb1w9r";
			$db = new Db();
			$insert = "INSERT INTO users (
						  username,
						  email,
						  password,
						  fullname,
						  phone,
						  country,
						  state,
						  city,
						  street,
						  avatar,
						  bio
					  ) VALUES (
						  '" . $db->mysqli->real_escape_string($this->m_sUsername) . "',
						  '" . $db->mysqli->real_escape_string($this->m_sEmail) . "',
						  '". $db->mysqli->real_escape_string(md5($this->m_sPassword . $salt)) . "',
						   '" . $db->mysqli->real_escape_string($this->m_sFullname) . "',
						    '" . $db->mysqli->real_escape_string($this->m_sPhone) . "',
						     '" . $db->mysqli->real_escape_string($this->m_sCountry) . "',
						      '" . $db->mysqli->real_escape_string($this->m_sState) . "',
						      '" . $db->mysqli->real_escape_string($this->m_sCity) . "',
						      '" . $db->mysqli->real_escape_string($this->m_sStreet) . "',
						      '" . $db -> mysqli -> real_escape_string($this -> m_sNewName) . "',
						      '" . $db->mysqli->real_escape_string($this->m_sBio) . "'
					  )";
			$select = "SELECT * FROM users WHERE username = '" . $db->mysqli->real_escape_string($this->Username) . "';";
			$result = $db->mysqli->query($select);
			if($result->num_rows == 0)
			{
				$db->mysqli->query($insert);
				session_start();
				$_SESSION["loggedin"] = true;
				$_SESSION["username"] = $this->Username;
				
				//header("Location: searchRides.php");
			
			}
			else 
			{
				throw new Exception("Username already taken");
			}
		}
		public function Login()
		{
			$salt = "ab4p73wo5n3ig247xb1w9r";
			$db = new Db();
			$select = "SELECT * FROM users WHERE username = '" . $db->mysqli->real_escape_string($this->Username) .
					  "' AND password = '" . $db->mysqli->real_escape_string(md5($this->Password . $salt)) . "';";
			$result = $db->mysqli->query($select);
			if($result->num_rows == 1)
			{
				$_SESSION["loggedin"] = true;
				$_SESSION["username"] = $this->Username;
			
				header("Location: searchRides.php");
			}
			else
			{
				throw new Exception("Please enter correct username and password");
			}
		}
		
		public function getUserById($user_id)
	{
		$db = new Db();
		$select = "SELECT * FROM users WHERE user_id=".$user_id.";";
		
		$result = $db->mysqli->query($select);
		return $data=$result->fetch_assoc();
	}
	
	public function getUserByName($username)
{
$db = new Db();
$select = "SELECT user_id FROM users WHERE username = '" . $_SESSION["username"] . "';";
$result = $db->mysqli->query($select);
while ($row=mysqli_fetch_assoc($result))
{
return $row['user_id'];
}
}

public function UsernameAvailable($p_username)
	{
		$db = new Db();
		$sql = "SELECT * FROM users WHERE username = '" . $p_username . "'";
		$result = $db->mysqli->query($sql);
		
		
		// RECORDS TELLEN
		$numberOfRecords = mysqli_num_rows($result);
		if($numberOfRecords == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	}
?>