<?php
include_once ("rwm_logica.php");
?><!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>IMD Talks</title>
		<link rel="stylesheet" href="css/normalize.css" media="all">
		<link rel="stylesheet" href="css/screen.css" media="screen">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	
	</head>
	<body>
		<div data-role="page">

			
  
	
		<div data-role="content">
		
			<div id="rwm_view_logo">
				<img src="img/logo_RWM.png"  alt="logo ride with.me">
			</div>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
					<h2>Join Us</h2>
					<!-- vorige pagina:  onClick="location.href='../'" -->
					<a data-role="button" data-theme="b" href="">login with facebook</a>
					<h2>Or take the authentic way</h2>
					<a data-role="button" data-theme="e" href="rwm_login.php">  login</a>
					<a data-role="button" data-theme="e" href="rwm_createAccount.php">Create an account</a>
	
			</form>

		</div>
	
	</div>
		
	</body>
</html>