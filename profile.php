<?php
include_once ("logica.php");
include_once ("classes/User.class.php");

if (!isset($_SESSION["name"])) {

	header("Location: rwm_view.php");
}

$id = $_GET['user_id'];
$details = $user->getUserById($id);

?><!doctype html>
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

			 <div data-theme="a" data-role="header"><?php
		include_once("sidebar.php");
	?>
        
       
      
    </div>
    
<div id='mySwipe'  class='swipe'>
  <div class='swipe-wrap'>
    <div ><b><img  src="uploads/<?php echo $details['avatar']?>"/><br/><br/></br><p id="name"><?php echo $details['surname'] . " " . $details['name'] ?></p><br/><p><span>Birthday</span></p></b></div>
        <div><b><p id="slide2"><?php echo $details['bio']?></p></b></div>

    <div><b><p id="slide3"><?php echo $details['street'] . ", " . $details['city'] . " (<span>" . $details['state'] . ", " . $details['country'] . ")</span>" ?></p><br/><p><span><?php echo $details['email'] . ", " . $details['phone'] ?></span></p></b></div>
	
  
</div>
<div onclick='mySwipe.prev()' id="left"></div>
<div onclick='mySwipe.next()' id="right"></div>
<div id="saved">Saved about <span>$99,99</span> last month</div>

</div>
<div id="profile_links"><a href="#" ><img src="img/trips.png"/></a>
<a href="#" ><img src="img/friends.png"/></a></div>

		</div>
	</body>

<script src='js/swipe.js'></script>
<script src='js/swiper.js'></script>
</html>