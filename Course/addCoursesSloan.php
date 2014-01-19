<?php

	include '../Common/admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	if(!$conn) {die('Could not connect:' . mysql_error());
		} else {echo "Connection successful. ";}
	mysql_select_db($database);					
		
/*	$query = "SELECT * FROM GolfCourseInfo";
	
	$result = mysql_query($query);
	
	while($course = mysql_fetch_array($result)) {
		echo $course['name'];
		echo "<br />";
		}
*/
	$name = $_POST['name'];
	$yardage = $_POST['yardage'];
	$latitude = $_POST['lat'];
	$longitude = $_POST['lon'];
	
	echo "Yardage is: $yardage";
	
	mysql_query("INSERT INTO GolfCourseInfo (`id`,`name`,`yardage`, `latitude`, `longitude`) VALUES (NULL, '$name','$yardage','$latitude','$longitude')") or die(mysql_error());
	
	//*close your connections!
	mysql_close();
?> 