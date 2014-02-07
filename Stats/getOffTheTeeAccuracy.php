<?php

	include '../Common/admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	
//	$totalHoles = mysql_query("select count(DISTINCT c.HoleNum) from Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and (c.Par = 4 or c.Par = 5)");
//	$resTotHoles = mysql_query($totalHoles,0);

	$totalHoles = mysql_query("select count(*) from Shots where ShotNum=1");
	$resTotHoles = mysql_result($totalHoles,0);
	$totalFairways = mysql_query("SELECT Count(*) From Shots where ShotNum=1 and ShotTo='fairway'");
	$resTotFairway = mysql_result($totalFairways,0);
	$totalRough = mysql_query("SELECT Count(*) FROM Shots where ShotNum=1 and ShotTo='rough'");
	$resTotRough = mysql_result($totalRough,0);
//	$totalLeftRough = mysql_query("SELECT Count(*) FROM Shots a INNER JOIN (SELECT RoundId, HoleNum FROM Shots where ShotNum=2 and ShotFrom='rough') AS b where a.RoundId = b.RoundId and a.HoleNum = b.HoleNum and a.ShotNum=1 and a.DirOffTarget='L'");
	$totalLeftRough = mysql_query("SELECT Count(*) FROM Shots where ShotNum=1 and ShotTo='rough' and DirOffTarget='L'");
	$resLeftRough = mysql_result($totalLeftRough,0);
//	$totalRightRough = mysql_query("SELECT Count(*) FROM Shots a INNER JOIN (SELECT RoundId, HoleNum FROM Shots where ShotNum=2 and ShotFrom='rough') AS b where a.RoundId = b.RoundId and a.HoleNum = b.HoleNum and a.ShotNum=1 and a.DirOffTarget='R'");
	$totalRightRough = mysql_query("SELECT Count(*) FROM Shots where ShotNum=1 and ShotTo='rough' and DirOffTarget='R'");
	$resRightRough = mysql_result($totalRightRough,0);
	$edgeFairwayDist = mysql_query("SELECT avg(YdsOffFairway) FROM Shots where YdsOffFairway > 0");
	$resEdgeDist = mysql_result($edgeFairwayDist,0);
	$centerFairwayDist = mysql_query("SELECT avg(YdsOffFairwayCenter) FROM Shots where YdsOffFairwayCenter > 0");
	$resCenterDist = mysql_result($centerFairwayDist,0);


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
	mysql_close();
?>