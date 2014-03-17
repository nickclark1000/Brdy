<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/geoPHP/geoPHP.inc');
include $_SERVER['DOCUMENT_ROOT'].'/spherical-geometry-php/spherical-geometry.class.php';
include '../Play/getHoleFeatures.php';
include '../Common/admininfo.php';

$data = $_POST["shots"];
$RoundId = $_POST["roundId"];
$HoleNum = $_POST["holeNum"];
//$CourseId = $_POST["courseId"];

$holePin = $holeFeatures[$HoleNum-1]->pinlocation[0];
$holePinLatLon = new LatLng($holePin->y(), $holePin->x());

$shots = array();

foreach ($data as $value) {

	$thisShot = new stdClass();
	$thisShot->shotPositionString = $value['position'];
	$thisShot->shotPosition = geoPHP::load(str_replace("'", "", $value['position']), 'wkt');
	$thisShot->clubNum = $value['clubUsed'];
	array_push($shots, $thisShot);
}

for ($i=0; $i < count($shots); $i++) {
	$j = $i + 1;
	$shots[$i]->shotNum = $i+1;
	$result = getShotLocationCategory($HoleNum, $shots[$i]->shotPosition, $holeFeatures);
	$shots[$i]->shotFrom = $result['shotFrom'];
	$shots[$i]->shotFromDescription = $result['shotFrom']."".$result['index'];
	//distance to hole computation
	$pt1 = new LatLng($shots[$i]->shotPosition->y(), $shots[$i]->shotPosition->x());
	$pt2 = new LatLng($holePin->y(), $holePin->x());
	$distanceToHole = SphericalGeometry::computeDistanceBetween($pt1, $pt2);
	$shots[$i]->distanceToHole = $distanceToHole;
	//shot distance computation
	$pt3 = new LatLng($shots[$i]->shotPosition->y(), $shots[$i]->shotPosition->x());
	if ($i == count($shots) - 1) {
		$pt4 = new LatLng($holePin->y(), $holePin->x());
	} else {
		$pt4 = new LatLng($shots[$j]->shotPosition->y(), $shots[$j]->shotPosition->x());
	}
	$shots[$i]->shotDistance = SphericalGeometry::computeDistanceBetween($pt3, $pt4);
	
	if($i > 0) {
		$shots[$i-1]->proximityAfterShot = $shots[$i]->distanceToHole;
		$shots[$i-1]->shotTo = $shots[$i]->shotFrom;
	}
	
	//calculate green edge distances (between shot location and edge of green; between edge of green and pin)
	if ($shots[$i]->shotFrom != 'green') {
		for ($l=1; $l<1000; $l++) {
			$intersectPt = SphericalGeometry::interpolate($pt3, $holePinLatLon, $l/1000);
		//	print_r($intersectPt);
			if (SphericalGeometry::containsLocation(latLngToGeo($intersectPt), $holeFeatures[$HoleNum-1]->green)==true) {
				break;
			}
		}
		$shots[$i]->percGreenAvailability = SphericalGeometry::computeDistanceBetween($intersectPt, $holePinLatLon) / $shots[$i]->distanceToHole * 100;
	}
	
	if($i == count($shots) - 1) {

		//define the target line for the active hole
		$holeTarget = $holeFeatures[0]->targetline[0];
		//heading calculation of tee shot
		$pt3 = new LatLng($shots[0]->shotPosition->y(), $shots[0]->shotPosition->x());
		$pt4 = new LatLng($shots[1]->shotPosition->y(), $shots[1]->shotPosition->x());
		$shotHeading = SphericalGeometry::computeHeading($pt3, $pt4);
		//heading calculation of best target pt
		//define the number of target pts on the hole (for when hole is a dog leg)
		$polyline_array = $holeTarget->getComponents();
		
		//initial conditions
		$MinDistance = 9999;
		$valueid = 0;
		$teemarker = $holeFeatures[0]->teemarker[0];
		foreach ($polyline_array as $key=>$value) {
			$pt5 = new LatLng($value->y(),$value->x());
			$pt6 = new LatLng($teemarker->y(), $teemarker->x());
			$distance = SphericalGeometry::computeDistanceBetween($pt5, $pt6);

			if($distance < $MinDistance) {
				$MinDistance = $distance;
				$valueid = $key;
			}
		}

		//Get heading between tee shot location and pt from 3
		$lon1 = $teemarker->x();
		$lat1 = $teemarker->y();
		$TargetLon = $polyline_array[$valueid]->x();
		$TargetLat = $polyline_array[$valueid]->y();

		$TargetPt = new LatLng($TargetLat, $TargetLon);
		$TeemarkerPt = new LatLng($lat1, $lon1);

		$targetHeading = SphericalGeometry::computeHeading($TeemarkerPt, $TargetPt);
		//determine the direction off target (Left L or right R)
		$dirOffTarget = getDirOffTarget($shotHeading, $targetHeading);
		$shots[0]->dirOffTarget = $dirOffTarget;

		if ($shots[1]->shotFrom == 'rough') {
			$shots[1]->shotFromDescription = 'rough'.$dirOffTarget;
		}
		$shots[$i]->proximityAfterShot = 0;
		$shots[$i]->shotTo = 'hole';
		//distance from fairway calculations
		//use angle between shot and target headings to get cosine
		$cosTheta = abs(cos(deg2rad($shotHeading - $targetHeading)));
		//find the adjacent distance and make sure to convert to meters for Google calculations that follow
		$adjDistance = $shots[0]->shotDistance * $cosTheta * 0.9144;
		//find the location of the right-angle corner of the triangle
		$cornerPt = SphericalGeometry::computeOffset($pt3, $adjDistance, $targetHeading);
		//find distance between cornerPt/middle of fairway and 2nd shot location. Make sure to convert to yards. Assign to first shot. 
		$ydsOffFairwayCenter = SphericalGeometry::computeDistanceBetween($cornerPt, $pt4);
		$shots[0]->ydsOffFairwayCenter = $ydsOffFairwayCenter;
		//if fairway was missed, use Google interpolate and containsLocation methods to find approximate location of the edge of fairway
		if ($shots[1]->shotFrom !== 'fairway') {
			for ($k=1; $k<1000; $k++) {
				$intersectPt = SphericalGeometry::interpolate($cornerPt, $pt4, $k/1000);
				if (SphericalGeometry::containsLocation(latLngToGeo($intersectPt), $holeFeatures[$HoleNum-1]->fairway[0])==false) {
					break;
				}
			}	
			//calculate distance beween the edge of fairway and 2nd shot location. Make sure to convert to yards.
			$ydsOffFairway = SphericalGeometry::computeDistanceBetween($intersectPt, $pt4);
			$shots[0]->ydsOffFairway = $ydsOffFairway;
		}
	}
}

