<?php

//posts user data

	include 'admininfo.php';

	// post user data
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$email= mysqli_real_escape_string($conn, $_POST['registerEmail']);
	$password = mysqli_real_escape_string($conn, $_POST['registerPassword']);
	
	//encrypt password
	$encryptpass = password_hash($password, PASSWORD_DEFAULT);
	
	mysqli_query($conn, "INSERT INTO Users (`FirstName`,`LastName`,`Email`,`Password`) VALUES ('$firstname','$lastname','$email','$encryptpass')") or die(mysql_error());	
	
//	header("location: http://localhost:8888/Play/roundList.php");	
		
	//close your connections
	mysqli_close($conn);
?> 