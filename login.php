<?php
	include_once("logica.php");
	
?><!doctype html>
<html lang="en">
<head>
<?php include_once("includes/head.php");?>
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
		<form action="searchRides.php" method="post">
		<input type="text" name="username" placeholder="Username" />
		<input type="password" name="password" placeholder="Password" />
		<div id="feedback">
		<?php if(empty($feedback)) { ?>
		<h1></h1>
		<?php } else { ?>
		<h1><?php echo $feedback ?></h1>
		<?php } ?>
		</div>
		<input type="submit" name="btnLogin" data-theme="b" value="Sign up for Ride with.me">
	
		
		</form>
	</section>
	</div>
	</div>
	</div>
</body>
</html>