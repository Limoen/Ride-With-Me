<?php
	include_once("classes/User.class.php");
	include_once("classes/Tweet.class.php");
	session_start();
	$_SESSION["loggedin"] = false;
	$feedback = "";
	$tweet = new Tweet();
	
	if(!empty($_POST["btnSignup"]))
	{
		try
		{
			$user = new User();
			$user->Name = $_POST["name"];
			$user->Email = $_POST["email"];
			$user->Password = $_POST["password"];
			$user->Register();
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
	if(!empty($_POST["btnTweet"]))
	{
		try
		{
			$tweet->Tweet = $_POST["tweet"];
			$tweet->Save();
		}
		catch(Exception $e)
		{
			$feedback = $e->getMessage();
		}
	}
?>