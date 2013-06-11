<?php
include_once("classes/User.class.php");
	session_start();
	
	$_SESSION["loggedin"] = false;
	$feedback_error = "";
	
	$user = new User();
		if(!empty($_POST["btnLogin"]))
	{
		try
		{
			$user = new User();
			$user->Username = $_POST["username"];
			$user->Password = $_POST["password"];
			$user->Login();
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
    
        <div data-theme="c" data-role="header">
            <a data-role="button" href="index.php"  class="ui-btn-left">
                Cancel
            </a>
        
            <h3>Log in</h3>
        </div>
        
        <section id="login">
            <h2>Want to take a ride? <span>Login</span></h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            		<?php if(!empty($feedback_error)): ?>
<div id="feedback_error">
<p><h1><?php echo $feedback_error ?></h1></p>
</div>
<?php endif; ?>
                <input id="username" type="text" name="username" placeholder="username" />
                <input id="password" type="password" name="password" placeholder="password" />
                
                <p>Still no account? <a href="register.php" >Register</a></p>
               
                <input type="submit" name="btnLogin" data-theme="b" value="Sign up">
            </form>
        </section>
	</div>
</body>
</html>