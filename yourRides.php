<?php
include_once("classes/User.class.php");
include_once("classes/Ride.class.php");
session_start();

if (!isset($_SESSION["username"])) {
	header("Location: index.php");
}
$ride = new Ride();
$user = new User();
	$id = $_GET['user_id'];
$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);
	//$id = $_GET['user_id'];	
		$username = $_SESSION["username"];
		$name = $user->getUserNameById($id);
		//$friendnumber = $friend->getFriendByName(????);
		$number = $user->getUserByName($username);
		$rides=$ride->GetAllYourRides($id);
		
		
		
		
		
?><!doctype html>
<html lang="en">
<head>
	<?php include_once("includes/head.php");?>
	<title><?php echo  $name . "' rides"?></title>
	<script>
	<?php include_once("includes/mobile_menu.js");?>
	</script>
</head>
<body>
<div data-role="page">
	<div id="sidebar">
	<div data-theme="b" data-role="header">    
        <h3>
           <?php echo  $name . "' rides"?>
       
        </h3>
        <header>
			<nav id="mobile-bar"></nav>
				
			<nav id="main-nav">
			
				<ul>
					<p><img style="height : 50px; padding: 20px;" src="img/logo.png"/></p>
					<li id="bar_username"><a id="you" <?php if($page == "profile.php?user_id=" ){echo 'class="active"';}?> href="profile.php?user_id=<?php echo $number ?>"><?php echo "&nbsp; Hello " . $username ?></a></li>
					<li><a <?php if($page == "searchRides.php"){echo 'class="active"';}?> href="searchRides.php" >&nbsp; Search Rides </a><span <?php if($page == "searchRides.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="searchRides.php" >•</span></li>
					<li><a <?php if($page == "createRide.php"){echo 'class="active"';}?> href="createRide.php" >&nbsp; Create Ride </a><span <?php if($page == "createRide.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="createRide.php" >•</span></li>
					<li><a <?php if($page == "yourRides.php"){echo 'class="active"';}?> href="yourRides.php?user_id=<?php echo $number ?>" >&nbsp; Your Rides </a><span <?php if($page == "yourRides.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="yourRides.php" >•</span></li>
					<li><a <?php if($page == "yourFriends.php"){echo 'class="active"';}?> href="yourFriends.php?user_id=<?php echo $number ?>" >&nbsp; Your Friends </a><span <?php if($page == "yourFriends.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="notifications.php" >•</span></li>
					<li><a <?php if($page == "notifications.php"){echo 'class="active"';}?> href="notifications.php" >&nbsp; Notifications </a><span <?php if($page == "notifications.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="notifications.php" >•</span></li>
					<li><a <?php if($page == "settings.php"){echo 'class="active"';}?> href="settings.php" >&nbsp; Settings </a><span <?php if($page == "settings.php"){echo 'class="active"';} else{echo 'class="notactive"';}?> href="settings.php" >•</span></li>
				</ul>

			</nav>
		</header>
	</div>
</div>
	<div data-role="content">
				<?php
				foreach ($rides as $ride) {
					
						echo "<div data-demo-html='true'><ul data-role='listview' data-inset='true' class='ui-listview ui-listview-inset ui-corner-all ui-shadow'><li data-corners='false' data-shadow='false' data-iconshadow='true' data-wrapperels='div' data-icon='arrow-r' data-iconpos='right' data-theme='c' class='ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-c'><div class='ui-btn-inner ui-li'><div class='ui-btn-text'><a  href='rides.php?ride_id=" . $ride['ride_id'] . "' class='ui-link-inherit'><p class='ui-li-aside ui-li-desc'>on " . $ride['ride_date'] .  "<strong> at " . $ride['ride_time'] . "</strong></p><h2 class='ui-li-heading'>" . $ride['ride_city'] . " (" . $ride['ride_country'] . ") - " .  $ride['ride_cityto'] . " (" . $ride['ride_countryto'] . ")</h2><p class='ui-li-desc'><strong>From: </strong>" .  $ride['ride_street'] . " " . $ride['ride_streetnumber'] . "</p><p class='ui-li-desc'><strong>To: </strong>" .  $ride['ride_streetto'] . " " . $ride['ride_streetnumberto'] . "</p><p class='ul-li-desc'><img  src='img/steer.png'/>" . " " . $ride['username'] . "</p>
						</a></div></div></li></ul></div>";     
					}
				
				 ?>

	</div>
</div>

</body>
</html>