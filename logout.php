<?php
// logout session op false zetten om uit te loggen en terug te keren naar het startscherm
	session_start();
	session_destroy();
	header("Location: index.php");
?>