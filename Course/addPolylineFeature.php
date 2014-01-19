<?php

//posts data about the hole features (e.g., green, fairway, teeblock)

	include '../Common/admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);				

	$wktelement = $_POST['wktelement'];
	
	mysql_query("INSERT INTO HoleInfo (`CourseId`,`HoleNum`,`FeatureType`,`FeatureValue`) VALUES (1,1,'targetline',GeomFromText({$wktelement}))") or die(mysql_error());
	
	//close your connections
	mysql_close();
?> 