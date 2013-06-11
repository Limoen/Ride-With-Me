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
				throw new Exception("What is it you want us to call you?");
				
			}
			break;
			
			case "Fullname":
			if(!empty($p_vValue))
			{
				if(is_numeric($p_vValue) == false) {
					$this->m_sFullname = $p_vValue;
				} else {
					throw new Exception("You real name seems quite... numeric. Let's fix that");
				}
			}
			else
			{
				throw new Exception("Could we get your full name, please?");
				
			}
			break;
			
			case "Phone":
			if(!empty($p_vValue))
			{
				if(is_numeric($p_vValue) == true) {
					$this->m_sPhone = $p_vValue;
				} else {
					throw new Exception("That would be the first phone number with letters I've seen!");
				}
			}
			else
			{
				throw new Exception("Could we get your phone number? Perhaps get a drink?");
			}
			break;
			
			case "Email":
			if(!empty($p_vValue))
			{
				$this->m_sEmail = $p_vValue;
			}
			else
			{
				throw new Exception("We could do well with your email address");
			}
			break;
			
			case "Password":
			if(!empty($p_vValue))
			{
				$this->m_sPassword = $p_vValue;
			}
			else
			{
				throw new Exception("Get me a password, and make it snappy");
			
			}
			break;
			
			case "Country":
			if(!empty($p_vValue))
			{
				$this->m_sCountry = $p_vValue;
			}
			else
			{
				throw new Exception("So, what country are you from?");
			
			}
			break;
			
			case "State":
			if(!empty($p_vValue))
			{
				$this->m_sState = $p_vValue;
			}
			else
			{
				throw new Exception("Home is where... what state is?");
			
			}
			break;
			
			case "City":
			if(!empty($p_vValue))
			{
				$this->m_sCity = $p_vValue;
			}
			else
			{
				throw new Exception("Home sweet home... in?");
			
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
				throw new Exception("We'd like to get to you know you, please tell me more");
			
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