<?php

//posts user data

	include 'admininfo.php';

	// post user data
	$firstname = mysql_real_escape_string($_POST['firstname']);
	$lastname = mysql_real_escape_string($_POST['lastname']);
	$email= mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	
	//encrypt password
	$encryptpass = hash('sha512', $password);
	
	mysql_query("INSERT INTO RegisteredUsers (`Email`,`Password`,`FirstName`,`LastName`) VALUES ('$email','$encryptpass','$firstname','$lastname')") or die(mysql_error());	
	
	header("Location: signin.html");	
		
	//close your connections
	mysql_close();
?> 