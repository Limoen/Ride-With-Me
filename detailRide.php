<?php
include_once ("logica.php");
if (!isset($_SESSION["name"])) {

	header("Location: rwm_view.php");
}
?><!doctype html>
<html lang="en">
<head>
	<?php include_once("includes/head.php");?>
	<script>
	<?php include_once("includes/mobile_menu.js");?>
	</script>
</head>
	<body>
		
       <!-- onclick="location.href='javascript:history.go(-1)'"> -->
        <div data-role="page">

			<div data-theme="a" data-role="header">
			<?php
				include_once("sidebar.php");
			?>
            <a data-role="button"  href="rwm_menu.php" data-icon="arrow-l" data-iconpos="left" class="ui-btn-left">
                back
            </a>
            <a data-role="button" href="#page1" data-icon="arrow-r" data-iconpos="right" class="ui-btn-right">
                submit
            </a>
          
    	</div>
			<div data-role="content">
			
					 <div data-role="fieldcontain">
            			<input name="" id="searchinput1" placeholder="Search ride" value="" type="search">
        			</div>
						
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