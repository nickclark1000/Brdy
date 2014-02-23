<?php

//posts user data

	include 'admininfo.php';

	// post user data
	$firstname = mysql_real_escape_string($_POST['firstname']);
	$lastname = mysql_real_escape_string($_POST['lastname']);
	$email= mysql_real_escape_string($_POST['registerEmail']);
	$password = mysql_real_escape_string($_POST['registerPassword']);
	
	//encrypt password
	$encryptpass = password_hash($password, PASSWORD_DEFAULT);
	
	mysql_query("INSERT INTO Users (`FirstName`,`LastName`,`Email`,`Password`) VALUES ('$firstname','$lastname','$email','$encryptpass')") or die(mysql_error());	
	
//	header("Location: ../Play/roundList.php");	
		
	//close your connections
	mysql_close();
?> 