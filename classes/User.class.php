<?php
	include_once("Db.class.php");
	class User
	{
		private $m_sName;
		private $m_sSurname;
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
				case "Name":
				if(!empty($p_vValue))
				{
					$this->m_sName = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Give me your  name, please");
					
				}
				break;
				
				case "Surname":
				if(!empty($p_vValue))
				{
					$this->m_sSurname = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Give me your surname, please");
					
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
				case "Name":
				return $this->m_sName;
				break;
				case "Surname":
				return $this->m_sSurname;
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
						  name,
						  email,
						  password,
						  surname,
						  phone,
						  country,
						  state,
						  city,
						  street,
						  avatar,
						  bio
					  ) VALUES (
						  '" . $db->mysqli->real_escape_string($this->m_sName) . "',
						  '" . $db->mysqli->real_escape_string($this->m_sEmail) . "',
						  '". $db->mysqli->real_escape_string(md5($this->m_sPassword . $salt)) . "',
						   '" . $db->mysqli->real_escape_string($this->m_sSurname) . "',
						    '" . $db->mysqli->real_escape_string($this->m_sPhone) . "',
						     '" . $db->mysqli->real_escape_string($this->m_sCountry) . "',
						      '" . $db->mysqli->real_escape_string($this->m_sState) . "',
						      '" . $db->mysqli->real_escape_string($this->m_sCity) . "',
						      '" . $db->mysqli->real_escape_string($this->m_sStreet) . "',
						      '" . $db -> mysqli -> real_escape_string($this -> m_sNewName) . "',
						      '" . $db->mysqli->real_escape_string($this->m_sBio) . "'
					  )";
			$select = "SELECT * FROM users WHERE name = '" . $db->mysqli->real_escape_string($this->Name) . "';";
			$result = $db->mysqli->query($select);
			if($result->num_rows == 0)
			{
				$db->mysqli->query($insert);
				session_start();
				$_SESSION["loggedin"] = true;
				$_SESSION["name"] = $this->Name;
				$_SESSION["surname"] = $this->Surname;
				$_SESSION["profile_photo"] = $this->NewName;
				header("Location: searchRides.php");
			
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
			$select = "SELECT * FROM users WHERE name = '" . $db->mysqli->real_escape_string($this->Name) .
					  "' AND password = '" . $db->mysqli->real_escape_string(md5($this->Password . $salt)) . "';";
			$result = $db->mysqli->query($select);
			if($result->num_rows == 1)
			{
				$_SESSION["loggedin"] = true;
				$_SESSION["name"] = $this->Name;
				$_SESSION["surname"] = $this->Surname;
				$_SESSION["profile_photo"] = $this->NewName;
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
	
	}
?>