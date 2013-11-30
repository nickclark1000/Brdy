<?php

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);

	$data = $_POST["shots"];
	
	foreach ($data as $value) {
		$RoundId = 1;
		$HoleNum = 1;
		$ShotNum = $value['shotNum'];
		$ShotPosition = $value['position'];
		$ShotFrom = $value['shotFrom'];
		$DistanceToHole = $value['shotDistToPin'];
		$ShotDistance = $value['shotDist'];
		$ClubNum = 2;

		mysql_query("INSERT INTO Shots VALUES ('$RoundId', '$HoleNum', '$ShotNum', '$ShotFrom', '$DistanceToHole', '$ShotDistance', '$ClubNum', GeomFromText({$ShotPosition}))") or die(mysql_error()); 
	}
  
	//close your connections
	mysql_close();
?> 