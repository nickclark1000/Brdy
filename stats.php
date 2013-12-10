<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Brdy Golf</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Nicholas Clark" >

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="css/brdyMap.css" rel="stylesheet">
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
     	<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/landingpage.html">Brdy</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="/addround.php">Play</a></li>
          </ul>
          <ul class="nav navbar-nav">
            <li ><a href="#">Stats</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
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
							<li><a href="#">Greens in Regulation</a></li>
							<li><a href="#">Accuracy from Fairway</a></li>
							<li><a href="#">Accuracy from Rough</a></li>
							<li><a href="#">Scoring</a></li>
							<li><a href="#">Going for It</a></li>
							<li><a href="#">Hole Outs</a></li>
						</ul>
					</div>
				<li><a href="#" data-toggle="collapse" data-target="#aroundthegreen">Around the Green</a></li>
					<div class="collapse" id="aroundthegreen">
						<ul>
							<li><a href="#">Up and Down</a></li>
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
							<li><a href="#">Overall</a></li>
							<li><a href="#">Under Par Scoring</a></li>
							<li><a href="#">Over Par Scoring</a></li>
							<li><a href="#">Scoring by Round</a></li>
							<li><a href="#">Par 3,4,5 Scoring</a></li>
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
			<div id="reportBody"></div>
			
		</div>
	 </div>


  

    <!-- Le javascript -->
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script type="text/javascript" src="js/accordion.js"> </script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/typeahead.js"></script>
		<script type="text/javascript" src="js/jquery.flot.js"></script>
		<script type="text/javascript" src="js/jquery.flot.axislabels.js"></script>
		<script type="text/javascript" src="js/shots.js"></script>
  </body>
</html>
