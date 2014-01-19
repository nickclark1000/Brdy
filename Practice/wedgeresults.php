<?php

//posts data about the hole tee markers

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	if(!$conn) {die('Could not connect:' . mysql_error());
		} else {echo "Connection successful. ";}
	mysql_select_db($database);					


	// post tee marker data
	$wedge1count = $_POST['wedge1'];
	$wedge2count = $_POST['wedge2'];
	$wedge3count = $_POST['wedge3'];
	$wedge4count = $_POST['wedge4'];
	$wedge5count = $_POST['wedge5'];
	$wedge6count = $_POST['wedge6'];
	$wedge7count = $_POST['wedge7'];
	$wedge8count = $_POST['wedge8'];
	$wedge9count = $_POST['wedge9'];
	$wedge10count = $_POST['wedge10'];
	$totalscore = $_POST['totalscore'];
	
	//wedge handicap calculation
//	$wedgehdcp='';
	if($totalscore < "10") {
		$wedgehdcp = 2*$totalscore -28;	
	}
	else {
		$wedgehdcp = 1.3837*$totalscore - 22.167;	
	}
	
	echo "wedge1: $wedge10count Total: $totalscore , handicap: $wedgehdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`TestCategory`,`Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('Wedge','$totalscore','$wedgehdcp','$wedge1count','$wedge2count','$wedge3count','$wedge4count','$wedge5count','$wedge6count','$wedge7count','$wedge8count','$wedge9count','$wedge10count')") or die(mysql_error());
	
	//need logic to update values in case of user errors
	
		
	//close your connections
	mysql_close();
?> 