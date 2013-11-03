<?php

//posts data about the hole tee markers

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	if(!$conn) {die('Could not connect:' . mysql_error());
		} else {echo "Connection successful. ";}
	mysql_select_db($database);					


	// post tee marker data
	$wktelement = $_POST['pointLoc'];
	$featuretype = $_POST['pointType'];
	$featuresubtype = $_POST['pointSubType'];
	$holenum = $_POST['holeNum'];
	
	echo "Hole: $holenum , FeatureType: $featuretype , FeatureSubType: $featuresubtype , featureValue: $wktelement .";
	
	mysql_query("INSERT INTO HoleInfo (`Course`,`HoleNum`,`FeatureType`,`FeatureValue`) VALUES (1,'$holenum','$featuretype',GeomFromText({$wktelement}))") or die(mysql_error());
		
	//close your connections
	mysql_close();
?> 