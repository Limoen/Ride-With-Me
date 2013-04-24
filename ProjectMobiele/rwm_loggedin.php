<?php
include_once ("rwm_logica.php");
if (!isset($_SESSION["name"])) {

	header("Location: rwm_view.php");
}
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
		
       <!-- onclick="location.href='javascript:history.go(-1)'"> -->
        <div data-role="page">

			 <div data-theme="a" data-role="header">
         <a data-role="button"  href="rwm_menu.php" data-icon="arrow-l"
        data-iconpos="left" class="ui-btn-left">
            back
        </a>
        <a data-role="button" href="#page1" data-icon="arrow-r" data-iconpos="right"
        class="ui-btn-right">
            submit
        </a>
        <h3>
            Search
        </h3>
    </div>
			<div data-role="content">
			
					 <div data-role="fieldcontain">
            			<input name="" id="searchinput1" placeholder="Search ride" value="" type="search">
        			</div>
				
					<!-- Welkom  <?php echo " " . $_SESSION["name"] . " "?><a href="rwm_logout.php"Logout>Logout</a> -->
			
				
			
					<form action=<?php echo $_SERVER['PHP_SELF'] ?> method="post">
						<textarea name="tweet" rows="8" cols="40" placeholder="<?php
						if (!empty($feedback))
							echo $feedback;
 						?>"></textarea>
						<input type="submit" data-theme="b" value="Submit">
					</form>
					<h2>Your tweets:</h2>
					<?php echo $_SESSION["name"] . " zegt:";
						if (isset($tweet))
							$tweet -> getAll();
					?>
		
			</div>
		</div>
	</body>
</html>