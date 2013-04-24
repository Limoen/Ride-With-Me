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
        class="ui-btn-right" name="btnSignup">
            Sign up
        </a>
        <h3>
            Create account
        </h3>
	
		
		</div>
	<!-- go to previous page -->

	<section id="signup">
		<h2>New to Ride with.me? <span>Sign Up</span></h2>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<img src="http://codiqa.com/static/images/v2/image.png" alt="image">
		<input type="text" name="name" placeholder="Name" />
		<input type="text" name="surname" placeholder="Surname" />
		<input name="" id="textinput2" placeholder="Phone" value="" type="tel">
		<input type="email" name="email" placeholder="Email" />
		<input type="password" name="password" placeholder="Password" />
		
		<h2>Living information</h2>
		<div data-role="fieldcontain">
            <label for="selectmenu1">
                Country:
            </label>
            <select id="selectmenu1" name="">
                <option value="Belgium">
                    Belgium
                </option>
                <option value="France">
                    France
                </option>
            </select>
             <br />
              <br />
            <label for="selectmenu1">
                State:
            </label>
            <select id="selectmenu1" name="">
                <option value="Belgium">
                    East Flanders
                </option>
                <option value="France">
                    West Flanders
                </option>
            </select>
             <br />
              <br />
            <label for="selectmenu1">
                City:
            </label>
            <select id="selectmenu1" name="">
                <option value="Belgium">
                    Dendermonde
                </option>
                <option value="France">
                    Baasrode
                </option>
            </select>
             <br />
              <br />
            <input type="text" name="street" placeholder="Street" />
            
  
        </div>
		
		<div id="feedback">
		<?php if(empty($feedback)) { ?>
		<h1></h1>
		<?php } else { ?>
		<h1><?php echo $feedback ?></h1>
		<?php } ?>
		</div>
	
		<input type="submit" name="btnSignup" data-theme="b" value="Sign up for Ride with.me">
		</form>
	</section>
	</div>
	</div>
	</div>
</body>
</html>