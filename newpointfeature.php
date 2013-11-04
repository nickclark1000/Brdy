<?php

//posts data about the hole tee markers

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);				

	// post tee marker data
	$wktelement = $_POST['pointLoc'];
	$featuretype = $_POST['pointType'];
	$featuresubtype = $_POST['pointSubType'];
	$holenum = $_POST['holeNum'];
	
//	echo "Hole: $holenum , FeatureType: $featuretype , FeatureSubType: $featuresubtype , featureValue: $wktelement .";
	
	mysql_query("INSERT INTO HoleInfo (`Course`,`HoleNum`,`FeatureType`,`FeatureValue`) VALUES (1,'$holenum','$featuretype',GeomFromText({$wktelement}))") or die(mysql_error());

	$query = "SELECT FeatureType FROM `HoleInfo` WHERE `HoleNum`='$holenum' ";
  		  
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
		$featuretype = $row['FeatureType'];
		echo "<tr><td>".$featuretype."</td></tr>";
	}
		
	//close your connections
	mysql_close();
?> 