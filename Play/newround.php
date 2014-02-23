<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Brdy Golf</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Nicholas Clark" >
		<link href="../Common/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="../Common/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<link href="../Common/bootstrap/css/bootstrap-typeahead.css" rel="stylesheet">
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
<!--	
    	<!-- Fixed navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		  
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="../landingpage.html">Brdy</a>
			</div>
			<div class="navbar-collapse collapse">
			  <ul class="nav navbar-nav">
				<li ><a href="../Play/roundList.php">Play</a></li>
			  </ul>
			  <ul class="nav navbar-nav">
				<li ><a href="../Stats/stats.php">Stats</a></li>
			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
-->
	<div class="container">
		<h3>NEW ROUND</h3>
		<hr>

		<div class="form-group">
			<label>Date</label>
			<input type="text" id="datepicker">
		</div>
		  <div class="form-group">
			<label>Course</label>
			<select id="courseSelect"></select>

			<div id="map_canvas"></div>
    	  </div>
		 <label>Tournament round?</label>
		 <div>
		  <div class="radio-inline">
			  <label>
				<input type="radio" name="optionsRadios" id="optionsRadios1" value="1">
				Yes
			  </label>
			</div>
			<div class="radio-inline">
			  <label>
				<input type="radio" name="optionsRadios" id="optionsRadios2" value="0" checked>
				No
			  </label>
			</div>
			</div>
			<br style="clear:all">
			
		  <button id="newRoundBtn" class="btn btn-default">Submit</button>

      


    </div> <!-- /container -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&sensor=false&libraries=drawing,geometry"> </script>

 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript" src="../Common/bootstrap/js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="js/newround.js"></script>
  </body>