<?php

include '../Common/admininfo.php';

//	will need to post the user id and return the appropriate data
//	$string = $_GET['datastring'];			  
//	$holenum = $_POST['dataString'];
$avgDrive = mysqli_query($conn, "SELECT avg(ShotDistance) FROM Shots where ShotNum=1") or die(mysqli_error());
$resAvgDrive = mysqli_fetch_array($avgDrive)[0];
$avgDrive1 = mysqli_query($conn, "SELECT avg(ShotDistance) FROM Shots where ClubNum=1 and ShotNum=1") or die(mysqli_error());
$resAvgDrive1 = mysqli_fetch_array($avgDrive1)[0];
$avgDrive2 = mysqli_query($conn, "SELECT avg(ShotDistance) FROM Shots where ClubNum=2 and ShotNum=1") or die(mysqli_error());
$resAvgDrive2 = mysqli_fetch_array($avgDrive2)[0];
$avgDrive3 = mysqli_query($conn, "SELECT avg(ShotDistance) FROM Shots where ClubNum=3 and ShotNum=1") or die(mysqli_error());
$resAvgDrive3 = mysqli_fetch_array($avgDrive3)[0];
$totalDrives = mysqli_query($conn, "SELECT Count(*) FROM Shots where ShotNum=1") or die(mysqli_error());
$resTotal = mysqli_fetch_array($totalDrives)[0]; 
$_320plus = mysqli_query($conn, "SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance>=320") or die(mysqli_error());
$res320plus = mysqli_fetch_array($_320plus)[0]; 
$_300320 = mysqli_query($conn, "SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance<=320 and ShotDistance>=300") or die(mysqli_error());
$res300320 = mysqli_fetch_array($_300320)[0];
/*	$_300plus = mysqli_query($conn, "SELECT Count(*) FROM Shots where ClubNum=1 and ShotDistance>=300");
$res300plus = mysqli_fetch_array($_300plus); */
$_280300 = mysqli_query($conn, "SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance<=300 and ShotDistance>=280") or die(mysqli_error());
$res280300 = mysqli_fetch_array($_280300)[0];
$_260280 = mysqli_query($conn, "SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance<=280 and ShotDistance>=260") or die(mysqli_error());
$res260280 = mysqli_fetch_array($_260280)[0];
$_240260 = mysqli_query($conn, "SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance<=260 and ShotDistance>=240") or die(mysqli_error());
$res240260 = mysqli_fetch_array($_240260)[0];
$less240 = mysqli_query($conn, "SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance<=240") or die(mysqli_error());
$resless240 = mysqli_fetch_array($less240)[0];
$top5drives = mysqli_query($conn, "select ShotDistance from Shots where ShotNum=1 order by ShotDistance DESC limit 5") or die(mysqli_error());

$result_array = array();

while($row = mysqli_fetch_array($top5drives))
{
$result_array[] = $row['ShotDistance'];
}

echo "
<div id='placeholder' style='width:100%; height:250px;'>
	<script>
		$(function () {
			var d1 =[".$resAvgDrive1.", 2];
			var d2 =[".$resAvgDrive2.",1];
			var d3 =[".$resAvgDrive3.",0];

			var startData = [
				[d1],
				[d2],
				[d3]
			];

			var ticks = [
				[0, '3 Iron'], [1, '3 Wood'], [2, 'Driver']
			];

			var option = {
				series: {
					bars:{
						show: true,
						fill: true
					}
				},
				bars: {
					barWidth: 0.75,
					horizontal:true,
					align: 'center',
					lineWidth: 1
				},
				xaxis: {
					max: 350,
					axisLabel: 'Yards',
					tickColor: '#f6f6f6',
					color:'black'
				},
				yaxis: {
					ticks: ticks,
					axisLabelPadding: 10,
					tickColor: '#f6f6f6',
				},
			};

			$.plot($('#placeholder'),startData,option);
		});
	</script>
</div>

<div class='col-md-8'>
<!--	<h4>Total Drives: ".$resTotal."</h4> -->
<table class='table table-striped' style='border-bottom:1px solid #e6e6e6'>
	<thead>
		<tr>
			<th style='background-color:#428BCA; color:#ffffff'>Distance Range (yds)</th>
			<th style='background-color:#428BCA; color:#ffffff'>Drives</th>
			<th style='background-color:#428BCA; color:#ffffff'>% Drives</th>
		</tr>
	</thead>
	<tbody>
		<tr><td>320 plus</td><td>".$res320plus."</td><td>".round($res320plus/$resTotal*100, 2)."%</td></tr>
		<tr><td>300-320</td><td>".$res300320."</td><td>".round($res300320/$resTotal*100,2)."%</td></tr>
		<tr><td>280-300</td><td>".$res280300."</td><td>".round($res280300/$resTotal*100,2)."%</td></tr>
		<tr><td>260-280</td><td>".$res260280."</td><td>".round($res260280/$resTotal*100,2)."%</td></tr>
		<tr><td>240-260</td><td>".$res240260."</td><td>".round($res240260/$resTotal*100,2)."%</td></tr>
		<tr><td>less than 240</td><td>".$resless240."</td><td>".round($resless240/$resTotal*100, 2)."%</td></tr>
	</tbody>
</table>
</div>
<div class='col-md-4'>
<!--	<h4>Average Drive: ".round($resAvgDrive,2)."yds</h4> -->
<table class='table table-striped' style='border-bottom:1px solid #e6e6e6'>
	<thead>
		<tr>
			<th style='background-color:#428BCA; color:#ffffff'>Top 5 Drives</th>
			<th style='background-color:#428BCA; color:#ffffff'>Distance (yds)</th>
		</tr>
	</thead>
	<tbody>
		<tr><td>#1</td><td>".round($result_array[0],2)."</td></tr>
		<tr><td>#2</td><td>".round($result_array[1],2)."</td></tr>
		<tr><td>#3</td><td>".round($result_array[2],2)."</td></tr>
		<tr><td>#4</td><td>".round($result_array[3],2)."</td></tr>
		<tr><td>#5</td><td>".round($result_array[4],2)."</td></tr>			
	</tbody>
</table>
</div>

";

//close your connections
mysqli_close($conn);
?>