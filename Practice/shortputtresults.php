<?php

//posts data about the short game test

	include 'admininfo.php';

	// post putting skills data
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
	
	echo "shortputt1: $shortputt1count LRTotal: $LRTotal , LRhandicap: $LRhdcp , RLhdcp: $RLhdcp";
	
	mysql_query("INSERT INTO ShortGameTestResults (`TestCategory`,`TestSubCategory`, `Total`, `Handicap`, `Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('PuttingSkills', 'LeftToRight','$LRTotal','$LRhdcp','$shortputt1count','$shortputt2count','$shortputt3count','$shortputt4count','$shortputt5count','$shortputt6count','$shortputt7count','$shortputt8count','$shortputt9count','$shortputt10count')") or die(mysql_error());
	
	mysql_query("INSERT INTO ShortGameTestResults (`TestCategory`,`TestSubCategory`, `Total`, `Handicap`,`Result1`,`Result2`,`Result3`,`Result4`,`Result5`,`Result6`,`Result7`,`Result8`,`Result9`,`Result10`) VALUES
	('PuttingSkills','RightToLeft','$RLTotal','$RLhdcp','$shortputt11count','$shortputt12count','$shortputt13count','$shortputt14count','$shortputt15count','$shortputt16count','$shortputt17count','$shortputt18count','$shortputt19count','$shortputt20count')") or die(mysql_error());
	
	//need logic to update values in case of user errors
	
		
	//close your connections
	mysql_close();
?> 