function getShotLocationCategory($HoleNum, $ShotGeo, $holeFeatures) {
	foreach ($holeFeatures[$HoleNum-1]->teeblock as $key=>$teeblock) {
		if (SphericalGeometry::containsLocation($ShotGeo, $teeblock)==true){
			$result = array("index"=>$key,"shotFrom"=>"teeblock");
		  return $result;
		}
	}
	foreach ($holeFeatures[$HoleNum-1]->fairway as $key=>$fairway) {
		if (SphericalGeometry::containsLocation($ShotGeo, $fairway)==true){
		  	$result = array("index"=>$key,"shotFrom"=>"fairway");
		  	return $result;
		}
	}
	foreach ($holeFeatures[$HoleNum-1]->fairwaybunker as $key=>$fairwaybunker) {
		if (SphericalGeometry::containsLocation($ShotGeo, $fairwaybunker)==true){
		  	$result = array("index"=>$key,"shotFrom"=>"fairwaybunker");
		  	return $result;
		}
	}
	foreach ($holeFeatures[$HoleNum-1]->bunker as $key=>$bunker) {
		if (SphericalGeometry::containsLocation($ShotGeo, $bunker)==true){
		  	$result = array("index"=>$key,"shotFrom"=>"bunker");
		  	return $result;
		}
	}
	if (SphericalGeometry::containsLocation($ShotGeo, $holeFeatures[$HoleNum-1]->green)==true){
		return array("index"=>0, "shotFrom"=>"green");
	}
	return array("index"=>0, "shotFrom"=>"rough");
}

