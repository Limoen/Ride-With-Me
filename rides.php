<?php
session_start();

if (!isset($_SESSION["username"])) {
	header("Location: index.php");
}
include_once ("classes/User.class.php");
include_once ("classes/Ride.class.php");
include_once ("classes/Comment.class.php");


$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);
if (!isset($_SESSION["username"])) {

	header("Location: index.php");
}

$user = new User();
$ride = new Ride();
$comment = new Comment();
$ride_id = $_GET['ride_id'];
$details = $ride->getRideById($ride_id);
$rides=$comment->GetAllComments($ride_id);
$username = $_SESSION["username"];
	//$ride_id = $_GET['user_id'];	
$number = $ride->getRidesByName($username);
//$nameTo = $details['name'];




if(!empty($_POST["btnReact"]))
	{
		try
		{
			// Bij het reageren wordt de naam van diegene die ingelogd is meegegeven, net als de id van de bug waarop je reageert.
			$username = $_SESSION['username'];
			$ride_id = $_GET['ride_id'];
			$comment->Comment = $_POST["comment"];
			// parameters id en name meegeven met de saveComment om ze te gebruiken in de functie.
			$comment->SaveComment($ride_id, $username);
			
		}
		catch(Exception $e)
		{
			$feedback = $e->getMessage();
		}
	}

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

        <div><h3>FROM</h3><p><?php echo $details['ride_city'] . " (" . $details['ride_state'] . ", " . $details['ride_country']?>) </p><p><?php echo $details['ride_street'] . " " . $details['ride_streetnumber'] ?></p></div>
		<div><h3>TO</h3><p><?php echo $details['ride_cityto'] . " (" . $details['ride_stateto'] . ", " . $details['ride_countryto']?>) </p><p><?php echo $details['ride_streetto'] . " " . $details['ride_streetnumberto'] ?></p></div>
        <div><?php echo $details['ride_description'] ?></div>
       	<br>
        <iframe  src="https://maps.google.be/maps?saddr=<?php echo $details['ride_street'] . "+" . $details['ride_streetnumber'] . "+" . $details['ride_city'] . "+" . $details['ride_country']?>&amp;daddr=<?php echo $details['ride_streetto'] . "+" . $details['ride_streetnumberto'] . "+" . $details['ride_cityto'] . "+" . $details['ride_countryto']?>&amp;output=embed" scrolling="no"></iframe>
		<img src="img/car.png"/><?php echo $details['username'] ?>
<h4 id="comments">COMMENTS</h4>
				<div id="ride_list">
				<ul id="listupdates">
					
				
				<?php
			
					foreach ($rides as $ride) {
					
						echo "<li class='description'>" . $ride['comment_text'] . "</li><li class='user'>" . $ride['username'] . "<li>";     
					}
				
				 ?>
				</ul>
				</div>
				<div id="ride_react">
					<form action="<?php echo $_SERVER['PHP_SELF'] . "?ride_id=" .$ride_id; ?>" method="post">
					<textarea  name="comment" id="ride_message" placeholder="Give a reaction!"></textarea>
					<button type="submit" data-theme="b" name="btnReact" id="btnReact" data-rid="<?php echo $ride_id ?>">React </button>
					<button type="submit" data-theme="b" name="btnCheckIn" id="btnCheckIn">Get in the car! </button>

					</p>

					</form>
				</div>
	</div>

	</body>
<script src="js/app.js"></script>
<script src='js/swipe.js'></script>
<script src='js/swiper.js'></script>
</html>