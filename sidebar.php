<?php 
	// laatste filename zoeken met:
	// 1.
	$currentPage = $_SERVER['SCRIPT_NAME'];
	//echo $currentPage;
	// met explode kan je bepaalde gegevens voor een bepaald teken weglaten
	$url = explode("/", $currentPage);
	
	// 2.length - 1 = 4-1 = 3de = laatste vakje 
	// 3. functie end: hiermee draai je de array om en begin te bij de laatste record, namelijk de paginanaam (.phpfile)
	$page = end($url);
	//echo $page;
	
?><div id="sidebar">
	<div data-theme="a" data-role="header">    
        <h3>
            Ride with.me
       
        </h3>
        <header>
			<nav id="mobile-bar"></nav>
				
			<nav id="main-nav">
			
				<ul>

					<li data-role="list-divider" role="heading"  class="ui-li ui-li-divider  "><a  href="profile.php?" id="you" ><img style="width: 50px;" src="uploads/<?php echo $_SESSION["profile_photo"] ?> "/><?php echo " " . $_SESSION["name"] . " " . $_SESSION["surname"] ?></a></li>
					<li><a <?php if($page == "searchRides.php"){echo 'class="active"';}?> href="searchRides.php" >&nbsp Search ride</a></li>
					<li><a <?php if($page == "searchRides.php"){echo 'class="active"';}?> href="createRide.php">&nbsp Create ride</a></li>
					<li><a <?php if($page == "searchRides.php"){echo 'class="active"';}?> href="yourRides.php">&nbsp Your rides</a></li>
					<li><a <?php if($page == "searchRides.php"){echo 'class="active"';}?> href="settings.php"><img  src="img/Settings.png" img style="width: 15px;"/>&nbsp&nbspSettings</a></li>

				</ul>
			</nav>
		</header>
	</div>
</div>