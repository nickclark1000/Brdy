<?php

include '../Common/admininfo.php';

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

//close connection
mysqli_close($conn);

?>