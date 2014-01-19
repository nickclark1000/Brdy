<?php

//posts data about the hole tee markers

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	if(!$conn) {die('Could not connect:' . mysql_error());
		} else {echo "Connection successful. ";}
	mysql_select_db($database);					


	// post tee marker data
	$bunker1count = $_POST['bunker1'];
	$bunker2count = $_POST['bunker2'];
	$bunker3count = $_POST['bunker3'];
	$bunker4count = $_POST['bunker4'];
	$bunker5count = $_POST['bunker5'];
	$bunker6count = $_POST['bunker6'];
	$bunker7count = $_POST['bunker7'];
	$bunker8count = $_POST['bunker8'];
	$bunker9count = $_POST['bunker9'];
	$bunker10count = $_POST['bunker10'];
	$totalscore = $_POST['totalscore'];
	
	//bunker handicap calculation
//	$bunkerhdcp='';
	if($totalscore < "5") {
		$bunkerhdcp = 2.2238*$totalscore -20.331;	
	}
	else {
		$bunkerhdcp = 1.0542*$totalscore - 16.492;	
	}
	
	echo "bunker1: $bunker10count Total: $totalscore , handicap: $bunkerhdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`TestCategory`,`Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('Bunker','$totalscore','$bunkerhdcp','$bunker1count','$bunker2count','$bunker3count','$bunker4count','$bunker5count','$bunker6count','$bunker7count','$bunker8count','$bunker9count','$bunker10count')") or die(mysql_error());
	
	//need logic to update values in case of user errors
	
		
	//close your connections
	mysql_close();
?> 