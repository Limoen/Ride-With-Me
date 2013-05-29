<?php
	include_once("logica.php");
	
?><!doctype html>
<html lang="en">
<head>
	<?php include_once("includes/head.php");?>
	<script>
	<?php include_once("includes/mobile_menu.js");?>
	</script>
</head>
<body>
<div data-role="page">
	<?php
		include_once("sidebar.php");
	?>
	<div data-role="content">
		<form>
			<br />
			<h1>Your rides</h1>
			<a data-role="button"  href="#" data-theme="b" >Your rides<br/>TAP</a><br />
			
		</form>
	</div>
</div>

</body>
</html>