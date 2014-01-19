<?php

	include 'admininfo.php';			

	// post user data
	$email = $_POST['emailaddress'];
	$password = $_POST['password'];
	
	//encrypt password
	
	$sql="SELECT * FROM RegisteredUsers WHERE Email='$email' and Password='$password'";
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	
	// If result matched $myusername and $mypassword, table row must be 1 row
	
	if($count==1){
	session_start();
	$userid = $row['UserId'];
	// Register $email, $password and redirect to file "login_success.php"
	$_SESSION['userid']=$userid;
//	echo "userid".$_SESSION['userid'];

	}
	else {
	echo "Wrong Username or Password";
	}

	header("location: summary.php");
			
	//close your connections
	mysql_close();
?> 