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
$friend = new Friend();
$id = $_GET['user_id'];
$details = $user->getUserById($id);
$username = $_SESSION["username"];
$number = $user->getUserByName($username);
if (isset($_POST["btnFriendRequest"])) {
	try {
		$username = $_SESSION['username'];
		$user_id = $_GET['user_id'];
		$buddy = $user->GetUserById($user_id);
		$buddyName = $buddy['username'];
		$friend->Friend_Applicant = $username;
		$friend->Friend_Recipient = $buddyName;
		$friend->Friend_Status = "Pending";
		$friend->Saverequest();
		$feedback = "Awesome, You've sent a friend request!";
	
	
	} catch(Exception $e) {
		$feedback = $e -> getMessage();

	}
}
$friendnr = $details['user_id'];
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
		
/*		$(document).ready(function(){
			var myname = <?php echo $username ?>;
			var friendname = <?php echo $details['username'] ?>;
			if ( myname!=friendname ) {
				document.getElementById('btn').disabled = false;
			} else {
				document.getElementById('btn').disabled = true;
			};
		)};
*/

	</script>


	</head>
	<body>
		
       <!-- onclick="location.href='javascript:history.go(-1)'"> -->
        <div data-role="page">

			 <div data-theme="c" data-role="header"><div id="sidebar">
	<div data-theme="c" data-role="header">    
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
        
       
      
    </div>
    
<div id='mySwipe'  class='swipe'>
	 <div class='swipe-wrap'>
    <div ><b><br/><img  src="uploads/<?php echo $details['avatar']?>"/><br/><br/></br><p id="username"><?php echo $details['fullname'] . " <span> (" . $details['username'] . ")</span>" ?></p><br/><p><span>Birthday</span></p></b></div>
        <div><b><p id="slide2"><?php echo $details['bio']?></p></b></div>

    <div><b><p id="slide3"><?php echo $details['street'] . ", " . $details['city'] . " (<span>" . $details['state'] . ", " . $details['country'] . ")</span>" ?></p><br/><p><span><?php echo $details['email'] . ", " . $details['phone'] ?></span></p></b></div>
	   <div>
	    	<b><p id="slide4"><iframe src="https://maps.google.be/maps?f=q&amp;source=s_q&amp;hl=nl&amp;geocode=&amp;q=<?php echo $details['street'] . '+' . $details['city'] . '+' . $details['country'] ?>&amp;output=embed" scrolling="no"></iframe></p></b>
	    </div>
  
</div>
	
	
		<div onclick='mySwipe.prev()' id="left"></div>
<div onclick='mySwipe.next()' id="right"></div>
<div id="saved">Saved about <span>$99,99</span> last month</div>

</div>
<div id="profile_links">
<a href="yourRides.php?user_id=<?php echo $friendnr ?>" ><img src="img/trips.png"/></a>
<a href="yourFriends.php?user_id=<?php echo $friendnr ?>"><img src="img/friends.png"/></a>
</div>
<form class="form-horizontal" action="#" method="post">

<?php if($username != $details['username']): ?>
<button type="submit" name="btnFriendRequest" data-theme="b" id="btn" >Add as friend</button>
<?php endif; ?>

</form>
</div>
</body>

<script src='js/swipe.js'></script>
<script src='js/swiper.js'></script>
</html>