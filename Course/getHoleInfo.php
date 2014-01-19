<?php

	include '../Common/admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
					  
	$holenum = $_POST['dataString'];
  
	$query = "SELECT FeatureType, AsText(FeatureValue) FROM `HoleInfo` WHERE `HoleNum`='$holenum' ";
  		  
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
		$featuretype = $row['FeatureType'];
		$featurevalue = $row['AsText(FeatureValue)'];
		echo "<tr><td>".$featuretype."</td></tr>".$featurevalue."";
	}

	//close your connections
	mysql_close();
?> 