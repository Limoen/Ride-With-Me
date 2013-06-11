<?php
session_start();


include_once ("classes/User.class.php");
include_once ("classes/Friend.class.php");

$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);
if (!isset($_SESSION["username"])) {

	header("Location: index.php");
}

$user = new User();
// NIEUW ->
$applicant = new User();
// <- NIEUW
$friend = new Friend();
$id = $_GET['user_id'];

$details = $user->getUserById($id);
$detailsFriendship = $friend->getFriendById($id);

$username = $_SESSION["username"];
$number = $user->getUserByName($username);
$friendstatus = $friend->getFriendInfoById($id);



if (isset($_POST["btnFriendRequest"])) {
	try {
		$username = $_SESSION['username'];
		
		// NIEUW ->
		$buddy_id = $user->getUserByName($username);
		
		// <- NIEUW
		$user_id = $_GET['user_id'];
		$buddy = $user->GetUserById($user_id);
		$buddyName = $buddy['username'];
		$friend->Friend_Applicant = $username;
		$friend->Friend_Recipient = $buddyName;
		$friend->Friend_Status = "Pending";
		// NIEUW ->
		$friend->Friend_Recipient_id = $user_id;
		$friend->Friend_Applicant_id = $buddy_id;
		// <- NIEUW
		$friend->Saverequest();
		$feedback = "Awesome, You've sent a friend request!";
	
	
	} catch(Exception $e) {
		$feedback = $e -> getMessage();

	}
	
}

?>
<!doctype html>
<html lang="en">
<head>
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
	<div data-role="page">
		<div data-theme="b" data-role="header"><div id="sidebar">
			<div data-theme="b" data-role="header">    
				<h3>
					<?php echo $details['username'] . "' profile"?>
				</h3>
				<header>
					<nav id="mobile-bar"></nav>
					<nav id="main-nav">
						<ul>
							<p><img id="logo_side" src="img/logo.png"/></p>
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
	</div>
    <div id='mySwipe'  class='swipe'>
		<div class='swipe-wrap'>
		    
		    <div ><b><br/><img  src="uploads/<?php echo $details['avatar']?>"/><br/><br/></br><p id="username"><?php echo $details['fullname'] . " <span> (" . $details['username'] . ")</span>" ?></p><br/><p><span>Birthday</span></p></b></div>
		    
		    <div><b><p id="slide2"><?php echo $details['bio']?></p></b></div>
		    
		    <div><b><p id="slide3"><?php echo $details['street'] . ", " . $details['city'] . " (<span>" . $details['state'] . ", " . $details['country'] . ")</span>" ?></p><br/><p><span><?php echo $details['email'] . ", " . $details['phone'] ?></span></p></b></div>
			
			<div><b><p id="slide4"><iframe src="https://maps.google.be/maps?f=q&amp;source=s_q&amp;hl=nl&amp;geocode=&amp;q=<?php echo $details['street'] . '+' . $details['city'] . '+' . $details['country'] ?>&amp;output=embed" scrolling="no"></iframe></p></b></div>
		  
		</div>
		<div onclick='mySwipe.prev()' id="left"></div>
		<div onclick='mySwipe.next()' id="right"></div>
		<div id="saved">Saved about <span>$99,99</span> last month</div>
	</div>
	<div id="profile_links">
		<a href="yourRides.php?user_id=<?php echo $id ?>" ><img src="img/trips.png"/></a>
		<a href="yourFriends.php?user_id=<?php echo $id ?>"><img src="img/friends.png"/></a>
	</div>
	<form class="form-horizontal" action="#" method="post">
		
		
		
		
		<?php if ($username != $details['username'] && $friendstatus = "Accepted"){ ?>
			<button type="submit" name="" data-theme="a" id="btn" >delete as friend</button>
		<?php }  else if ($username != $details['username'] && $friendstatus = "Pending"){ ?>
			<button type="submit" name="" data-theme="d" id="btn" >request send</button>
				<?php } else if ($username != $details['username'] )   {?>
					<button type="submit"  name="btnFriendRequest" data-theme="b" >Add as friend</button>

<?php } else { ?>
<a data-role="button" data-theme="c" href="settings.php">Settings</a><?php } ?>
		
		
		<!-- code voor vervangen van friend request knop -->
		
	</form>
	<?php echo $friendstatus ?>
</div>
</body>

<script src='js/swipe.js'></script>
<script src='js/swiper.js'></script>
</html>