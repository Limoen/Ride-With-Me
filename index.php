<?php

?>
<!doctype html>
<html lang="en">
	<head>
		<?php include_once("includes/head.php");?>
	
	</head>
	<body>
		<div data-role="page">
		<div id="bg" data-role="content">
		
			<div id="logo">
				<img src="img/logo.png" alt="logo ride with.me">
			</div>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
               
<!--                
				<h1>When carpooling meets Social Media.</h1>
                <h1>Save money, earn friends.</h1> 
                <h1></h1> 
-->
                <a data-role="button" data-theme="b" href="login.php">login</a>
                <a data-role="button" id="register" data-theme="b" href="register.php">Create an account</a>
			</form>

		</div>
	
	</div>
		
	</body>
</html>