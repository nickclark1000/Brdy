<?php


include_once($_SERVER['DOCUMENT_ROOT'].'/geoPHP/geoPHP.inc');
include $_SERVER['DOCUMENT_ROOT'].'/spherical-geometry-php/spherical-geometry.class.php';
include '../Play/getHoleFeatures.php';
include '../Common/admininfo.php';

$CourseId = 1; //$_POST['courseId'];
$UserId = 1; //$_POST['userId'];
$ShotFrom = 'teemarker';

//print_r($holeFeatures);

//Get hole lengths (e.g., 400 yds) into an array
$HoleDistance = mysqli_query($conn, "select Yardage from Holes where CourseId = '$CourseId'") or die(mysqli_error($conn));
while($row = mysqli_fetch_array($HoleDistance))
{
$HoleYardageArray[] = $row['Yardage'];
}

$Hole1Yardage = $HoleYardageArray[0];

//Get tee shot club
$ClubNum = 1;

//Get avg tee shot distance with club (e.g., 300 yds)
$avgDrive = mysqli_query($conn, "SELECT avg(ShotDistance) FROM Shots where ShotNum=1 and ClubNum='$ClubNum'") or die(mysqli_error());
$resAvgDrive = mysqli_fetch_array($avgDrive)[0];

//echo getDistance(45.99981, -82.93847, 45.99999, -82.93999)." yards";

$HoleNum=1;
//Pick point on fairway polyline that lies 300yds from tee box or closest to 300 yds.
$TargetLine = mysqli_query($conn, "SELECT AsText(FeatureValue) from HoleInfo where FeatureType = 'targetline' and CourseId = '$CourseId' and HoleNum = '$HoleNum'") or die(mysqli_error());
$TargetResult = mysqli_fetch_array($TargetLine)[0];
$polyline = geoPHP::load($TargetResult,'wkt');
$polyline_array = $polyline->getComponents();

$TeemarkerQuery = mysqli_query($conn, "SELECT AsText(FeatureValue) from HoleInfo where FeatureType = 'teemarker' and CourseId = '$CourseId' and HoleNum = '$HoleNum'") or die(mysqli_error());
$TeemarkerResult = mysqli_fetch_array($TeemarkerQuery)[0];
$teemarker = geoPHP::load($TeemarkerResult, 'wkt');

//initial conditions
$MinDistance = 9999;
$valueid = 0;
foreach ($polyline_array as $key=>$value) {
	$pt1 = new LatLng($value->y(),$value->x());
	$pt2 = new LatLng($teemarker->y(), $teemarker->x());
	$distance = SphericalGeometry::computeDistanceBetween($pt1, $pt2);
	$dDist = $resAvgDrive - $distance;

	if($dDist < $MinDistance) {
		$MinDistance = $dDist;
		$valueid = $key;
	}
}
//echo $MinDistance.",".$valueid.",".$resAvgDrive;

$TeeblockQuery = mysqli_query($conn, "SELECT AsText(FeatureValue) from HoleInfo where FeatureType = 'teeblock' and CourseId = '$CourseId' and HoleNum = '$HoleNum'") or die(mysqli_error());
$TeeblockResult = mysqli_fetch_array($TeeblockQuery)[0];
$teeblock = geoPHP::load($TeeblockResult, 'wkt');

//Get heading between tee shot location and pt from 3
$lon1 = $teemarker->x();
$lat1 = $teemarker->y();
$TargetLon = $polyline_array[$valueid]->x();
$TargetLat = $polyline_array[$valueid]->y();

$TargetPt = new LatLng($TargetLat, $TargetLon);
$TeemarkerPt = new LatLng($lat1, $lon1);

$heading = SphericalGeometry::computeHeading($TeemarkerPt, $TargetPt);

//Get L or R of target and distance with random number and probability model
$data = getShotOutcomeData($UserId, $ClubNum, $ShotFrom, $conn);
$outcome = getShotOutcome($data);

//Get perpendicular heading
if ($outcome['Direction'] == 'L') {
	$heading_perp = $heading + 90;
} else {
	$heading_perp = $heading - 90;
}

//echo json_encode($outcome);

//With 1st heading, get temp location without L or R offset
$Shot1temp = SphericalGeometry::computeOffset($TeemarkerPt, $resAvgDrive, $heading);

