<?php
	include_once("classes/User.class.php");
	
	session_start();
	$_SESSION["loggedin"] = false;
	$feedback = "";
	
	$user = new User();
	if(isset($_POST["btnSignup"]))
	{
		try
		{
			
			$newName = time() . $_FILES['upload']['name'];
			move_uploaded_file($_FILES['upload']['tmp_name'],
	    	"uploads/" . $newName);
			$user->Bug_Name  = $_FILES['upload']['name'];
			$user->NewName = $newName;
			$user->Name = $_POST["name"];
			$user->Surname = $_POST["surname"];
			$user->Phone = $_POST["phone"];
			$user->Email = $_POST["email"];
			$user->Password = $_POST["password"];
			$user->Country = $_POST["country"];
			$user->State = $_POST["state"];
			$user->Bio = $_POST["bio"];
			$user->City = $_POST["city"];
			$user->Street = $_POST["street"];
			$user->Register();
				$feedback = "Awesome, You just signed up!"; 
		}
		catch(Exception $e)
		{
			$feedback = $e->getMessage();
		}
	}
	if(!empty($_POST["btnLogin"]))
	{
		try
		{
			$user = new User();
			$user->Name = $_POST["username"];
			$user->Password = $_POST["password"];
			$user->Login();
		}
		catch(Exception $e)
		{
			$feedback = $e->getMessage();
		}
	}
	
?>