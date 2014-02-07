<?php

	include '../Common/admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	
	$ShotFrom = $_POST['value'];

	$queryHoles = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and a.DistanceToHole >= 50";
	$queryAvgProximity = "SELECT avg(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and a.DistanceToHole >= 50";
	$query200plus = "SELECT avg(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=200";
	$query200plusTotal = "SELECT sum(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=200";
	$query200plusCount = "SELECT Count(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=200";
	$query100plus = "SELECT avg(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=100";
	$query100plusTotal = "SELECT sum(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=100";
	$query100plusCount = "SELECT Count(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=100";
	$query175200 = "SELECT avg(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=175 and DistanceToHole<200";
	$query175200Total = "SELECT sum(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=175 and DistanceToHole<200";
	$query175200Count = "SELECT Count(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=175 and DistanceToHole<200";
	$query150175 = "SELECT avg(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=150 and DistanceToHole<175";
	$query150175Total = "SELECT sum(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=150 and DistanceToHole<175";
	$query150175Count = "SELECT Count(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=150 and DistanceToHole<175";
	$query125150 = "SELECT avg(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=125 and DistanceToHole<150";
	$query125150Total = "SELECT sum(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=125 and DistanceToHole<150";
	$query125150Count = "SELECT Count(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=125 and DistanceToHole<150";
	$queryless125 = "SELECT avg(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole<=125 and DistanceToHole >= 50";
	$queryless125Total = "SELECT sum(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole<=125 and DistanceToHole >= 50";
	$queryless125Count = "SELECT Count(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole<=125 and DistanceToHole >= 50";
	$query100125 = "SELECT avg(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=100 and DistanceToHole<125";
	$query100125Total = "SELECT sum(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=100 and DistanceToHole<125";
	$query100125Count = "SELECT Count(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=100 and DistanceToHole<125";
	$queryless100 = "SELECT avg(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole<=100 and DistanceToHole >= 50";
	$queryless100Total = "SELECT sum(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole<=100 and DistanceToHole >= 50";
	$queryless100Count = "SELECT Count(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole<=100 and DistanceToHole >= 50";
	$query75100 = "SELECT avg(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=75 and DistanceToHole<100";
	$query75100Total = "SELECT sum(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=75 and DistanceToHole<100";
	$query75100Count = "SELECT Count(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole>=75 and DistanceToHole<100";
	$queryless75 = "SELECT avg(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole<75 and DistanceToHole >= 50";
	$queryless75Total = "SELECT sum(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole<75 and DistanceToHole >= 50";
	$queryless75Count = "SELECT Count(ProximityAfterShot) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ProximityAfterShot <= 30 and DistanceToHole<75 and DistanceToHole >= 50";
	
	// if $ShotFrom is 1 then we want all shots and the query does not need to be updated
	if ($ShotFrom != 1) {
		$queryHoles   	   .= " AND ShotFrom='$ShotFrom'";
		$queryAvgProximity 	  	   .= " AND ShotFrom='$ShotFrom'";
		$query200plus 	   .= " AND ShotFrom='$ShotFrom'";
		$query200plusTotal .= " AND ShotFrom='$ShotFrom'";
		$query200plusCount .= " AND ShotFrom='$ShotFrom'";
		$query100plus	   .= " AND ShotFrom='$ShotFrom'";
		$query100plusTotal .= " AND ShotFrom='$ShotFrom'";
		$query100plusCount .= " AND ShotFrom='$ShotFrom'";
		$query175200	   .= " AND ShotFrom='$ShotFrom'";
		$query175200Total  .= " AND ShotFrom='$ShotFrom'";
		$query175200Count  .= " AND ShotFrom='$ShotFrom'";
		$query150175	   .= " AND ShotFrom='$ShotFrom'";
		$query150175Total  .= " AND ShotFrom='$ShotFrom'";
		$query150175Count  .= " AND ShotFrom='$ShotFrom'";
		$query125150       .= " AND ShotFrom='$ShotFrom'";
		$query125150Total  .= " AND ShotFrom='$ShotFrom'";
		$query125150Count  .= " AND ShotFrom='$ShotFrom'";
		$queryless125 	   .= " AND ShotFrom='$ShotFrom'";
		$queryless125Total .= " AND ShotFrom='$ShotFrom'";
		$queryless125Count .= " AND ShotFrom='$ShotFrom'";
		$query100125 	   .= " AND ShotFrom='$ShotFrom'";
		$query100125Total  .= " AND ShotFrom='$ShotFrom'";
		$query100125Count  .= " AND ShotFrom='$ShotFrom'";
		$queryless100	   .= " AND ShotFrom='$ShotFrom'";
		$queryless100Total .= " AND ShotFrom='$ShotFrom'";
		$queryless100Count .= " AND ShotFrom='$ShotFrom'";
		$query75100		   .= " AND ShotFrom='$ShotFrom'";
		$query75100Total   .= " AND ShotFrom='$ShotFrom'";
		$query75100Count   .= " AND ShotFrom='$ShotFrom'";
		$queryless75	   .= " AND ShotFrom='$ShotFrom'";
		$queryless75Total  .= " AND ShotFrom='$ShotFrom'";
		$queryless75Count  .= " AND ShotFrom='$ShotFrom'";
	}
	
	$totalHoles = mysql_query($queryHoles);
	$resTotHoles = mysql_result($totalHoles,0);
	$avgProximity = mysql_query($queryAvgProximity);
	$resAvgProximity = mysql_result($avgProximity,0);
	
	$_200plus = mysql_query($query200plus);
	$res200plus = mysql_result($_200plus, 0);
	$_200plusTotal = mysql_query($query200plusTotal);
	$res200plusTotal = mysql_result($_200plusTotal, 0);
	$_200plusCount = mysql_query($query200plusCount);
	$res200plusCount = mysql_result($_200plusCount, 0);

	$_100plus = mysql_query($query100plus);
	$res100plus = mysql_result($_100plus, 0);
	$_100plusTotal = mysql_query($query100plusTotal);
	$res100plusTotal = mysql_result($_100plusTotal, 0);
	$_100plusCount = mysql_query($query100plusCount);
	$res100plusCount = mysql_result($_100plusCount, 0);
	
	$_175200 = mysql_query($query175200);
	$res175200 = mysql_result($_175200, 0);
	$_175200Total = mysql_query($query175200Total);
	$res175200Total = mysql_result($_175200Total, 0);
	$_175200Count = mysql_query($query175200Count);
	$res175200Count = mysql_result($_175200Count, 0);
	
	$_150175 = mysql_query($query150175);
	$res150175 = mysql_result($_150175, 0);
	$_150175Total = mysql_query($query150175Total);
	$res150175Total = mysql_result($_150175Total, 0);
	$_150175Count = mysql_query($query150175Count);
	$res150175Count = mysql_result($_150175Count, 0);
	
	$_125150 = mysql_query($query125150);
	$res125150 = mysql_result($_125150, 0);
	$_125150Total = mysql_query($query125150Total);
	$res125150Total = mysql_result($_125150Total, 0);
	$_125150Count = mysql_query($query125150Count);
	$res125150Count = mysql_result($_125150Count, 0);
	
	$_less125 = mysql_query($queryless125);
	$resless125 = mysql_result($_less125, 0);
	$_less125Total = mysql_query($queryless125Total);
	$resless125Total = mysql_result($_less125Total, 0);
	$_less125Count = mysql_query($queryless125Count);
	$resless125Count = mysql_result($_less125Count, 0);
	
	$_100125 = mysql_query($query100125);
	$res100125 = mysql_result($_100125, 0);
	$_100125Total = mysql_query($query100125Total);
	$res100125Total = mysql_result($_100125Total, 0);
	$_100125Count = mysql_query($query100125Count);
	$res100125Count = mysql_result($_100125Count, 0);
	
	$_less100 = mysql_query($queryless100);
	$resless100 = mysql_result($_less100, 0);
	$_less100Total = mysql_query($queryless100Total);
	$resless100Total = mysql_result($_less100Total, 0);
	$_less100Count = mysql_query($queryless100Count);
	$resless100Count = mysql_result($_less100Count, 0);
	
	$_75100 = mysql_query($query75100);
	$res75100 = mysql_result($_75100, 0);
	$_75100Total = mysql_query($query75100Total );
	$res75100Total = mysql_result($_75100Total, 0);
	$_75100Count = mysql_query($query75100Count );
	$res75100Count = mysql_result($_75100Count, 0);
	
	$_less75 = mysql_query($queryless75);
	$resless75 = mysql_result($_less75, 0);
	$_less75Total = mysql_query($queryless75Total);
	$resless75Total = mysql_result($_less75Total, 0);
	$_less75Count = mysql_query($queryless75Count);
	$resless75Count = mysql_result($_less75Count, 0);
	
	echo "
	<h4># of attempts: ".$resTotHoles."</h4>
	<h4>Average proximity to hole: ".round($resAvgProximity*3,2)."ft</h4>
	<div class='col-md-8'>
		<table class='table table-striped' style='border-bottom:1px solid #e6e6e6'>
			<thead>
				<tr>
					<th style='background-color:#428BCA; color:#ffffff'>Distance Range (yds)</th>
					<th style='background-color:#428BCA; color:#ffffff'>Avg Distance to Hole (ft)</th>
					<th style='background-color:#428BCA; color:#ffffff'>Total Distance (ft)</th>					
					<th style='background-color:#428BCA; color:#ffffff'># of Attempts</th>
				</tr>
			</thead>
			<tbody>
				<tr><td>200 plus</td><td>".round($res200plus*3,2)."</td><td>".round($res200plusTotal*3,2)."</td><td>".$res200plusCount."</td></tr>
				<tr><td>175-200</td><td>".round($res175200*3,2)."</td><td>".round($res175200Total*3,2)."</td><td>".$res175200Count."</td></tr>
				<tr><td>150-175</td><td>".round($res150175*3,2)."</td><td>".round($res150175Total*3,2)."</td><td>".$res150175Count."</td></tr>
				<tr><td>125-150</td><td>".round($res125150*3,2)."</td><td>".round($res125150Total*3,2)."</td><td>".$res125150Count."</td></tr>
				<tr><td>less than 125</td><td>".round($resless125*3,2)."</td><td>".round($resless125Total*3,2)."</td><td>".$resless125Count."</td></tr>
				<tr><td>100-125</td><td>".round($res100125*3,2)."</td><td>".round($res100125Total*3,2)."</td><td>".$res100125Count."</td></tr>
				<tr><td>100 plus</td><td>".round($res100plus*3,2)."</td><td>".round($res100plusTotal*3,2)."</td><td>".$res100plusCount."</td></tr>
				<tr><td>less than 100</td><td>".round($resless100*3,2)."</td><td>".round($resless100Total*3,2)."</td><td>".$resless100Count."</td></tr>
				<tr><td>75-100</td><td>".round($res75100*3,2)."</td><td>".round($res75100Total*3,2)."</td><td>".$res75100Count."</td></tr>
				<tr><td>less than 75</td><td>".round($resless75*3,2)."</td><td>".round($resless75Total*3,2)."</td><td>".$resless75Count."</td></tr>
			</tbody>
		</table>
	</div>
	";
	
	//close your connections
	mysql_close();
?>