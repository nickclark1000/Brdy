<?php

//posts data about the hole tee markers

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	if(!$conn) {die('Could not connect:' . mysql_error());
		} else {echo "Connection successful. ";}
	mysql_select_db($database);					


	// post tee marker data
	$pitch1count = $_POST['pitch1'];
	$pitch2count = $_POST['pitch2'];
	$pitch3count = $_POST['pitch3'];
	$pitch4count = $_POST['pitch4'];
	$pitch5count = $_POST['pitch5'];
	$pitch6count = $_POST['pitch6'];
	$pitch7count = $_POST['pitch7'];
	$pitch8count = $_POST['pitch8'];
	$pitch9count = $_POST['pitch9'];
	$pitch10count = $_POST['pitch10'];
	$totalscore = $_POST['totalscore'];
	
	//pitch handicap calculation
//	$pitchhdcp='';
	if($totalscore < "9") {
		$pitchhdcp = 2*$totalscore -30;	
	}
	else {
		$pitchhdcp = 1.3955*$totalscore - 25;	
	}
	
	echo "pitch1: $pitch10count Total: $totalscore , handicap: $pitchhdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`TestCategory`,`Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('Pitch','$totalscore','$pitchhdcp','$pitch1count','$pitch2count','$pitch3count','$pitch4count','$pitch5count','$pitch6count','$pitch7count','$pitch8count','$pitch9count','$pitch10count')") or die(mysql_error());
	
	//need logic to update values in case of user errors
	
		
	//close your connections
	mysql_close();
?> 