<?php

session_start();

if (!isset($_SESSION['userId'])) {
	header('location: http://localhost:8888/Brdy/Common/index.php?failed=1');
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Brdy Golf</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Nicholas Clark" >
		<link href="../Common/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="css/newround.css" rel="stylesheet">
		<link href="../Common/css/alertify.core.css" rel="stylesheet">
		<link href="../Common/css/alertify.default.css" rel="stylesheet">
		<link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
		
		<style>
			body {
				padding-top: 50px; /* 60px to make the container go all the way to the bottom of the topbar */
		  	}
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>                       
	</head>
	<body>
	<!-- include header template -->
	<?php include("../Common/header.php"); ?>
	
	<div class="container" style="box-shadow: 0 -30px 30px -4px #999999; max-width:730px">
<div style="margin-top:20px">
			<h3 style="display:inline">NICK CLARK</h3>
			<button class="btn btn-default pull-right" data-toggle="modal" data-target="#newRoundModal">New Round</button>
		</div>
		<hr>
		<div>Handicap</div>
		<div>Scoring average</div>
		<div>Club list</div>
		
		<table class='table table-striped' style='border-bottom:1px solid #e6e6e6'>
			<thead>
				<tr>
					<th style='background-color:#428BCA; color:#ffffff'>Date</th>
					<th style='background-color:#428BCA; color:#ffffff'>Course</th>					
				</tr>
			</thead>
			<tbody id="roundList">
			</tbody>
		</table>
	</div>
	

 	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript" src="../Common/bootstrap/js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="js/newround.js"></script>
 </body>