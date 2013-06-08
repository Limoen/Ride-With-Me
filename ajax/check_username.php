<?php
	include_once('../classes/User.class.php');
	$user = new User();
	$name = $_POST['username']; // deze username verwijst naar de ajaxcall
	
	if($user->UsernameAvailable($name))
	{
		// OK
		$feedback['status'] = "success";
		$feedback['message'] = "Username is available :-)";
	}
	else
	{
		// NIET OK
		$feedback['status'] = "error";
		$feedback['message'] = "Username is unavailable :-(";
	}
	header('Content-Type: application/json');
	echo json_encode($feedback);
?>