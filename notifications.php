<?php
include_once("classes/User.class.php");
include_once("classes/Friend.class.php");
session_start();
if (!isset($_SESSION["username"])) {
	header("Location: index.php");
}
$friend = new Friend();
$user = new User();

$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);

	//$id = $_GET['user_id'];	
		$username = $_SESSION["username"];
	
		$number = $user->getUserByName($username);
		$friendrequests=$friend->GetAllFriendRequests($username);
		/*$friendstatus=$friend->GetAllFriendRequests($username, $applicant);
		
		if (isset($_POST["btnAccept_friendship"])) {
	try {
		$id = $_GET['user_id'];	
		$applicant = $user->getUserName();
		$friend -> AcceptFriendRequest($username, $applicant);
		$feedback = "Awesome, You just added a friend!";
		
	
	} catch(Exception $e) {
		$feedback = $e -> getMessage();

	}
}
		*/	
?>
<!doctype html>
<html lang="en">
<head>
	<?php include_once("includes/head.php");?>
	<title><?php echo $username ?>' friend requests</title>
	<script>
	<?php include_once("includes/mobile_menu.js");?>
	</script>
</head>
<body>
<div data-role="page">
	<div id="sidebar">
	<div data-theme="c" data-role="header">    
        <h3>
            Notifications
       
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
		
		
			<div id="friend_requests">
				
				<?php
			
					foreach ($friendrequests as $request) {
					
						echo "<div><p><a href='profile.php?user_id=".$request['user_id']."'>" . $request['friend_applicant'].  "</a> has send you a friend request"   . "<form action='' type='post'><button type='submit' data-icon='check' data-inline='true' name='btnAccept_friendship' data-theme='b'>Accept</button><button type='submit' data-inline='true'  name='btnDecline_friendship' data-icon='delete' data-theme='e'>Decline</button></form></p></div>";     
																																				
					}
				
				 ?>
			</div>
	</div>
</div>

</body>
</html>