<?php

	include 'admininfo.php';			

	// post user data
	$email = mysql_real_escape_string($_POST['emailaddress']);
	$password = mysql_real_escape_string($_POST['password']);
	$encryptpass = hash('sha256', $password);
	//encrypt password
	
	$sql="SELECT Email,Password FROM RegisteredUsers WHERE Email='$email'";
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	
	// If result matched $myusername and $mypassword, table row must be 1 row
	mt_rand()
	password_hash();
	
	
	if($count==1){
		session_start();
		$userid = $row['UserId'];
		// Register $email, $password and redirect to file "login_success.php"
		$_SESSION['userid']=$userid;
		$hash = $row['Password'];
	
		password_verify($password, $hash)
    	echo 'Password is valid!';
    }
	else {
    echo 'Invalid password.';
	}
//	echo "userid".$_SESSION['userid'];



	header("location: summary.php");
			
	//close your connections
	mysql_close();
?> 