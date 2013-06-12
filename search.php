<?php
//include_once('classes/Db.class.php');
//include_once("classes/Ride.class.php");


$host="localhost"; // Host name 
$sqlusername="root"; // Mysql username 
$sqlpassword="root"; // Mysql password 
$db_name="ridewithme"; // Database name 
$tbl_name="rides"; // Table name

$currentPage = $_SERVER['SCRIPT_NAME'];
$url = explode("/", $currentPage);
$page = end($url);
 
// Connect to server and select databse.
mysql_connect("$host", "$sqlusername", "$sqlpassword")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$searchq = $_POST['searchq'];
if(empty($searchq)) {
    echo "";
    } else {
    //If there is text in the search field, this code is executed every time the input changes.
    echo "<div id='results'>
"; //this div is used to contain the results. Mostly used for styling.
             
    //This query searches the name field for whatever the input is.
    $sql = "SELECT * FROM rides WHERE ride_city LIKE '%$searchq%' OR ride_cityto LIKE '%$searchq%' ";
             
    $result = mysql_query($sql);
    while($row = mysql_fetch_assoc($result)) {
    
    	echo "<ul onclick='redirect(" . $row['ride_id'] . ");' data-role='listview' data-inset='true' class='ui-listview ui-listview-inset ui-corner-all ui-shadow'><li data-corners='false' data-shadow='false' data-iconshadow='true' data-wrapperels='div' data-icon='arrow-r' data-iconpos='right' data-theme='c' class='ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-c'><div class='ui-btn-inner ui-li'><div class='ui-btn-text'><a  href='rides.php?ride_id=" . $row['ride_id'] . "' class='ui-link-inherit'><p class='ui-li-aside ui-li-desc'>on " . $row['ride_date'] .  "<strong> at " . $row['ride_time'] . "</strong></p><h2 class='ui-li-heading'>" . $row['ride_city'] . " (" . $row['ride_country'] . ") - " . $row['ride_cityto'] . " (" . $row['ride_countryto'] . ")</h2><p class='ui-li-desc'><strong>From: </strong>" . $row['ride_street'] . " " . $row['ride_streetnumber'] . "</p><p class='ui-li-desc'><strong>To: </strong>" . $row['ride_streetto'] . " " . $row['ride_streetnumberto'] . "</p><p class='ul-li-desc'><img  src='img/steer.png'/>" . " " . $row['username'] . "</p></a></div></div></li></ul>";
                //echo "<br />";  
        } 
        echo "</div>";
    }
?>