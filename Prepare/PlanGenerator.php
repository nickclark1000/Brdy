<?php

include '../Common/admininfo.php';
include_once($_SERVER['DOCUMENT_ROOT'].'/geoPHP/geoPHP.inc');
include $_SERVER['DOCUMENT_ROOT'].'/spherical-geometry-php/spherical-geometry.class.php';

$CourseId = 1; //$_POST['courseId'];
$UserId = $_POST['userId'];

//Get hole lengths (e.g., 400 yds) into an array
$HoleDistance = mysqli_query($conn, "select Yardage from Holes where CourseId = '$CourseId'") or die(mysqli_error());
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

if (SphericalGeometry::containsLocation($teemarker, $teeblock)==true){
  echo "Is in polygon!";
}
else echo "Is not in polygon";

//Get heading between tee shot location and pt from 3
$lon1 = $teemarker->x();
$lat1 = $teemarker->y();
$TargetLon = $polyline_array[$valueid]->x();
$TargetLat = $polyline_array[$valueid]->y();

$TargetPt = new LatLng($TargetLat, $TargetLon);
$TeemarkerPt = new LatLng($lat1, $lon1);

$heading = SphericalGeometry::computeHeading($TeemarkerPt, $TargetPt);
echo "....".SphericalGeometry::computeDistanceBetween($TeemarkerPt, $TargetPt);

//Get perpendicular headings
$headingR90 = $heading + 90;
$headingL90 = $heading - 90;

//With 1st heading, use 3 to get distance to edge of right fairway



/*
With 2nd heading, use 3 to get distance to edge of left fairway
Get L or R of target with random number and probability model
Get avg distance off target when L or R
Get generated shot location #1
Get ShotFrom category
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
//close connection
mysqli_close($conn);

?>