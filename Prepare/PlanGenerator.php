<?php

include '../Common/admininfo.php';

$CourseId = 1; //$_POST['courseId'];
$UserId = $_POST['userId'];

//Get hole lengths (e.g., 400 yds) into an array
$HoleDistance = mysqli_query($conn, "select Yardage from Holes where CourseId = '$CourseId'")or die(mysqli_error());
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

echo getDistance(45.99981, -82.93847, 45.99999, -82.93999)." yards";



/*
Pick point on fairway polyline that lies 300yds from tee box or closest to 300 yds.
Get heading between tee shot location and pt from 3
Get perpendicular headings
With 1st heading, use 3 to get distance to edge of right fairway
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


//Define distance ranges	
$distRanges = array(0,10,20,30,40,50,60,70,80,90,100);
$UpDownAttempts = array();
$UpDownSuccesses = array();

for($i=0; $i < count($distRanges)-1; $i++) {
	$j = $i + 1;
	$successes = mysqli_query($conn, "select count(*) from Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.DistanceToHole <= ".$distRanges[$j]." and a.DistanceToHole > ".$distRanges[$i]." and a.ShotFrom != 'green' and (a.ShotNum = (SELECT MAX(ShotNum) FROM Shots e where e.RoundId = a.RoundId and e.HoleNum = a.HoleNum) OR a.ShotNum + 1 = (SELECT MAX(ShotNum) FROM Shots e where e.RoundId = a.RoundId and e.HoleNum = a.HoleNum))") or die(mysqli_error($conn));
	$UpDownSuccesses[$distRanges[$i]."-".$distRanges[$j]] = mysqli_fetch_array($successes)[0];
	$attempts = mysqli_query($conn, "select count(*) from Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.DistanceToHole <= ".$distRanges[$j]." and a.DistanceToHole > ".$distRanges[$i]." and a.ShotFrom != 'green'") or die(mysqli_error($conn));
	$UpDownAttempts[$distRanges[$i]."-".$distRanges[$j]] = mysqli_fetch_array($attempts)[0];
}

$UpDown = array("Attempts"=>$UpDownAttempts,"Successes"=>$UpDownSuccesses);
echo json_encode($UpDown);
*/

//Haversine formula. Return distance in yards
function getDistance($lat1, $lng1, $lat2, $lng2) {
	//Earth radius in yards
	$EarthRadius = 6371 * 1000 * 1.09361;
	
	$dLat = deg2rad($lat2 - $lat1);
	$dLng = deg2rad($lng2 - $lng1);
	
	$a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLng/2) * sin($dLng/2);
	$c = 2 * asin(sqrt($a));
	$d = $EarthRadius * $c;
	
	return $d;
}

//close connection
mysqli_close($conn);

?>