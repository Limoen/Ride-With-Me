<?php
include_once("classes/Ride.class.php");
include_once("classes/User.class.php");
$ride = new Ride();
$user = new User();
session_start();
$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);
$username = $_SESSION["username"];
	//$id = $_GET['user_id'];	
		$number = $user->getUserByName($username);

if (isset($_POST["btnCreateRide"])) {
	try {
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
		$ride -> SaveRide();
		$feedback = "Awesome, You just created a ride!";
		//$bug->Bug_Status = "Unsolved";
	
	} catch(Exception $e) {
		$feedback = $e -> getMessage();

	}
}
?><!doctype html>
<html lang="en">
	<head>
		
		<title>Create ride</title>
		<?php
		include_once ("includes/head.php");
		
		?>
		
		<script><?php
			include_once ("includes/mobile_menu.js");
		?></script>
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

					
						<legend>From:</legend>
						<label for="Ride_Country">Country</label>
						<div class="controls">
							<select name="Ride_Country">
								<option>Belgium</option>
								<option>France</option>
							</select>
						</div>
						<div class="controls">
							<label for="Ride_State">State</label>
							<select name="Ride_State">
								<option>East-Flanders</option>
								<option>Provence</option>
							</select>
						</div>
						<div class="controls">
							<label for="Ride_City">City</label>
							<select name="Ride_City">
								<option>Dendermonde</option>
								<option>Lille</option>
							</select>
						</div>
						<div class="controls">
							<label for="Ride_Street">Street</label>
							<select name="Ride_Street">
								<option>Leeuwerikenlaan</option>
								<option>Rue de Patat</option>
							</select>
						</div>
						<div class="controls" >
							<label for="Ride_StreetNumber">Nr</label>
							<select name="Ride_StreetNumber">
								<option>1</option>
								<option>3</option>
							</select>
						</div>
						
						<legend>To:</legend>
						<label for="Ride_CountryTo">Country</label>
						<div class="controls">
							<select name="Ride_CountryTo">
								<option>Belgium</option>
								<option>France</option>
							</select>
						</div>
						<div class="controls">
							<label for="Ride_StateTo">State</label>
							<select name="Ride_StateTo">
								<option>East-Flanders</option>
								<option>Provence</option>
							</select>
						</div>
						<div class="controls">
							<label for="Ride_CityTo">City</label>
							<select name="Ride_CityTo">
								<option>Dendermonde</option>
								<option>Lille</option>
							</select>
						</div>
						<div class="controls">
							<label for="Ride_StreetTo">Street</label>
							<select name="Ride_StreetTo">
								<option>Leeuwerikenlaan</option>
								<option>Rue de Patat</option>
							</select>
						</div>
						<div class="controls" >
							<label for="Ride_StreetNumberTo">Nr</label>
							<select name="Ride_StreetNumberTo">
								<option>1</option>
								<option>3</option>
							</select>
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