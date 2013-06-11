<?php
include_once("classes/Ride.class.php");
include_once("classes/User.class.php");
session_start();
if (!isset($_SESSION["username"])) {
	header("Location: index.php");
}

$ride = new Ride();
$user = new User();

$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);
$username = $_SESSION["username"];

	//$id = $_GET['user_id'];	
		$number = $user->getUserByName($username);
		
		$feedback_success = "";
	$feedback_error = "";

if (isset($_POST["btnCreateRide"])) {
	try {
		$ride -> Ride_Date = $_POST["Ride_Date"];
		$ride -> Ride_Time = $_POST["Ride_Time"];
		$ride -> Ride_Country = $_POST["Ride_Country"];
		$ride -> Ride_State = $_POST["Ride_State"];
		$ride -> Ride_City = $_POST["Ride_City"];
		$ride -> Ride_Street = $_POST["Ride_Street"];
		$ride -> Ride_StreetNumber = $_POST["Ride_StreetNumber"];
		$ride -> Ride_CountryTo = $_POST["Ride_CountryTo"];
		$ride -> Ride_StateTo = $_POST["Ride_StateTo"];
		$ride -> Ride_CityTo = $_POST["Ride_CityTo"];
		$ride -> Ride_StreetTo = $_POST["Ride_StreetTo"];
		$ride -> Ride_StreetNumberTo = $_POST["Ride_StreetNumberTo"];
		$ride -> Ride_Description = $_POST["Ride_Description"];
		$ride -> Ride_Seats = $_POST["Ride_Seats"];
		$ride -> SaveRide();
		$feedback_success = "Awesome, You just created a ride!";
		//$bug->Bug_Status = "Unsolved";
	
	} catch(Exception $e) {
		$feedback_error = $e -> getMessage();

	}
}
?>
<!doctype html>
<html lang="en">
	<head>
	
        
		<?php include_once ("includes/head.php"); ?>
			<title>Create ride</title>
		<link rel="stylesheet" type="text/css" href="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.min.css" />
		<script src="includes/mobile_menu.js"></script>
        <script src="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.core.min.js"></script>
		<script src="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.mode.calbox.min.js"></script>
        <script src="http://dev.jtsage.com/cdn/datebox/i18n/jquery.mobile.datebox.i18n.en_US.utf8.js"></script>
        <script src="http://dev.jtsage.com/cdn/datebox/1.1.0/jqm-datebox-1.1.0.comp.flipbox.min.js"></script>
	</head>
	<body>
		<div data-role="page">
		<div id="sidebar">
	<div data-theme="c" data-role="header">    
        <h3>
           Create a ride
       
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
				<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" >

                    	<legend>Ride date &amp; time:</legend>
                        <input type="date" name="Ride_Date" id="rideDate" data-role="datebox" data-options='{"mode":"flipbox", "useNewStyle":true}' placeholder="Ride Date">
                        <input type="date" name="Ride_Time" id="rideTime" data-role="datebox" data-options='{"mode": "timeflipbox", "overrideTimeFormat": 24, "useNewStyle":true}' placeholder="Ride Time">

<!-- FROM -->
						<legend>From:</legend>
			
						
						<div class="controls">
							<select name="Ride_Country">
                            	<option>Select Country</option>
                             
								<option>Belgium</option>
								<option>France</option>
							</select>
						</div>
						<div class="controls">
		
							<select name="Ride_State">
                            	<option>Select State</option>
                               
								<option>East-Flanders</option>
								<option>Provence</option>
							</select>
						</div>
						<div class="controls">
					
							<select name="Ride_City">
                            	<option>Select City</option>
                              
								<option>Dendermonde</option>
								<option>Lille</option>
							</select>
						</div>
						<div class="controls">
					
                            <input type="text" name="Ride_Street" placeholder="Street name"/>
						</div>
						<div class="controls" >
					
                            <input type="text" name="Ride_StreetNumber" placeholder="House number"/>
						</div>
<!-- TO -->						
						<legend>To:</legend>
					
						<div class="controls">
							<select name="Ride_CountryTo">
                            	<option>Select Country</option>
                             
								<option>Belgium</option>
								<option>France</option>
							</select>
						</div>
						<div class="controls">
					
							<select name="Ride_StateTo">
								<option>Select State</option>
                              
								<option>East-Flanders</option>
								<option>Provence</option>
							</select>
						</div>
						<div class="controls">
					
							<select name="Ride_CityTo">
								<option>Select City</option>
                             
								<option>Dendermonde</option>
								<option>Lille</option>
							</select>
						</div>
						<div class="controls">
					
                            <input type="text" name="Ride_StreetTo" placeholder="Street name"/>
						</div>
						<div class="controls" >
						
                            <input type="text" name="Ride_StreetNumberTo" placeholder="House number"/>
						</div>
						<legend>Other:</legend>
						<div class="controls" >
						
							<textarea name="Ride_Description"  placeholder="Is there something we have to know?" rows="4" cols="50"></textarea>
						
						</div>
						
						<div class="controls">
					
					<label for"Ride_Seats">Number of places</label>
							<input type="text" name="Ride_Seats" placeholder="Available spots..."/>
						</div>
                    </fieldset>
                    <div class="controls">
                    	<?php if(!empty($feedback_success)): ?>
						<div id="feedback_success">
							<p><h1><?php echo $feedback_success ?></h1></p>
						</div>
						<?php endif; ?>
					</div>
					<div class="controls">
						<?php if(!empty($feedback_error)): ?>
						<div id="feedback_error">
							<p><h1><?php echo $feedback_error ?></h1></p>
						</div>
						<?php endif; ?>
					</div>
                    <div class="controls">
                        <button type="submit"  name="btnCreateRide" data-theme="b" >
                            Create ride
                        </button></div>
                    </div>
			</form>
		</div>
		</div>
	</body>
</html>