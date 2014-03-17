<?php

session_start();

if (!isset($_SESSION['userId'])) {
	header('location: http://localhost:8888/Common/index.php?failed=1');
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
		<link href="css/play.css" rel="stylesheet">
		<link href="../Common/bootstrap/css/bootstrap-typeahead.css" rel="stylesheet">
		<link href="../Common/css/alertify.core.css" rel="stylesheet">
		<link href="../Common/css/alertify.default.css" rel="stylesheet">
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
		<div class="container-fluid">
			<div class="row" style="padding:10px 0px; margin:0px">
				<div class="col-xs-6" style="padding:0px">
					<div class="pull-right" style="padding-right:10px; border-right: 1px solid black">
						<h4>Brampton Golf Club</h4>
					</div>
				</div>
				<div class="col-xs-6" style="padding:0px">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner" style="padding-left:10px">
							<h5 style="margin:0px">Hole 1</h5>
							<p>Par 4 | 350 yds</p>
						</div>
						
						<a class="carousel-control" style="bottom:0;" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-down"></span></a>
						<a class="carousel-control" style="top:0; left:111px" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-up"></span></a>
					</div>					
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div id="content">
				<div id="map_canvas"></div>
			</div>
		</div>
		<div id="shotBar">
			<div id="noShots">
				<h3>No Shots Yet</h3>
			</div>
		</div>
		<!--	
			<div class="row" style="position: absolute; top:70px; left:40px; max-width:400px; width:90%; padding-right:10px;">
				<div class="input-group">
				  <input type="text" class="twitter-typeahead form-control" style="width:100%; box-shadow:0 2px 6px rgba(0,0,0,0.3),0 4px 15px -5px rgba(0,0,0,0.0);">
				  <span class="input-group-btn" style="box-shadow:0 2px 6px rgba(0,0,0,0.3),0 4px 15px -5px rgba(0,0,0,0.0);">
					<button class="btn btn-default" type="button" >Searchd</button>
				  </span>
				</div>
			</div>
			 -->
		

		<!-- Javascript -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&sensor=false&libraries=drawing,geometry"> </script>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script type="text/javascript" src="../Common/js/wicket.src.js"> </script>
		<script type="text/javascript" src="../Common/js/wicket.js"> </script>
		<script type="text/javascript" src="../Common/js/accordion.js"> </script>
		<script type="text/javascript" src="../Common/js/purl.js"> </script>
		<script type="text/javascript" src="js/infobox.js"></script>
		<script type="text/javascript" src="../Common/js/alertify.js"></script>
		<script type="text/javascript" src="js/addRound.js"></script>
		<script type="text/javascript" src="../Common/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../Common/js/typeahead.js"></script>
		<script type="text/javascript" src="../Common/js/courseTypeahead.js"></script>
	</body>
</html>
