<?php

	include 'admininfo.php';
	
	echo "hello";
	echo "<br />";
	
	$conn = mysql_connect($dbhost,$username,$password);
	if(!$conn) {die('Could not connect:' . mysql_error());
		} else {echo "connection successful";}
		echo "<br />";
		echo "<br />";
		
	//mysql_select_db('$database',$conn);		//*you're passing a string, not a var
	mysql_select_db($database);					//*also removed $conn
		
		
	$query = "SELECT * FROM GolfCourseInfo";
	
	$result = mysql_query($query);
	
	while($course = mysql_fetch_array($result)) {
		echo $course['name'];
		echo "<br />";
		}
		
 
	//$name = $_POST['inputName'];		//I changed this, you have to use name from data you passed with jquery.post()
	$name = $_POST['name'];
	echo $name;
	//$yardage = $_POST['inputYardage'];
	$yardage = $_POST['yardage'];
	echo $yardage;
	
	//*This conditional is inhibiting the post method since it's coming from jquery it seems, took it out
	// if(!$_POST['submitBtn']) {
		// echo "please fill out the form";
		// header('Location: googlemap1.html');
	// } else {
		// mysql_query("INSERT INTO GolfCourseInfo (`id`,`name`,`yardage`) VALUES (NULL, '$name','$yardage')") or die(mysql_error());
		// echo "Course has been added!";
		// header('Location: googlemap1.html');
	// }
	
	mysql_query("INSERT INTO GolfCourseInfo (`id`,`name`,`yardage`) VALUES (NULL, '$name','$yardage')") or die(mysql_error());
	
	//*close your connections!
	mysql_close();
	header('Location: googlemap1.html');
?> 