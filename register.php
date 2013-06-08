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
			$user->Username = $_POST["username"];
			$user->Fullname = $_POST["fullname"];
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
		<div id="feedback">
		<?php if(empty($feedback)) { ?>
		<h1></h1>
		<?php } else { ?>
		<h1><?php echo $feedback ?></h1>
		<?php } ?>
		</div>
		
		<form class="form-horizontal" id="account-form" action=""  method="post" enctype="multipart/form-data" data-ajax="false">
		<input type="text" name="username" id="username" placeholder="User name" />
		<div class="usernameFeedback"><span></span></div>
		
		<input type="text" name="fullname" placeholder="Full name" />
		<input name="phone" id="textinput2" placeholder="Phone" value="" type="tel">
		<input type="email" name="email" placeholder="Email" />
		<input type="password" name="password" placeholder="Password" />
		<textarea  name="bio" id="bio" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"></textarea>
		<h2>Living information</h2>
		<div data-role="fieldcontain">
			
            <label for="selectmenu1">
                Country:
            </label>
            <select id="selectmenu1" name="country">
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
            <select id="selectmenu1" name="state">
                <option value="East Flanders">
                    East Flanders
                </option>
                <option value="West Flanders">
                    West Flanders
                </option>
            </select>
             <br />
              <br />
            <label for="selectmenu1">
                City:
            </label>
            <select id="selectmenu1" name="city">
                <option value="Dendermonde">
                    Dendermonde
                </option>
                <option value="Baasrode">
                    Baasrode
                </option>
            </select>
             <br />
              <br />
            <input type="text" name="street" placeholder="Street" />
           
            <input type="file" name="upload" id="upload"  />
            
            
            
            
		 <div id="bug_image"  >
		<!--<?php
		if(isset($_POST['btnSignup']))
		{
			echo "<img src='uploads/".$newName."'/>";
			
		}
		else { ?>
			<img src="http://codiqa.com/static/images/v2/image.png" alt="image">
		<?php } ?>-->
		
					</div>
        </div>
		
		
	
		<button type="submit" name="btnSignup" data-theme="b" >sign up for ridewith.me</button>
			
		</form>
	</section>
	</div>
	</div>
	</div>
	<script src="js/app.js"></script>
</body>
</html>