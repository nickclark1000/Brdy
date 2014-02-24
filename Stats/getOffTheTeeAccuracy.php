<?php

	include '../Common/admininfo.php';
	
//	$totalHoles = mysqli_query($conn, "select count(DISTINCT c.HoleNum) from Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and (c.Par = 4 or c.Par = 5)");
//	$resTotHoles = mysqli_query($totalHoles)[0];

	$totalHoles = mysqli_query($conn, "select count(*) from Shots where ShotNum=1") or die(mysqli_error());
	$resTotHoles = mysqli_fetch_array($totalHoles)[0];
	$totalFairways = mysqli_query($conn, "SELECT Count(*) From Shots where ShotNum=1 and ShotTo='fairway'") or die(mysqli_error());
	$resTotFairway = mysqli_fetch_array($totalFairways)[0];
	$totalRough = mysqli_query($conn, "SELECT Count(*) FROM Shots where ShotNum=1 and ShotTo='rough'") or die(mysqli_error());
	$resTotRough = mysqli_fetch_array($totalRough)[0];
//	$totalLeftRough = mysqli_query($conn, "SELECT Count(*) FROM Shots a INNER JOIN (SELECT RoundId, HoleNum FROM Shots where ShotNum=2 and ShotFrom='rough') AS b where a.RoundId = b.RoundId and a.HoleNum = b.HoleNum and a.ShotNum=1 and a.DirOffTarget='L'");
	$totalLeftRough = mysqli_query($conn, "SELECT Count(*) FROM Shots where ShotNum=1 and ShotTo='rough' and DirOffTarget='L'") or die(mysqli_error());
	$resLeftRough = mysqli_fetch_array($totalLeftRough)[0];
//	$totalRightRough = mysqli_query($conn, "SELECT Count(*) FROM Shots a INNER JOIN (SELECT RoundId, HoleNum FROM Shots where ShotNum=2 and ShotFrom='rough') AS b where a.RoundId = b.RoundId and a.HoleNum = b.HoleNum and a.ShotNum=1 and a.DirOffTarget='R'");
	$totalRightRough = mysqli_query($conn, "SELECT Count(*) FROM Shots where ShotNum=1 and ShotTo='rough' and DirOffTarget='R'") or die(mysqli_error());
	$resRightRough = mysqli_fetch_array($totalRightRough)[0];
	$edgeFairwayDist = mysqli_query($conn, "SELECT avg(YdsOffFairway) FROM Shots where YdsOffFairway > 0") or die(mysqli_error());
	$resEdgeDist = mysqli_fetch_array($edgeFairwayDist)[0];
	$centerFairwayDist = mysqli_query($conn, "SELECT avg(YdsOffFairwayCenter) FROM Shots where YdsOffFairwayCenter > 0") or die(mysqli_error());
	$resCenterDist = mysqli_fetch_array($centerFairwayDist)[0];


	echo "
	<h4>Tee Shots: ".$resTotHoles."</h4>
	<h4>Fairways Hit: ".$resTotFairway."</h4>
	<h4>Driving Accuracy: ".round($resTotFairway/$resTotHoles*100,2)."%</h4>
	<h4>Rough: ".$resTotRough."</h4>
	<h4>Rough Tendency: ".round($resTotRough/$resTotHoles*100,2)."%</h4>
	<h4>Left Rough: ".$resLeftRough."</h4>
	<h4>Left Rough Tendency: ".round($resLeftRough/$resTotHoles*100,2)."%</h4>
	<h4>Right Rough: ".$resRightRough."</h4>
	<h4>Right Rough Tendency: ".round($resRightRough/$resTotHoles*100,0)."%</h4>
	<h4>Average Distance from Edge of Fairway: ".round($resEdgeDist,2)."</h4>
	<h4>Average Distance from Center of Fairway: ".round($resCenterDist,0)."</h4>
	";
	
	//close your connections
	mysqli_close($conn);
?>