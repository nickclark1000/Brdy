<?php

//posts data about the pin location markers

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	if(!$conn) {die('Could not connect:' . mysql_error());
		} else {echo "Connection successful. ";}
	mysql_select_db($database);					


	// post pin location data
	$wktelement = $_POST['pinpositionLoc'];
	$pinposition = $_POST['pinPosition'];
	$holenum = $_POST['holeNum'];
	
	echo "Hole: $holenum , pin position: $pinPosition , pin position location: $wktelement .";
	
	mysql_query("INSERT INTO HoleInfo (`Course`,`HoleNum`,`FeatureType`,`FeatureValue`) VALUES (1,'$holenum','$pinposition',GeomFromText({$wktelement}))") or die(mysql_error());
	
	//close your connections
	mysql_close();
?> 