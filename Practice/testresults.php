<?php

//posts data about the short game test
	session_start();
	include 'admininfo.php';
//	error_reporting(E_ALL); ini_set('display_errors', 'On');
	
	
	$date = date('Y-m-d');
	
	// get maximum testid from database and increment by 1
   $maxquery = "SELECT MAX(TestId) FROM `ShortGameTestResults`";
   $result = mysql_query($maxquery);
   $row = mysql_fetch_row($result);
 	$maxtestid = $row[0];
   $testid = $maxtestid + 1;
   
//   echo "$maxtestid , test id: $testid , ".$row[0];
	
/////// post wedge data
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
	$wedgetotalscore = $_POST['wedgetotalscore'];
	
	//wedge handicap calculation

	if($wedgetotalscore < "10") {
		$wedgehdcp = 2*$wedgetotalscore -28;	
	}
	else {
		$wedgehdcp = 1.3837*$wedgetotalscore - 22.167;	
	}
	
//	echo "wedge1: $wedge10count Total: $wedgetotalscore , handicap: $wedgehdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`UserId`,`TestId`,`TestCategory`,`Date`,`Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('".$_SESSION['userid']."','$testid','Wedge','$date','$wedgetotalscore','$wedgehdcp','$wedge1count','$wedge2count','$wedge3count','$wedge4count','$wedge5count','$wedge6count','$wedge7count','$wedge8count','$wedge9count','$wedge10count')") or die(mysql_error());
	
////////// post putting skills data
	$shortputt1count = $_POST['shortputt1'];
	$shortputt2count = $_POST['shortputt2'];
	$shortputt3count = $_POST['shortputt3'];
	$shortputt4count = $_POST['shortputt4'];
	$shortputt5count = $_POST['shortputt5'];
	$shortputt6count = $_POST['shortputt6'];
	$shortputt7count = $_POST['shortputt7'];
	$shortputt8count = $_POST['shortputt8'];
	$shortputt9count = $_POST['shortputt9'];
	$shortputt10count = $_POST['shortputt10'];
	$shortputt11count = $_POST['shortputt11'];
	$shortputt12count = $_POST['shortputt12'];
	$shortputt13count = $_POST['shortputt13'];
	$shortputt14count = $_POST['shortputt14'];
	$shortputt15count = $_POST['shortputt15'];
	$shortputt16count = $_POST['shortputt16'];
	$shortputt17count = $_POST['shortputt17'];
	$shortputt18count = $_POST['shortputt18'];
	$shortputt19count = $_POST['shortputt19'];
	$shortputt20count = $_POST['shortputt20'];
	$LRTotal = $_POST['LRTotal'];
	$RLTotal = $_POST['RLTotal'];
	
	//shortputt handicap calculation

	if(2*$LRTotal < "21") {
		$LRhdcp = 3*$LRTotal -30;	
	}
	else {
		$LRhdcp = 2*$LRTotal - 21;	
	}
	
	if(2*$RLTotal < "21") {
		$RLhdcp = 3*$RLTotal -30;	
	}
	else {
		$RLhdcp = 2*$RLTotal - 21;	
	}
	
//	echo "shortputt1: $shortputt1count LRTotal: $LRTotal , LRhandicap: $LRhdcp , RLhdcp: $RLhdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`UserId`,`TestId`,`TestCategory`,`TestSubCategory`, `Date`,`Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('".$_SESSION['userid']."','$testid','PuttingSkills', 'LeftToRight','$date','$LRTotal','$LRhdcp','$shortputt1count','$shortputt2count','$shortputt3count','$shortputt4count','$shortputt5count','$shortputt6count','$shortputt7count','$shortputt8count','$shortputt9count','$shortputt10count')") or die(mysql_error());
	
	mysql_query("INSERT INTO ShortGameTestResults (`UserId`,`TestId`,`TestCategory`,`TestSubCategory`, `Date`,`Total`, `Handicap`,`Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('".$_SESSION['userid']."','$testid','PuttingSkills','RightToLeft','$date','$RLTotal','$RLhdcp','$shortputt11count','$shortputt12count','$shortputt13count','$shortputt14count','$shortputt15count','$shortputt16count','$shortputt17count','$shortputt18count','$shortputt19count','$shortputt20count')") or die(mysql_error());
	
////////////// post pitch shot data
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
	$pitchtotalscore = $_POST['pitchtotalscore'];
	
	//pitch shot handicap calculation
	if($pitchtotalscore < "9") {
		$pitchhdcp = 2*$pitchtotalscore -30;	
	}
	else {
		$pitchhdcp = 1.3955*$pitchtotalscore - 25;	
	}
	
//	echo "pitch1: $pitch10count Total: $pitchtotalscore , handicap: $pitchhdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`UserId`,`TestId`,`TestCategory`,`Date`,`Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('".$_SESSION['userid']."','$testid','Pitch','$date','$pitchtotalscore','$pitchhdcp','$pitch1count','$pitch2count','$pitch3count','$pitch4count','$pitch5count','$pitch6count','$pitch7count','$pitch8count','$pitch9count','$pitch10count')") or die(mysql_error());

////////////// post lag putting data
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
	$longputttotalscore = $_POST['longputttotalscore'];
	
	//longputt handicap calculation

	if($longputttotalscore < "19") {
		$longputthdcp = 2*$longputttotalscore -38;	
	}
	else {
		$longputthdcp = 1.25*$longputttotalscore - 24.833;	
	}
	
//	echo "longputt1: $longputt10count Total: $longputttotalscore , handicap: $longputthdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`UserId`,`TestId`,`TestCategory`,`Date`,`Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('".$_SESSION['userid']."','$testid','LagPutting','$date','$longputttotalscore','$longputthdcp','$longputt1count','$longputt2count','$longputt3count','$longputt4count','$longputt5count','$longputt6count','$longputt7count','$longputt8count','$longputt9count','$longputt10count')") or die(mysql_error());

/////// post chip shot data
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
	$chiptotalscore = $_POST['chiptotalscore'];
	
	//chip handicap calculation

	$chiphdcp = 1.9401*$chiptotalscore -35.562;	
	
//	echo "chip1: $chip10count Total: $chiptotalscore , handicap: $chiphdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`UserId`,`TestId`,`TestCategory`,`Date`,`Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('".$_SESSION['userid']."','$testid','Chip','$date','$chiptotalscore','$chiphdcp','$chip1count','$chip2count','$chip3count','$chip4count','$chip5count','$chip6count','$chip7count','$chip8count','$chip9count','$chip10count')") or die(mysql_error());


//////// post bunker shot data
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
	$bunkertotalscore = $_POST['bunkertotalscore'];
	
	//bunker handicap calculation

	if($bunkertotalscore < "5") {
		$bunkerhdcp = 2.2238*$bunkertotalscore -20.331;	
	}
	else {
		$bunkerhdcp = 1.0542*$bunkertotalscore - 16.492;	
	}

//	echo "bunker1: $bunker10count Total: $bunkertotalscore , handicap: $bunkerhdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`UserId`,`TestId`,`TestCategory`,`Date`,`Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('".$_SESSION['userid']."','$testid','Bunker','$date','$bunkertotalscore','$bunkerhdcp','$bunker1count','$bunker2count','$bunker3count','$bunker4count','$bunker5count','$bunker6count','$bunker7count','$bunker8count','$bunker9count','$bunker10count')") or die(mysql_error());
	

	//need logic to update values in case of user errors
	
	header("location: http://localhost:8888/summary.php");

	//close your connections
	mysql_close();
?> 