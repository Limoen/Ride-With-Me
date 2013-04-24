<?php
	include_once("Db.class.php");
	class User
	{
		private $m_sName;
		private $m_sEmail;
		private $m_sPassword;
		
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
					throw new Exception("Ow! Give me your full name, sir");
					
				}
				break;
				case "Email":
				if(!empty($p_vValue))
				{
					$this->m_sEmail = $p_vValue;
				}
				else
				{
					throw new Exception("Ow! Give me a correct email, sir");
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
			}
		}
		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case "Name":
				return $this->m_sName;
				break;
				case "Email":
				return $this->m_sEmail;
				break;
				case "Password":
				return $this->m_sPassword;
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
						  password
					  ) VALUES (
						  '" . $db->mysqli->real_escape_string($this->m_sName) . "',
						  '" . $db->mysqli->real_escape_string($this->m_sEmail) . "',
						  '". $db->mysqli->real_escape_string(md5($this->m_sPassword . $salt)) . "'
					  )";
			$select = "SELECT * FROM users WHERE name = '" . $db->mysqli->real_escape_string($this->Name) . "';";
			$result = $db->mysqli->query($select);
			if($result->num_rows == 0)
			{
				$db->mysqli->query($insert);
				session_start();
				$_SESSION["loggedin"] = true;
				$_SESSION["name"] = $this->Name;
				throw new Exception("Welcome to Ride with.me!");
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
				header("Location: rwm_menu.php");
			}
			else
			{
				throw new Exception("Please enter correct username and password");
			}
		}
	}
?>