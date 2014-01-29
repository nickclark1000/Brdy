<?php

	include '../Common/admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	
	$ShotFrom = $_POST['value'];

	$queryHoles = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 ";
	$queryGIR = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and a.ShotTo='green'";
	$query200plus = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and a.ShotTo='green' and DistanceToHole>=200";
	$query200plusTotal = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and DistanceToHole>=200";
	$query100plus = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and a.ShotTo='green' and DistanceToHole>=100";
	$query100plusTotal = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and DistanceToHole>=100";
	$query175200 = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and a.ShotTo='green' and DistanceToHole>=175 and DistanceToHole<200";
	$query175200Total = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and DistanceToHole>=175 and DistanceToHole<200";
	$query150175 = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and a.ShotTo='green' and DistanceToHole>=150 and DistanceToHole<175";
	$query150175Total = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and DistanceToHole>=150 and DistanceToHole<175";
	$query125150 = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and a.ShotTo='green' and DistanceToHole>=125 and DistanceToHole<150";
	$query125150Total = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and DistanceToHole>=125 and DistanceToHole<150";
	$queryless125 = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and a.ShotTo='green' and DistanceToHole<=125";
	$queryless125Total = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and DistanceToHole<=125";
	$query100125 = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and a.ShotTo='green' and DistanceToHole>=100 and DistanceToHole<125";
	$query100125Total = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and DistanceToHole>=100 and DistanceToHole<125";
	$queryless100 = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and a.ShotTo='green' and DistanceToHole<=100";
	$queryless100Total = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and DistanceToHole<=100";
	$query75100 = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and a.ShotTo='green' and DistanceToHole>=75 and DistanceToHole<100";
	$query75100Total = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and DistanceToHole>=75 and DistanceToHole<100";
	$queryless75 = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and a.ShotTo='green' and DistanceToHole<75";
	$queryless75Total = "SELECT count(*) FROM Shots a INNER JOIN Rounds b ON a.RoundId = b.RoundId INNER JOIN Holes c ON b.CourseId = c.CourseId where a.HoleNum = c.HoleNum and a.ShotNum = c.Par - 2 and DistanceToHole<75";
	
	// if $ShotFrom is 1 then we want all shots and the query does not need to be updated
	if ($ShotFrom != 1) {
		$queryHoles   	   .= " AND ShotFrom='$ShotFrom'";
		$queryGIR 	  	   .= " AND ShotFrom='$ShotFrom'";
		$query200plus 	   .= " AND ShotFrom='$ShotFrom'";
		$query200plusTotal .= " AND ShotFrom='$ShotFrom'";
		$query100plus	   .= " AND ShotFrom='$ShotFrom'";
		$query100plusTotal .= " AND ShotFrom='$ShotFrom'";
		$query175200	   .= " AND ShotFrom='$ShotFrom'";
		$query175200Total  .= " AND ShotFrom='$ShotFrom'";
		$query150175	   .= " AND ShotFrom='$ShotFrom'";
		$query150175Total  .= " AND ShotFrom='$ShotFrom'";
		$query125150       .= " AND ShotFrom='$ShotFrom'";
		$query125150Total  .= " AND ShotFrom='$ShotFrom'";
		$queryless125 	   .= " AND ShotFrom='$ShotFrom'";
		$queryless125Total .= " AND ShotFrom='$ShotFrom'";
		$query100125 	   .= " AND ShotFrom='$ShotFrom'";
		$query100125Total  .= " AND ShotFrom='$ShotFrom'";
		$queryless100	   .= " AND ShotFrom='$ShotFrom'";
		$queryless100Total .= " AND ShotFrom='$ShotFrom'";
		$query75100		   .= " AND ShotFrom='$ShotFrom'";
		$query75100Total   .= " AND ShotFrom='$ShotFrom'";
		$queryless75	   .= " AND ShotFrom='$ShotFrom'";
		$queryless75Total  .= " AND ShotFrom='$ShotFrom'";
	}
	
	$totalHoles = mysql_query($queryHoles);
	$resTotHoles = mysql_result($totalHoles,0);
	$totalGIR = mysql_query($queryGIR);
	$resTotGIR = mysql_result($totalGIR,0);
	
	$_200plus = mysql_query($query200plus);
	$res200plus = mysql_result($_200plus, 0);
	$_200plusTotal = mysql_query($query200plusTotal);
	$res200plusTotal = mysql_result($_200plusTotal, 0);

	$_100plus = mysql_query($query100plus);
	$res100plus = mysql_result($_100plus, 0);
	$_100plusTotal = mysql_query($query100plusTotal);
	$res100plusTotal = mysql_result($_100plusTotal, 0);
	
	$_175200 = mysql_query($query175200);
	$res175200 = mysql_result($_175200, 0);
	$_175200Total = mysql_query($query175200Total);
	$res175200Total = mysql_result($_175200Total, 0);
	
	$_150175 = mysql_query($query150175);
	$res150175 = mysql_result($_150175, 0);
	$_150175Total = mysql_query($query150175Total);
	$res150175Total = mysql_result($_150175Total, 0);
	
	$_125150 = mysql_query($query125150);
	$res125150 = mysql_result($_125150, 0);
	$_125150Total = mysql_query($query125150Total);
	$res125150Total = mysql_result($_125150Total, 0);
	
	$_less125 = mysql_query($queryless125);
	$resless125 = mysql_result($_less125, 0);
	$_less125Total = mysql_query($queryless125Total);
	$resless125Total = mysql_result($_less125Total, 0);
	
	$_100125 = mysql_query($query100125);
	$res100125 = mysql_result($_100125, 0);
	$_100125Total = mysql_query($query100125Total);
	$res100125Total = mysql_result($_100125Total, 0);
	
	$_less100 = mysql_query($queryless100);
	$resless100 = mysql_result($_less100, 0);
	$_less100Total = mysql_query($queryless100Total);
	$resless100Total = mysql_result($_less100Total, 0);
	
	$_75100 = mysql_query($query75100);
	$res75100 = mysql_result($_75100, 0);
	$_75100Total = mysql_query($query75100Total );
	$res75100Total = mysql_result($_75100Total, 0);
	
	$_less75 = mysql_query($queryless75);
	$resless75 = mysql_result($_less75, 0);
	$_less75Total = mysql_query($queryless75Total);
	$resless75Total = mysql_result($_less75Total, 0);
	
	echo "
	<h4># of holes: ".$resTotHoles."</h4>
	<h4>Greens hit in regulation: ".$resTotGIR."</h4>
	<h4>% GIR: ".round($resTotGIR/$resTotHoles*100,2)."%</h4>
	<div class='col-md-8'>
		<table class='table table-striped' style='border-bottom:1px solid #e6e6e6'>
			<thead>
				<tr>
					<th style='background-color:#428BCA; color:#ffffff'>Distance Range (yds)</th>
					<th style='background-color:#428BCA; color:#ffffff'>Greens Hit</th>
					<th style='background-color:#428BCA; color:#ffffff'># of Holes</th>					
					<th style='background-color:#428BCA; color:#ffffff'>% GIR</th>
				</tr>
			</thead>
			<tbody>
				<tr><td>200 plus</td><td>".$res200plus."</td><td>".$res200plusTotal."</td><td>".round($res200plus/$res200plusTotal*100, 2)."%</td></tr>
				<tr><td>175-200</td><td>".$res175200."</td><td>".$res175200Total."</td><td>".round($res175200/$res175200Total*100,2)."%</td></tr>
				<tr><td>150-175</td><td>".$res150175."</td><td>".$res150175Total."</td><td>".round($res150175/$res150175Total*100,2)."%</td></tr>
				<tr><td>125-150</td><td>".$res125150."</td><td>".$res125150Total."</td><td>".round($res125150/$res125150Total*100,2)."%</td></tr>
				<tr><td>less than 125</td><td>".$resless125."</td><td>".$resless125Total."</td><td>".round($resless125/$resless125Total*100,2)."%</td></tr>
				<tr><td>100-125</td><td>".$res100125."</td><td>".$res100125Total."</td><td>".round($res100125/$res100125Total*100, 2)."%</td></tr>
				<tr><td>100 plus</td><td>".$res100plus."</td><td>".$res100plusTotal."</td><td>".round($res100plus/$res100plusTotal*100, 2)."%</td></tr>
				<tr><td>less than 100</td><td>".$resless100."</td><td>".$resless100Total."</td><td>".round($resless100/$resless100Total*100, 2)."%</td></tr>
				<tr><td>75-100</td><td>".$res75100."</td><td>".$res75100Total."</td><td>".round($res75100/$res75100Total*100, 2)."%</td></tr>
				<tr><td>less than 75</td><td>".$resless75."</td><td>".$resless75Total."</td><td>".round($resless75/$resless75Total*100, 2)."%</td></tr>
			</tbody>
		</table>
	</div>
	";
	
	//close your connections
	mysql_close();
?>