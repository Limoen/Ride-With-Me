<?php
	include_once("classes/User.class.php");
	session_start();
	$_SESSION["loggedin"] = false;
	$feedback = "";
	$feedback_success = "";
	$feedback_error = "";
	
$user = new User();
	if(isset($_POST["btnSignup"]))
	{
		try
		{
			/*
			if(isset($_POST['upload'])) {
				$newName = time() . $_FILES['upload']['name'];
				move_uploaded_file($_FILES['upload']['tmp_name'],
		    	"uploads/" . $newName);
			} else {
				$newName = 'default.gif';
			}
			*/
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
			
			
			$pass1 = $_POST['password'];
			$pass2 = $_POST['check_password'];
			if( $pass1 == $pass2) {
				$user->Register();
				$feedback_success = "Awesome, You just signed up!";
			} else {
				throw new Exception("Ow! Different passwords");
			};
			 
		}
		catch(Exception $e)
		{
			$feedback_error = $e->getMessage();
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

			 <div data-theme="b" data-role="header">
         <a data-role="button" href="index.php" class="ui-btn-left">
            back
        </a>
       
        <h3>
            Create account
        </h3>
	
		
		</div>
	<!-- go to previous page -->

	<section id="signup">
		<h2>New to Ride with.me? <span>Sign Up</span></h2>
		<?php if(!empty($feedback_success)): ?>
<div id="feedback_success">
<p><h1><?php echo $feedback_success ?></h1></p>
</div>
<?php endif; ?>

<?php if(!empty($feedback_error)): ?>
<div id="feedback_error">
<p><h1><?php echo $feedback_error ?></h1></p>
</div>
<?php endif; ?>
		
		<form class="form-horizontal" id="account-form" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" enctype="multipart/form-data" data-ajax="false">
		<input type="text" name="username" id="username" placeholder="User name" />
		<div class="usernameFeedback"><span></span></div>
		
		<input type="text" name="fullname" placeholder="Full name" />
		<input type="tel" name="phone" id="textinput2" placeholder="Phone" value="" type="tel">
		<input type="email" name="email" placeholder="Email" />
		<input type="password" name="password" placeholder="Password"/>
		<input type="password" name="check_password" placeholder="Repeat password"/>
		<textarea  name="bio" id="bio" placeholder="Tell us more about your self." class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset"></textarea>
		<h3>Living information</h3>
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
            <input type="text" name="street" placeholder="Street and number" />
           
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
		
		 <p>Already a user? <a href="login.php" >Log in </a></p>
	
		<button type="submit" id="btnSignup" name="btnSignup" data-theme="b" >Sign up for ridewith.me</button>
			
		</form>
	</section>
	</div>
	</div>
	</div>
	<script src="js/app.js"></script>
</body>
</html>