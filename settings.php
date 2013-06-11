<?php
	include_once("classes/User.class.php");
	$user = new User();
	session_start();
	
	$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);


$username = $_SESSION["username"];
	$number = $user->getUserByName($username);
?><!doctype html>
<html lang="en">
<head>
	<?php include_once("includes/head.php");?>
	<script>
	<?php include_once("includes/mobile_menu.js");?>
	</script>
</head>
<body>
<div data-role="page">
<div id="sidebar">
	<div data-theme="b" data-role="header">    
        <h3>
            <?php echo $username ?>' Settings
       
        </h3>
        <header>
			<nav id="mobile-bar"></nav>
				
			<nav id="main-nav">
			
				<ul>
					<p><img id="logo_side" src="img/logo.png"/></p>
					<li id="bar_username"><a id="you" <?php if($page == "profile.php?user_id=" ){echo 'class="active"';}?> href="profile.php?user_id=<?php echo $number ?>"><?php echo "&nbsp; Hello " . $username ?></a></li>
					<li><a <?php if($page == "searchRides.php"){echo 'class="active"';}?> href="searchRides.php" >&nbsp; Search Rides </a><span <?php if($page == "searchRides.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="searchRides.php" >•</span></li>
					<li><a <?php if($page == "createRide.php"){echo 'class="active"';}?> href="createRide.php" >&nbsp; Create Ride </a><span <?php if($page == "createRide.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="createRide.php" >•</span></li>
					<li><a <?php if($page == "yourRides.php"){echo 'class="active"';}?> href="yourRides.php" >&nbsp; Your Rides </a><span <?php if($page == "yourRides.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="yourRides.php" >•</span></li>
					<li><a <?php if($page == "yourFriends.php"){echo 'class="active"';}?> href="yourFriends.php" >&nbsp; Your Friends </a><span <?php if($page == "yourFriends.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="notifications.php" >•</span></li>
					<li><a <?php if($page == "notifications.php"){echo 'class="active"';}?> href="notifications.php" >&nbsp; Notifications </a><span <?php if($page == "notifications.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="notifications.php" >•</span></li>
					<li><a <?php if($page == "settings.php"){echo 'class="active"';}?> href="settings.php" >&nbsp; Settings </a><span <?php if($page == "settings.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="settings.php" >•</span></li>
				</ul>
			</nav>
		</header>
	</div>
</div>
	<div data-role="content">
		<form>
		
			
		</form>
		<a data-role="button" data-theme="e" href="logout.php">log out as <?php echo $username  ?></a>
	</div>
</div>

</body>
</html>