//Get generated shot location #1
$Shot1 = SphericalGeometry::computeOffset($Shot1temp, $outcome['Distance'], $heading_perp);
$Shot1Geo = latLngToGeo($Shot1);
//print_r($Shot1);

//Get ShotTo category
echo getShotLocationCategory(1,$Shot1Geo, $holeFeatures);

function latLngToGeo($LatLng) {
	$lat = $LatLng->getLat();
	$lng = $LatLng->getLng();
	$wkt = "POINT(".$lng." ".$lat.")";

	return geoPHP::load($wkt,'wkt');
}

function getShotLocationCategory($HoleNum, $ShotGeo, $holeFeatures) {
	foreach ($holeFeatures[$HoleNum-1]->fairway as $key=>$fairway) {
		if (SphericalGeometry::containsLocation($ShotGeo, $fairway)==true){
		  return "Is in fairway!";
		}
	}
	foreach ($holeFeatures[$HoleNum-1]->fairwaybunker as $key=>$fairwaybunker) {
		if (SphericalGeometry::containsLocation($ShotGeo, $fairwaybunker)==true){
		  return "Is in fairway bunker!";
		}
	}
	foreach ($holeFeatures[$HoleNum-1]->bunker as $key=>$bunker) {
		if (SphericalGeometry::containsLocation($ShotGeo, $bunker)==true){
		  return "Is in bunker!";
		}
	}
	if (SphericalGeometry::containsLocation($ShotGeo, $holeFeatures[$HoleNum-1]->green)==true){
		return "Is on green!";
	}
	return "Is not in fairway";
}

/*




Get distance to middle of green
Get club whose avg distance is closest to the hole distance
Get a heading between the shot location and the hole (middle of green for now)
Get perpendicular headings
With 1st heading, use 3 to get distance to edge of right green
With 2nd heading, use 3 to get distance to edge of left green
Get L or R of target with random number and probability model
Get avg distance off target when L or R
Get generated shot location #2


//Haversine formula. Return distance in yards
function getDistance($lat1, $lon1, $lat2, $lon2) {
	//Earth radius in yards
	$EarthRadius = 6371 * 1000 * 1.09361;
	
	$dLat = deg2rad($lat2 - $lat1);
	$dLon = deg2rad($lon2 - $lon1);
	
	$a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
	$c = 2 * asin(sqrt($a));
	$d = $EarthRadius * $c;
	
	return $d;
}
*/

//data includes Distance and Direction
function getShotOutcome($data) {
	$Rdist = 0;
	$Rcount = 0;
	$Ldist = 0;
	$Lcount = 0;
	foreach ($data as $key=>$value) {
	//print_r($value['Direction']);
		if ($value['Direction'] == 'L') {
			$Ldist += $value['Distance'];
			$Lcount += 1;
		} else {
			$Rdist += $value['Distance'];
			$Rcount += 1;
		}
	}
	$L_avg_dist = $Ldist / $Lcount;
	$R_avg_dist = $Rdist / $Rcount;
	
	$L_prob = $Lcount / count($data);
	$R_prob = $Rcount / count($data);

	$Rand = rand(0,100000)/100000;
	if ($Rand <= $L_prob) {
		$outcome = array("Direction"=>"L","Distance"=>$L_avg_dist);
		return $outcome;
	} else {
		$outcome = array("Direction"=>"R","Distance"=>$R_avg_dist);
		return $outcome;
	}
}

function getShotOutcomeData($UserId, $ClubNum, $ShotFrom, $conn) {
	$dataList = array();
	
	$ShotQuery = mysqli_query($conn, "SELECT YdsOffFairwayCenter, DirOffTarget FROM Shots a INNER JOIN Rounds b on a.RoundId = b.RoundId where b.UserId = '$UserId' and ShotFrom = '$ShotFrom' and ClubNum = '$ClubNum'") or die(mysqli_error());
	while($row = mysqli_fetch_array($ShotQuery)){
		$Direction = $row['DirOffTarget'];
		$Distance = $row['YdsOffFairwayCenter'];
		$data = array("Distance"=>$Distance, "Direction"=>$Direction);
		array_push($dataList, $data);
		
	}
	return $dataList;
}

//close connection
mysqli_close($conn);

?>