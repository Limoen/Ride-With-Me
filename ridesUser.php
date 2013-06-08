<?php

?>
<!doctype html>
<html lang="en">
<head>
	<?php include_once("includes/head.php");?>
	<title><?php echo $username ?>' rides</title>
	<script>
	<?php include_once("includes/mobile_menu.js");?>
	</script>
</head>
<body>
<div data-role="page">
	<div id="sidebar">
	<div data-theme="a" data-role="header">    
        <h3>
            Ride with.me
       
        </h3>
        <header>
			<nav id="mobile-bar"></nav>
				
			<nav id="main-nav">
			
				<ul>
					<li><a id="you" href="profile.php?user_id=<?php echo $number ?>"><?php echo "Hello " . $username ?></a></li>
				
				
					<li><a <?php if($page == "searchRides.php"){echo 'class="active"';}?> href="searchRides.php" >&nbsp Search ride</a></li>
					<li><a <?php if($page == "createRide.php"){echo 'class="active"';}?> href="createRide.php">&nbsp Create ride</a></li>
					<li><a <?php if($page == "yourRides.php"){echo 'class="active"';}?> href="yourRides.php">&nbsp Your rides</a></li>
					<li><a <?php if($page == "settings.php"){echo 'class="active"';}?> href="settings.php"><img  src="img/Settings.png" img style="width: 15px;"/>&nbsp&nbspSettings</a></li>
					<li><a <?php if($page == "notifications.php"){echo 'class="active"';}?> href="notifications.php">&nbsp Notifications</a></li>

				</ul>
			</nav>
		</header>
	</div>
</div>
	<div data-role="content">
		
		<h1>Rides</h1>
        <div>
        
        </div>
			
	</div>
</div>

</body>
</html>