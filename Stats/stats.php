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

    <!-- Le styles -->
    <link href="../Common/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
	<!--<link href="css/brdyMap.css" rel="stylesheet"> -->
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
	
	<div style="height:100%">  	
		<div class="col-md-2 scrollable" style="height:100%">
			<ul class="nav nav-pills nav-stacked" >
				<li><a href="#" data-toggle="collapse" data-target="#offthetee">Off The Tee</a></li>
					<div class="collapse" id="offthetee">
						<ul>
							<li id="offTheTeeDistance"><a href="#">Distance</a></li>
							<li id="offTheTeeAccuracy"><a href="#">Accuracy</a></li>
						</ul>
					</div>
				<li><a href="#" data-toggle="collapse" data-target="#approachthegreen">Approach the Green</a></li>
					<div class="collapse" id="approachthegreen">
						<ul>
							<li><a id="approachGreenInReg" href="#">Greens in Regulation</a></li>
							<li><a id="select-approach-accuracy" href="#">Accuracy</a></li>
							<li><a href="#">Scoring</a></li>
							<li><a href="#">Going for It</a></li>
							<li><a href="#">Hole Outs</a></li>
						</ul>
					</div>
				<li><a href="#" data-toggle="collapse" data-target="#aroundthegreen">Around the Green</a></li>
					<div class="collapse" id="aroundthegreen">
						<ul>
							<li><a id="up-and-downs" href="#">Up and Down</a></li>
							<li><a href="#">Accuracy</a></li>
							<li><a href="#">Scoring</a></li>
						</ul>
					</div>
				<li><a href="#" data-toggle="collapse" data-target="#putting">Putting</a></li>
					<div class="collapse" id="putting">
						<ul>
							<li><a href="#">One-Putts</a></li>
							<li><a href="#">Three-Putts</a></li>
							<li><a href="#">All Putts Made</a></li>
							<li><a href="#">GIR Putts Made</a></li>
							<li><a href="#">Putts per Round</a></li>
							<li><a href="#">Putting Averages</a></li>
							<li><a href="#">Average Putting Distance</a></li>
						</ul>
					</div>
				<li><a href="#" data-toggle="collapse" data-target="#scoring">Scoring</a></li>
					<div class="collapse" id="scoring">
						<ul>
							<li><a href="">Overall</a></li>
							<li><a href="">Under Par Scoring</a></li>
							<li><a href="">Over Par Scoring</a></li>
							<li><a href="">Scoring by Round</a></li>
							<li><a href="">Par 3,4,5 Scoring</a></li>
							<li><a href="#">Front 9 Scoring</a></li>
							<li><a href="#">Back 9 Scoring</a></li>
							<li><a href="#">Early Scoring</a></li>
							<li><a href="#">Late Scoring</a></li>
							<li><a href="#">Scoring off the First Tee</a></li>
							<li><a href="#">Scoring off the 10th Tee</a></li>
							<li><a href="#">Efficiency Scoring</a></li>
						</ul>
					</div>
			</ul>
		</div>
		<div class="col-md-10" style="height:100%; border-left: 5px solid #e6e6e6">
			<div id="reportBody">
				<div id="tee-distance" style="display:none">
					<h3>OFF THE TEE</h3>
					<h4 style="color:#999999">DISTANCE</h4>
					<hr>
					<h4 style='text-align:center'>Average Driving Distances</h4>
					<div id="tee-distance-data" style="padding-bottom:30px"></div>
				</div>
				<div id="tee-accuracy" style="display:none">
					<h3>OFF THE TEE</h3>
					<h4 style="color:#999999">ACCURACY</h4>
					<hr>
					<div id="tee-accuracy-data"></div>
				</div>
				<div id="approach-the-green" style="display:none">
					<h3>APPROACH THE GREEN</h3>
					<h4 style='color:#999999'>GREENS IN REGULATION</h4>
					<hr>
					<span>Display: <select id="filter1"><option value="1">Distance Ranges</option><option value='2'>Clubs</option></select></span>
					<span>Shots from: <select id="filter2" autocomplete="off" onchange="GIRshotFromChange()"><option value="1" selected="selected">All shots</option><option value='fairway'>Fairway</option><option value='rough'>Rough</option><option value='fairwaybunker'>Fairway bunker</option><option value='teemarker'>Off the tee</option></select></span>
					<div id="approach-the-green-data"></div>
				</div> 
				<div id="approach-accuracy" style="display:none">
					<h3>APPROACH THE GREEN</h3>
					<h4 style='color:#999999'>ACCURACY</h4>
					<hr>
					<span>Display: <select id="accuracy-filter1"><option value="1">Distance Ranges</option><option value='2'>Clubs</option></select></span>
					<span>Shots from: <select id="accuracy-filter2" autocomplete="off" onchange="accuracyShotFromChange()"><option value="1" selected="selected">All shots</option><option value='fairway'>Fairway</option><option value='rough'>Rough</option><option value='fairwaybunker'>Fairway bunker</option><option value='teemarker'>Off the tee</option></select></span>
					<div id="approach-accuracy-data"></div>
				</div>
				<div id="scrambling" style="display:none">
					<div class="row">
						<div class="col-md-9">
							<h3>AROUND THE GREEN</h3>
							<h4 style='color:#999999'>UP & DOWNS</h4>
						</div>
					
						<div class="col-md-3">
							<div style="margin-top:20px">
								<label>From Date</label>
								<input type="text" id="fromDate">
								<label>To Date</label>
								<input type="text" id="toDate">
							</div>
						</div>
					</div>
					<hr>
					<div id="updown-placeholder" class='col-md-8' style="height:450px;"></div>
					<div class='col-md-4'>
						<table class='table table-striped' style='border-bottom:1px solid #e6e6e6'>
							<thead>
								<tr>
									<th style='background-color:#00703C; color:#ffffff'>Distance Range (yds)</th>
									<th style='background-color:#00703C; color:#ffffff'>Attempts</th>
								</tr>
							</thead>
							<tbody id="scrambling-data"></tbody>
						</table>
					</div>
				</div> 
			</div>
	 	</div>
	 </div>


  

    <!-- Le javascript -->
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script type="text/javascript" src="../Common/js/accordion.js"> </script>
		<script type="text/javascript" src="../Common/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../Common/js/typeahead.js"></script>
		<script type="text/javascript" src="js/jquery.flot.js"></script>
		<script type="text/javascript" src="js/jquery.flot.axislabels.js"></script>
		<script type="text/javascript" src="js/shots.js"></script>
  </body>
</html>
