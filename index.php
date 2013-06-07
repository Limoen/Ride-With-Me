<?php
	include_once ("logica.php");
?>

<!doctype html>
<html lang="en">
<head>
    <?php include_once("includes/head.php");?>
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
                <a data-role="button" data-theme="e" href="login.php">login</a>
                <a data-role="button" data-theme="e" href="register.php">Create an account</a>
            </form>
        </div>
    </div>
    
</body>
</html>