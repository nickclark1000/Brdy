<?php

	include '../Common/admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);

	$data = $_POST["shots"];
	
	foreach ($data as $value) {
		$RoundId = 1;
		$HoleNum = $value['holeNum'];
		$PercGreenAvailability = $value['percGreenAvailability'];
		$DirOffTarget = $value['dirOffTarget'];
		$YdsOffFairway = $value['ydsOffFairway'];
		$YdsOffFairwayCenter = $value['ydsOffFairwayCenter'];
		$ShotNum = $value['shotNum'];
		$ShotPosition = $value['position'];
		$ShotFrom = $value['shotFrom'];
		$ShotFromDescription = $value['shotFromDescription'];
		$DistanceToHole = $value['shotDistToPin'];
		$ShotDistance = $value['shotDist'];
		$ClubNum = $value['clubUsed'];
		$ShotTo = $value['shotTo'];

		mysql_query("INSERT INTO Shots (`RoundId`, `HoleNum`, `ShotNum`,`ShotFrom`,`DistanceToHole`, `ShotDistance`, `ClubNum`, `ShotPosition`, `DirOffTarget`,`YdsOffFairwayCenter`,`YdsOffFairway`,`PercGreenAvailability`,`ShotFromDescription`,`ShotTo`) VALUES ('$RoundId', '$HoleNum', '$ShotNum', '$ShotFrom', '$DistanceToHole', '$ShotDistance', '$ClubNum', GeomFromText({$ShotPosition}),'$DirOffTarget', '$YdsOffFairwayCenter','$YdsOffFairway','$PercGreenAvailability','$ShotFromDescription','$ShotTo')") or die(mysql_error()); 
	}
  
	//close your connections
	mysql_close();
?> 