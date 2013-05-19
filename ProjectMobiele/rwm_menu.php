<?php
	include_once("rwm_logica.php");
	
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="css/normalize.css" media="all">
	<link rel="stylesheet" href="css/screen.css" media="screen">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />

	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
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
	
	<title>IMD Talks</title>

</head>
<body>
<div data-role="page">
	<?php
		include("rwm_sidebar.php");
	?>
	<div data-role="content">
		<form>
			<br />
			<a data-role="button"  href="rwm_loggedin.php" data-theme="b" >Search ride<br/>TAP</a><br />
			<a data-role="button" href="rwm_loggedin.php"  data-theme="b">Create ride<br/>TAP</a><br />
			<a data-role="button" href="rwm_loggedin.php"  data-theme="b">Your rides<br/>TAP</a>
		</form>
	</div>
</div>

</body>
</html>