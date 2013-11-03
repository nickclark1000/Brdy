<?php

	$dbhost = 'localhost';	
	$username='nickclark';
	$password='penguin1';
	$database='Courses';
	
	$conn = mysql_connect($dbhost,$username,$password);
	mysql_select_db($database);

?>