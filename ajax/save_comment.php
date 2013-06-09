<?php	
include_once("../classes/Comment.class.php");
session_start();

if(isset($_POST["comment"]))
	{
		try
		{
			$comment = $_POST['comment'];
			$ride_id = $_POST['id'];
		
			
			$c = new Comment();
			$c->Comment = $comment;
	
			$c->SaveComment($ride_id,$_SESSION['username'],$comment);
			$feedback['comment']=$comment;
			$feedback['name']= $_SESSION['username'];
			$feedback['status'] = "success";
		}
		catch(Exception $e)
		{
			$feedback['message'] = $e->getMessage();
			$feedback['status'] = "error";
			
		}
		header('Content-Type: application/json');
		echo json_encode($feedback);
	}
	?>