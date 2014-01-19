<?php

//posts data about the hole tee markers

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	if(!$conn) {die('Could not connect:' . mysql_error());
		} else {echo "Connection successful. ";}
	mysql_select_db($database);					


	// post tee marker data
	$longputt1count = $_POST['longputt1'];
	$longputt2count = $_POST['longputt2'];
	$longputt3count = $_POST['longputt3'];
	$longputt4count = $_POST['longputt4'];
	$longputt5count = $_POST['longputt5'];
	$longputt6count = $_POST['longputt6'];
	$longputt7count = $_POST['longputt7'];
	$longputt8count = $_POST['longputt8'];
	$longputt9count = $_POST['longputt9'];
	$longputt10count = $_POST['longputt10'];
	$totalscore = $_POST['totalscore'];
	
	//longputt handicap calculation
//	$longputthdcp='';
	if($totalscore < "19") {
		$longputthdcp = 2*$totalscore -38;	
	}
	else {
		$longputthdcp = 1.25*$totalscore - 24.833;	
	}
	
	echo "longputt1: $longputt10count Total: $totalscore , handicap: $longputthdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`TestCategory`,`Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('LagPutting','$totalscore','$longputthdcp','$longputt1count','$longputt2count','$longputt3count','$longputt4count','$longputt5count','$longputt6count','$longputt7count','$longputt8count','$longputt9count','$longputt10count')") or die(mysql_error());
	
	//need logic to update values in case of user errors
	
		
	//close your connections
	mysql_close();
?> 