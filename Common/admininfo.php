<?php

	$dbhost = 'localhost';	
	$username='nickclark';
	$password='penguin1';
	$database='NewCourse';
	
	$conn = mysql_connect($dbhost,$username,$password);
	mysql_select_db($database);

?>