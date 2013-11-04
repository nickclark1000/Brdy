<?php

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
					  
	$holenum = $_POST['dataString'];
  
	$query = "SELECT FeatureType FROM `HoleInfo` WHERE `HoleNum`='$holenum' ";
  		  
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
		$featuretype = $row['FeatureType'];
		echo "<tr><td>".$featuretype."</td></tr>";
	}

	//close your connections
	mysql_close();
?> 