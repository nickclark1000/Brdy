<?php

	include 'admininfo.php';
	
	echo "hello";
	echo "<br />";
	
	$conn = mysql_connect($dbhost,$username,$password);
	if(!$conn) {die('Could not connect:' . mysql_error());
		} else {echo "connection successful";}
		echo "<br />";
		echo "<br />";
		
	mysql_select_db('$database',$conn);
	
	$query = "SELECT * FROM GolfCourseInfo";
	
	$result = mysql_query($query);
	
	while($course = mysql_fetch_array($result)) {
		echo $course['name'];
		echo "<br />";
		}
 
	$name = $_POST['inputName'];
	$yardage = $_POST['inputYardage'];
	
	if(!$_POST['submitBtn']) {
		echo "please fill out the form";
		header('Location: googlemap1.html');
	} else {
		mysql_query("INSERT INTO GolfCourseInfo (`id`,`name`,`yardage`) VALUES (NULL, '$name','$yardage')") or die(mysql_error());
		echo "Course has been added!";
		header('Location: googlemap1.html');
	}
	

?> 