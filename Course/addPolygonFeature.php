<?php

//posts data about the hole features (e.g., green, fairway, teeblock)

	include '../Common/admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	if(!$conn) {die('Could not connect:' . mysql_error());
		} else {echo "Connection successful. ";}
	mysql_select_db($database);					

	$holenum = $_POST['holeNum'];
	// if posting polygon data
	$wktelement = $_POST['polygonValue'];
	$featuretype = $_POST['polygonType'];

	echo "Hole: $holenum , FeatureType: $featuretype , featureValue: $wktelement .";
	
	mysql_query("INSERT INTO HoleInfo (`CourseId`,`HoleNum`,`FeatureType`,`FeatureValue`) VALUES (1,'$holenum','$featuretype',GeomFromText({$wktelement}))") or die(mysql_error());
	
	//close your connections
	mysql_close();
?> 