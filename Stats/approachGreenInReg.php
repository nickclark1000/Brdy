<?php

	include '../Common/admininfo.php';
	
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
	
	$totalHoles = mysqli_query($conn, $queryHoles);
	$resTotHoles = mysqli_fetch_array($totalHoles)[0];
	$totalGIR = mysqli_query($conn, $queryGIR);
	$resTotGIR = mysqli_fetch_array($totalGIR)[0];
	
	$_200plus = mysqli_query($conn, $query200plus);
	$res200plus = mysqli_fetch_array($_200plus)[0];
	$_200plusTotal = mysqli_query($conn, $query200plusTotal);
	$res200plusTotal = mysqli_fetch_array($_200plusTotal)[0];

	$_100plus = mysqli_query($conn, $query100plus);
	$res100plus = mysqli_fetch_array($_100plus)[0];
	$_100plusTotal = mysqli_query($conn, $query100plusTotal);
	$res100plusTotal = mysqli_fetch_array($_100plusTotal)[0];
	
	$_175200 = mysqli_query($conn, $query175200);
	$res175200 = mysqli_fetch_array($_175200)[0];
	$_175200Total = mysqli_query($conn, $query175200Total);
	$res175200Total = mysqli_fetch_array($_175200Total)[0];
	
	$_150175 = mysqli_query($conn, $query150175);
	$res150175 = mysqli_fetch_array($_150175)[0];
	$_150175Total = mysqli_query($conn, $query150175Total);
	$res150175Total = mysqli_fetch_array($_150175Total)[0];
	
	$_125150 = mysqli_query($conn, $query125150);
	$res125150 = mysqli_fetch_array($_125150)[0];
	$_125150Total = mysqli_query($conn, $query125150Total);
	$res125150Total = mysqli_fetch_array($_125150Total)[0];
	
	$_less125 = mysqli_query($conn, $queryless125);
	$resless125 = mysqli_fetch_array($_less125)[0];
	$_less125Total = mysqli_query($conn, $queryless125Total);
	$resless125Total = mysqli_fetch_array($_less125Total)[0];
	
	$_100125 = mysqli_query($conn, $query100125);
	$res100125 = mysqli_fetch_array($_100125)[0];
	$_100125Total = mysqli_query($conn, $query100125Total);
	$res100125Total = mysqli_fetch_array($_100125Total)[0];
	
	$_less100 = mysqli_query($conn, $queryless100);
	$resless100 = mysqli_fetch_array($_less100)[0];
	$_less100Total = mysqli_query($conn, $queryless100Total);
	$resless100Total = mysqli_fetch_array($_less100Total)[0];
	
	$_75100 = mysqli_query($conn, $query75100);
	$res75100 = mysqli_fetch_array($_75100)[0];
	$_75100Total = mysqli_query($conn, $query75100Total );
	$res75100Total = mysqli_fetch_array($_75100Total)[0];
	
	$_less75 = mysqli_query($conn, $queryless75);
	$resless75 = mysqli_fetch_array($_less75)[0];
	$_less75Total = mysqli_query($conn, $queryless75Total);
	$resless75Total = mysqli_fetch_array($_less75Total)[0];
	
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
	mysqli_close($conn);
?>