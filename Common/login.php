<?php

	include 'admininfo.php';			

	// post user data
	$email = mysql_real_escape_string($_POST['loginEmail']);
	$password = mysql_real_escape_string($_POST['loginPassword']);
	
	$sql = "SELECT * FROM Users WHERE Email='$email'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	// Mysql_num_row is counting table row
	$count = mysql_num_rows($result);
	if($count != 1) {
		header("location: index.php");
	}
	
	$userid = $row['UserId'];
	$hashpassword = $row['Password'];
	$isPwdCorrect = password_verify($password, $hashpassword);

	if($isPwdCorrect == 1){

		header("location: ../Play/roundList.php");

	}
	else {
		header("location: index.php?failed=1");
	}
			
	//close your connections
	mysql_close();
?> 