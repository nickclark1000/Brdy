<?php

//posts data about the hole tee markers

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	if(!$conn) {die('Could not connect:' . mysql_error());
		} else {echo "Connection successful. ";}
	mysql_select_db($database);					


	// post tee marker data
	$chip1count = $_POST['chip1'];
	$chip2count = $_POST['chip2'];
	$chip3count = $_POST['chip3'];
	$chip4count = $_POST['chip4'];
	$chip5count = $_POST['chip5'];
	$chip6count = $_POST['chip6'];
	$chip7count = $_POST['chip7'];
	$chip8count = $_POST['chip8'];
	$chip9count = $_POST['chip9'];
	$chip10count = $_POST['chip10'];
	$totalscore = $_POST['totalscore'];
	
	//chip handicap calculation
//	$chiphdcp='';

	$chiphdcp = 1.9401*$totalscore -35.562;	

	
	echo "chip1: $chip10count Total: $totalscore , handicap: $chiphdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`TestCategory`,`Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('Chip','$totalscore','$chiphdcp','$chip1count','$chip2count','$chip3count','$chip4count','$chip5count','$chip6count','$chip7count','$chip8count','$chip9count','$chip10count')") or die(mysql_error());
	
	//need logic to update values in case of user errors
	
		
	//close your connections
	mysql_close();
?> 