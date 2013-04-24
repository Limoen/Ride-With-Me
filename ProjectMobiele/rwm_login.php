<?php
	include_once("rwm_logica.php");
	
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

	<header>
	</header>
<div data-role="page">

			 <div data-theme="a" data-role="header">
         <a data-role="button" data-rel="back" href="#page1" data-icon="arrow-l"
        data-iconpos="left" class="ui-btn-left">
            back
        </a>
        <a data-role="submit" href="#page1" data-icon="arrow-r" data-iconpos="right"
        class="ui-btn-right" name="btnLogin">
            Sign in
        </a>
        <h3>
            Login
        </h3>
	
		
		</div>
	<section id="login">
		<h2>Want to take a ride? <span>Login</span></h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="username" placeholder="Username" />
		<input type="password" name="password" placeholder="Password" />
		<div id="feedback">
		<?php if(empty($feedback)) { ?>
		<h1></h1>
		<?php } else { ?>
		<h1><?php echo $feedback ?></h1>
		<?php } ?>
		</div>
		<input type="checkbox" name="rememberme" value="yes" id="rememberme">
		<label for="rememberme">Remember me</label>
		<input type="submit" name="btnLogin" data-theme="b" value="Sign up for Ride with.me">
	
		
		</form>
	</section>
	</div>
	</div>
	</div>
</body>
</html>