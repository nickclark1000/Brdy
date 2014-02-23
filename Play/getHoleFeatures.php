<?php

	include '../Common/admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	$courseId = $_POST['courseId'];
	
	$holeFeatures = array();
	for ($i = 1; $i<=18; $i++) {
		$thisHole = new stdClass();
		$thisHole->teeblock = array();
		$thisHole->fairwaybunker = array();
		$thisHole->fairway = array();
		$thisHole->bunker = array();
		$thisHole->teemarker = array();
		$thisHole->pinlocation = array();
		$thisHole->targetline = array();
		$thisHole->par = array();
		$query = mysql_query("SELECT FeatureType, AsText(FeatureValue) FROM `HoleInfo` where HoleNum='$i' and CourseId='$courseId'");
		$queryPar = mysql_query("SELECT Par FROM `Holes` where HoleNum='$i' and CourseId='$courseId'");
		while($row = mysql_fetch_array($query)){
			if ($row['FeatureType'] == 'fairway') {
				array_push($thisHole->fairway = $row['AsText(FeatureValue)']);
			}
			if ($row['FeatureType'] == 'green') {
				$thisHole->green = $row['AsText(FeatureValue)'];
			}
			if ($row['FeatureType'] == 'teeblock') {
				array_push($thisHole->teeblock, $row['AsText(FeatureValue)']);
			}
			if ($row['FeatureType'] == 'fairwaybunker') {
				array_push($thisHole->fairwaybunker, $row['AsText(FeatureValue)']);
			}
			if ($row['FeatureType'] == 'bunker') {
				array_push($thisHole->bunker, $row['AsText(FeatureValue)']);
			}
			if ($row['FeatureType'] == 'teemarker') {
				array_push($thisHole->teemarker, $row['AsText(FeatureValue)']);
			}
			if ($row['FeatureType'] == 'pinlocation') {
				array_push($thisHole->pinlocation, $row['AsText(FeatureValue)']);
			}
			if ($row['FeatureType'] == 'targetline') {
				array_push($thisHole->targetline, $row['AsText(FeatureValue)']);
			}
		}
		while($row = mysql_fetch_array($queryPar)){
			$thisHole->par = $row['Par'];
		}
		array_push($holeFeatures,$thisHole);
	}
	echo json_encode($holeFeatures);

	//close your connections
	mysql_close();
?> 