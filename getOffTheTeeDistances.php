<?php

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);

//	will need to post the user id and return the appropriate data
//	$string = $_GET['datastring'];			  
//	$holenum = $_POST['dataString'];
  	$avgDrive = mysql_query("SELECT avg(ShotDistance) FROM Shots where ShotNum=1");
  	$resAvgDrive = mysql_result($avgDrive, 0);
  	$avgDrive1 = mysql_query("SELECT avg(ShotDistance) FROM Shots where ClubNum=1 and ShotNum=1");
  	$resAvgDrive1 = mysql_result($avgDrive1, 0);
  	$avgDrive2 = mysql_query("SELECT avg(ShotDistance) FROM Shots where ClubNum=2 and ShotNum=1");
  	$resAvgDrive2 = mysql_result($avgDrive2, 0);
  	$avgDrive3 = mysql_query("SELECT avg(ShotDistance) FROM Shots where ClubNum=3 and ShotNum=1");
  	$resAvgDrive3 = mysql_result($avgDrive3, 0);
  	$totalDrives = mysql_query("SELECT Count(*) FROM Shots where ShotNum=1");
	$resTotal = mysql_result($totalDrives, 0); 
	$_320plus = mysql_query("SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance>=320");
	$res320plus = mysql_result($_320plus, 0); 
	$_300320 = mysql_query("SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance<=320 and ShotDistance>=300");
	$res300320 = mysql_result($_300320, 0);
/*	$_300plus = mysql_query("SELECT Count(*) FROM Shots where ClubNum=1 and ShotDistance>=300");
	$res300plus = mysql_result($_300plus, 0); */
	$_280300 = mysql_query("SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance<=300 and ShotDistance>=280");
	$res280300 = mysql_result($_280300, 0);
	$_260280 = mysql_query("SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance<=280 and ShotDistance>=260");
	$res260280 = mysql_result($_260280, 0);
	$_240260 = mysql_query("SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance<=260 and ShotDistance>=240");
	$res240260 = mysql_result($_240260, 0);
	$less240 = mysql_query("SELECT Count(*) FROM Shots where ShotNum=1 and ShotDistance<=240");
	$resless240 = mysql_result($less240, 0);
	$top5drives = mysql_query("select ShotDistance from Shots order by ShotDistance DESC limit 5");
	$result_array = array();
	while($row = mysql_fetch_assoc($top5drives))
	{
    $result_array[] = $row['ShotDistance'];
	}

	echo "
	<h3>Off The Tee - Distance</h3>
	<hr>
	<h4 style='text-align:center'>Average Driving Distances</h4>
	<div style='padding-bottom:30px'>
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

var option={
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

$.plot($('#placeholder'),startData,option  );
	
	
});
</script>
	</div>
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
	mysql_close();
?>