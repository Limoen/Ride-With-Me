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
		
       <!-- onclick="location.href='javascript:history.go(-1)'"> -->
        <div data-role="page">

			 <div data-theme="a" data-role="header"><div id="sidebar">
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
					<li><a <?php if($page == "yourFriends.php"){echo 'class="active"';}?> href="yourFriends.php">&nbsp Your Friends</a></li>

				</ul>
			</nav>
		</header>
	</div>
</div>
        
       
      
    </div>
    
<div id='mySwipe'  class='swipe'>
  <div class='swipe-wrap'>
    <div ><b><img  src="uploads/<?php echo $details['avatar']?>"/><br/><br/></br><p id="username"><?php echo $details['fullname'] . " (" . $details['username'] . ")" ?></p><br/><p><span>Birthday</span></p></b></div>
        <div><b><p id="slide2"><?php echo $details['bio']?></p></b></div>

    <div>
    	<b><p id="slide3"><?php echo $details['street'] . ", " . $details['city'] . " (<span>" . $details['state'] . ", " . $details['country'] . ")</span>" ?></p><br/><p><span><?php echo $details['email'] . ", " . $details['phone'] ?></span></p></b>
        <iframe src="https://maps.google.be/maps?f=q&amp;source=s_q&amp;hl=nl&amp;geocode=&amp;q=<?php echo $details['street'] . '+' . $details['city'] . '+' . $details['country'] ?>&amp;output=embed"></iframe>
    </div>
	
  
</div>
<div onclick='mySwipe.prev()' id="left"></div>
<div onclick='mySwipe.next()' id="right"></div>
<div id="saved">Saved about <span>$99,99</span> last month</div>

</div>

<div id="profile_links">
	<a href="ridesUser.php" ><img src="img/trips.png"/></a>
	<a href="friendsUser.php"><img src="img/friends.png"/></a>
</div>
<form class="form-horizontal" action="#"  method="post" >
<button type="submit"  name="btnFriendRequest" data-theme="b" >Add as friend</button></form>

		</div>
	</body>

<script src='js/swipe.js'></script>
<script src='js/swiper.js'></script>
</html>