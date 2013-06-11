<?php
include_once("classes/User.class.php");
include_once("classes/Friend.class.php");
session_start();
$friend = new Friend();
$user = new User();

$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);

	$id = $_GET['user_id'];
$username = $_SESSION["username"];

$name = $user->getUserNameById($id);
$number = $user->getUserByName($username);

//$number1 = $friend->getFriendById($id);
$friends=$friend->GetAllYourFriends($id);
?><!doctype html>
<html lang="en">
<head>
	<?php include_once("includes/head.php");?>
	<title> <?php echo  $name . "' friends"?></title>
	<script>
	<?php include_once("includes/mobile_menu.js");?>
	</script>
</head>
<body>
<div data-role="page">
	<div id="sidebar">
	<div data-theme="b" data-role="header">    
        <h3>
             <?php echo  $name . "' friends"?>
       
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
		
		
			<div id="friends">
				
				<?php

				foreach ($friends as $friend) {
					if($friend['friend_recipient'] == $name){
					echo "<div><p><a href='profile.php?user_id=".$friend['friend_applicant_id']."'>" . $friend['friend_applicant'] . " <a/></p></div>"; 
				}
					else {
						echo "<div><p><a href='profile.php?user_id=".$friend['friend_recipient_id']."'>" . $friend['friend_recipient'] . " <a/></p></div>"; 
							
						
					}
				}
				
				?>
			</div>
	</div>
</div>

</body>
</html>