<?php
session_start();

if (!isset($_SESSION["username"])) {

}
include_once("classes/User.class.php");
include_once("classes/Ride.class.php");
$ride = new Ride();

$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);
$user = new User();
$username = $_SESSION['username'];
	//$id = $_GET['user_id'];	
$number = $user->getUserByName($username);
		
//$input = $_POST['search'];
//$rides=$ride->GetAllYourRides($input);
?>
<!doctype html>
<html lang="en">
<head>
	<title>Create ride</title>
	<?php include_once("includes/head.php");?>
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
					<p><img style="height : 50px; padding: 20px;" src="img/logo_RWM.png"/></p>
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
		
			<h1>Search Rides</h1>
			
			<form action="" method="post">
				<input type="search" name="search" results="3" placeholder="Ride city..."/>
			</form>
			<?php
			
//				if(isset($_POST['search'])) {
//					while($input == $ride['ride_city']) {
					//	foreach ($rides as $ride) {
					//		echo "<a  href='rides.php?ride_id=" . $ride['ride_id'] . "'>More <a/><p>" . $ride['ride_city'] . " (" . $ride['ride_country'] . ") - " . $ride['ride_cityto'] . " (" . $ride['ride_countryto'] . ")" . "<br>From: " . $ride['ride_street'] . " " . $ride['ride_streetnumber'] . "<br>To: " . $ride['ride_streetto'] . " " . $ride['ride_streetnumberto'] . "</p><hr>"; 
					//}
//					}
//				}
			?>
	</div>
</div>

</body>
</html>