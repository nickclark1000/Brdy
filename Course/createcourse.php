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
		<style>
			body {
				height: 100%;
				padding-top: 50px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
			.content {
				top: 50px;
				bottom: 0px;
				position: absolute;
				left: 0;
				right: 0;
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
		
		<div class="container-fluid content">  	
			<div class="col-sm-5" style="padding:0px; height:100%; overflow: scroll"">
				<div class='navbar navbar-default' style="background-color:#f6f6f6; margin:0px">
					<form class="navbar-form navbar-left" role="search">
  						<div class="form-group">
    						<input type="text" class="form-control" placeholder="Search">
  						</div>
  						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
				<div class="list-group" id="names"></div>    	
			</div>  		
			<div class="col-sm-7" id="map_canvas" style="height:100%"></div>
		</div> 

		<!-- javascript -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&sensor=false&libraries=drawing,geometry,places"></script>
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script type="text/javascript" src="../Common/js/wicket.src.js"> </script>
		<script type="text/javascript" src="../Common/js/wicket.js"> </script>
		<script type="text/javascript" src="../Common/js/accordion.js"> </script>
		<script type="text/javascript" src="js/googlemaps.js"></script>
		<script type="text/javascript" src="js/getHoleInfo.js"></script>	
	</body>
</html>
