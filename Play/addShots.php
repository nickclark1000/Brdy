<?php

	include '../Common/admininfo.php';

	$data = $_POST["shots"];
	$RoundId = $_POST["roundId"];
	$NumShots = $_POST["numShots"];
	
	foreach ($data as $value) {
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
		$ProximityAfterShot = $value['proximityAfterShot'];

		mysqli_query($conn, "INSERT INTO Shots (`RoundId`, `HoleNum`, `ShotNum`,`ShotFrom`,`DistanceToHole`, `ShotDistance`, `ClubNum`, `ShotPosition`, `DirOffTarget`,`YdsOffFairwayCenter`,`YdsOffFairway`,`PercGreenAvailability`,`ShotFromDescription`,`ShotTo`,`ProximityAfterShot`) VALUES ('$RoundId', '$HoleNum', '$ShotNum', '$ShotFrom', '$DistanceToHole', '$ShotDistance', '$ClubNum', GeomFromText({$ShotPosition}),'$DirOffTarget', '$YdsOffFairwayCenter','$YdsOffFairway','$PercGreenAvailability','$ShotFromDescription','$ShotTo','$ProximityAfterShot')") or die(mysqli_error($conn)); 
	}
	mysqli_query($conn, "INSERT INTO RoundInfo (`RoundId`, `HoleNum`, `Score`, `PenaltyStrokes`) VALUES ('$RoundId', '$HoleNum', '$NumShots', 0)") or die(mysqli_error($conn));  
	//close your connections
	mysqli_close($conn);
?> 