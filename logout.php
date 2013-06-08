<?php
// logout session op false zetten om uit te loggen en terug te keren naar het startscherm
	$_SESSION["loggedin"] = false;
	header("Location: index.php");
?>