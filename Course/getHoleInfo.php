<?php

	include '../Common/admininfo.php';
					  
	$holenum = $_POST['dataString'];
  
	$query = "SELECT FeatureType, AsText(FeatureValue) FROM `HoleInfo` WHERE `HoleNum`='$holenum' ";
  		  
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result)){
		$featuretype = $row['FeatureType'];
		$featurevalue = $row['AsText(FeatureValue)'];
		echo "<tr><td>".$featuretype."</td></tr>".$featurevalue."";
	}

	//close your connections
	mysqli_close($conn);
?> 