function latLngToGeo($LatLng) {
	$lat = $LatLng->getLat();
	$lng = $LatLng->getLng();
	$wkt = "POINT(".$lng." ".$lat.")";

	return geoPHP::load($wkt,'wkt');
}

function getDirOffTarget($shotHeading, $targetHeading) {
	$s = $shotHeading;
	$t = $targetHeading;

	// determine t quadrant
	if ($t >= 0 && $t < 90) {
		$tQuad = 1;
	} else if ($t > 90 && $t < 180) {
		$tQuad = 2;
	} else if ($t < -90 && $t >= -180) {
		$tQuad = 3;
	} else {
		$tQuad = 4;
	}
	//determine s quadrant
	if ($s >= 0 && $s < 90) {
		$sQuad = 1;
	} else if ($s > 90 && $s < 180) {
		$sQuad = 2;
	} else if ($s < -90 && $s >= -180) {
		$sQuad = 3;
	} else {
		$sQuad = 4;
	}
	// if $tQuad is the same quadrant as $sQuad
	if ($sQuad == $tQuad) {
		if ($s > $t) {
			$dirOffTarget = 'R';
		} else {
			$dirOffTarget = 'L';
		}
	} else
	//if $tQuad is 1
	if ($sQuad == 2 && $tQuad == 1) {
		$dirOffTarget = 'R';
	} else
	if ($sQuad == 4 && $tQuad == 1) {
		$dirOffTarget = 'L';
	} else
	//if $tQuad is 2
	if ($sQuad == 1 && $tQuad == 2) {
		$dirOffTarget = 'L';
	} else
	if ($sQuad == 3 && $tQuad == 2) {
		$dirOffTarget = 'R';
	} else
	//if $tQuad is 3
	if ($sQuad == 2 && $tQuad == 3) {
		$dirOffTarget = 'L';
	} else
	if ($sQuad == 4 && $tQuad == 3) {
		$dirOffTarget = 'R';
	} else
	//if $tQuad is 4
	if ($sQuad == 3 && $tQuad == 4) {
		$dirOffTarget = 'L';
	} else
	if ($sQuad == 1 && $tQuad == 4) {
		$dirOffTarget = 'R';
	}
	return $dirOffTarget;
}

foreach ($shots as $key=>$value) {
	$ShotNum = $key + 1;
	$ShotFrom = $value->shotFrom;
	echo $ShotFrom;
	$DistanceToHole = $value->distanceToHole;
	$ShotDistance = $value->shotDistance;
	$ClubNum = $value->clubNum;
	$ShotPosition = $value->shotPositionString;
	$DirOffTarget = $value->dirOffTarget;
	$YdsOffFairwayCenter = $value->ydsOffFairwayCenter;
	$YdsOffFairway = $value->ydsOffFairway;
	$PercGreenAvailability = $value->percGreenAvailability;
	$ShotFromDescription = $value->shotFromDescription;
	$ShotTo = $value->shotTo;
	$ProximityAfterShot = $value->proximityAfterShot;
	
	mysqli_query($conn, "INSERT INTO Shots (`RoundId`, `HoleNum`, `ShotNum`,`ShotFrom`,`DistanceToHole`, `ShotDistance`, `ClubNum`, `ShotPosition`, `DirOffTarget`,`YdsOffFairwayCenter`, `YdsOffFairway`,`PercGreenAvailability`,`ShotFromDescription`, `ShotTo`, `ProximityAfterShot`) VALUES ('$RoundId', '$HoleNum', '$ShotNum', '$ShotFrom', '$DistanceToHole', '$ShotDistance', '$ClubNum', GeomFromText({$ShotPosition}),'$DirOffTarget', '$YdsOffFairwayCenter','$YdsOffFairway','$PercGreenAvailability','$ShotFromDescription','$ShotTo','$ProximityAfterShot')") or die(mysqli_error($conn));
	}

mysqli_query($conn, "INSERT INTO RoundInfo (`RoundId`, `HoleNum`, `Score`, `PenaltyStrokes`) VALUES ('$RoundId', '$HoleNum', '$NumShots', 0)") or die(mysqli_error($conn));  

//close your connections
mysqli_close($conn);
?> 