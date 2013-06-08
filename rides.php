<?php
include_once ("classes/User.class.php");
include_once ("classes/Ride.class.php");
session_start();

$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);
if (!isset($_SESSION["username"])) {

	header("Location: index.php");
}

$user = new User();
$ride = new Ride();
$id = $_GET['ride_id'];
$details = $ride->getRideById($id);
$username = $_SESSION["username"];
	//$id = $_GET['user_id'];	
$number = $ride->getRidesByName($username);
//$nameTo = $details['name'];
?><!doctype html>
<html lang="en">
	<head>
		<title><?php echo $details['ride_city'] . " - " . $details['ride_cityto']?></title>
		<?php include_once("includes/head.php");?>
		<script src="js/jquery.mobile-menu.js"></script>
	
	<script>
		$(function(){
			$("body").mobile_menu({
				menu: ['#main-nav ul', '#secondary-nav ul'],
  		menu_width: 200,
  		prepend_button_to: '#mobile-bar'
			});
		});
	</script>
	

	</head>
	<body>
		
       <!-- onclick="location.href='javascript:history.go(-1)'"> -->
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

        <div><h3>FROM</h3><p><?php echo $details['ride_city'] . " (" . $details['ride_state'] . ", " . $details['ride_country']?>) </p><p><?php echo $details['ride_street'] . " " . $details['ride_streetnumber'] ?></p></div>
		<div><h3>TO</h3><p><?php echo $details['ride_cityto'] . " (" . $details['ride_stateto'] . ", " . $details['ride_countryto']?>) </p><p><?php echo $details['ride_streetto'] . " " . $details['ride_streetnumberto'] ?></p></div>
		<img src="img/car.png"/><?php echo $details['username'] ?>

	</div>
	</body>

<script src='js/swipe.js'></script>
<script src='js/swiper.js'></script>
</html>