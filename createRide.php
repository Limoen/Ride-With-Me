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

if (isset($_POST["btnCreateRide"])) {
	try {
		$ride -> Ride_Date = $_POST["Ride_Date"];
		$ride -> Ride_Time = $_POST["Ride_Time"];
		$ride -> Ride_Country = $_POST["Ride_Country"];
		$ride -> Ride_State = $_POST["Ride_State"];
		$ride -> Ride_City = $_POST["Ride_City"];
		$ride -> Ride_Street = $_POST["Ride_Street"];
		$ride -> Ride_StreetNumber = $_POST["Ride_StreetNumberTo"];
		$ride -> Ride_CountryTo = $_POST["Ride_CountryTo"];
		$ride -> Ride_StateTo = $_POST["Ride_StateTo"];
		$ride -> Ride_CityTo = $_POST["Ride_CityTo"];
		$ride -> Ride_StreetTo = $_POST["Ride_StreetTo"];
		$ride -> Ride_StreetNumberTo = $_POST["Ride_StreetNumberTo"];
		$ride -> Ride_Description = $_POST["Ride_Description"];
		$ride -> SaveRide();
		$feedback = "Awesome, You just created a ride!";
		//$bug->Bug_Status = "Unsolved";
	
	} catch(Exception $e) {
		$feedback = $e -> getMessage();

	}
}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Create ride</title>
        
		<?php include_once ("includes/head.php"); ?>
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
					<li><a <?php if($page == "yourFriends.php"){echo 'class="active"';}?> href="yourFriends.php">&nbsp Your Friends</a></li>
					<li><a <?php if($page == "notifications.php"){echo 'class="active"';}?> href="notifications.php">&nbsp Notifications</a></li>
					<li><a <?php if($page == "settings.php"){echo 'class="active"';}?> href="settings.php"><img  src="img/Settings.png" img style="width: 15px;"/>&nbsp&nbspSettings</a></li>

				</ul>
			</nav>
		</header>
	</div>
</div>
			<div data-role="content">
				<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" >
					<?php if(empty($feedback)) {
					?>

					<?php } else {?>
					<div>
						<?php echo $feedback
						?>
					</div>
					<?php }?>
                    	<legend>Ride date &amp; time:</legend>
                        <input type="date" name="Ride_Date" id="rideDate" data-role="datebox" data-options='{"mode":"flipbox", "useNewStyle":true}' placeholder="Ride Date">
                        <input type="date" name="Ride_Time" id="rideTime" data-role="datebox" data-options='{"mode": "timeflipbox", "overrideTimeFormat": 24, "useNewStyle":true}' placeholder="Ride Time">

<!-- FROM -->
						<legend>From:</legend>
			
						
						<div class="controls">
							<select name="Ride_Country">
                            	<option>Select Country</option>
                                <option>-------------</option>
								<option>Belgium</option>
								<option>France</option>
							</select>
						</div>
						<div class="controls">
		
							<select name="Ride_State">
                            	<option>Select State</option>
                                <option>------------</option>
								<option>East-Flanders</option>
								<option>Provence</option>
							</select>
						</div>
						<div class="controls">
					
							<select name="Ride_City">
                            	<option>Select City</option>
                                <option>-----------</option>
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
                                <option>-------------</option>
								<option>Belgium</option>
								<option>France</option>
							</select>
						</div>
						<div class="controls">
					
							<select name="Ride_StateTo">
								<option>Select State</option>
                                <option>------------</option>
								<option>East-Flanders</option>
								<option>Provence</option>
							</select>
						</div>
						<div class="controls">
					
							<select name="Ride_CityTo">
								<option>Select City</option>
                                <option>-----------</option>
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
						<div class="controls" >
							<label for="male">Male</label>
							
							<textarea name="Ride_Description"  placeholder="Is there something we have to know?" rows="4" cols="50"></textarea>
						
						</div>
						
                    </fieldset>
                    <div>
                        <button type="submit"  name="btnCreateRide" data-theme="b" >
                            Create ride
                        </button></div>
                    </div>
			</form>
		</div>
		</div>
	</body>
</html>