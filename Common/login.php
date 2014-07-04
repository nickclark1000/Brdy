<?php
	session_start();
	include 'admininfo.php';			

	// post user data
	$email = mysqli_real_escape_string($conn, $_POST['loginEmail']);
	$password = mysqli_real_escape_string($conn, $_POST['loginPassword']);
	
	$sql = "SELECT * FROM Users WHERE Email='$email'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
	// Mysql_num_row is counting table row
	$count = mysqli_num_rows($result);
	if($count != 1) {
		header("location: index.php");
	}
	
	$userid = $row['UserId'];
	$hashpassword = $row['Password'];
	$isPwdCorrect = password_verify($password, $hashpassword);

	if($isPwdCorrect == 1) {

		$_SESSION['userId'] = $userid;
//		$_SESSION['loggedIn'] = 1;
		header("location: http://localhost:8888/Brdy/Play/roundList.php");

	}
	else {
//		header("location: http://localhost:8888/Brdy/Common/index.php?failed=1");
	}
			
	//close your connections
	mysqli_close($conn);
?> 