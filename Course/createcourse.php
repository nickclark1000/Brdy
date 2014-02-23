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
				padding-top: 50px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
		</style>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>                       
	</head>
    <!-- adding a course via info window form -->
	<form class="courseform" action="addCoursesSloan.php" method="post" style="display:none">
		<h4>Course Details</h4>
		<div style="width:300px">		
			<span style="margin-right:9px;">Course Name:</span>		
	    	<input type="text" name="inputName" value="">
	    	<br>
	    	<span style="margin-right:9px;">Yardage:</span>
	    	<input type="text" name="inputYardage" value="">
	    	<br>
	    	<input type="submit" value="Submit" class="btn">
		</div>
	</form>
	<!-- adding a course polygon feature via info window form -->
	<form class="polygonform" action="addPolygonFeature.php" method="post" style="display:none">
		<h4>Polygon Feature Details</h4>
		<span style="margin-right:9px;">Hole #</span>
		<select name="holeNum">
  			<option value="1">1</option>
  			<option value="2">2</option>
  			<option value="3">3</option>
  			<option value="4">4</option>
  			<option value="5">5</option>
  			<option value="6">6</option>
  			<option value="7">7</option>
  			<option value="8">8</option>
  			<option value="9">9</option>
  			<option value="10">10</option>
  			<option value="11">11</option>
  			<option value="12">12</option>
  			<option value="13">13</option>
  			<option value="14">14</option>
  			<option value="15">15</option>
  			<option value="16">16</option>
  			<option value="17">17</option>
  			<option value="18">18</option>
		</select>
		<br>
		<span>Feature:</span>
    	<select name="polygonType">
  			<option value="fairway">Fairway</option>
  			<option value="teeblock">Tee Block</option>
  			<option value="green">Green</option>
  			<option value="bunker">Bunker</option>
  			<option value="fairwaybunker">Fairway Bunker</option>
		</select>
		<br>
		<div style="height:40px">
    		<input type="hidden" name="polygonValue" id="polygonValue" value=""> 
    		<input type="submit" class="btn btn-primary" value="Submit">
  		</div>
	</form>
	<!-- adding a course polygon feature via info window form -->
	<form class="polylineform" action="addPolylineFeature.php" method="post" style="display:none">
		<h4>Polyline Feature Details</h4>
		<span style="margin-right:9px;">Hole #</span>
		<select name="holeNum">
  			<option value="1">1</option>
  			<option value="2">2</option>
  			<option value="3">3</option>
  			<option value="4">4</option>
  			<option value="5">5</option>
  			<option value="6">6</option>
  			<option value="7">7</option>
  			<option value="8">8</option>
  			<option value="9">9</option>
  			<option value="10">10</option>
  			<option value="11">11</option>
  			<option value="12">12</option>
  			<option value="13">13</option>
  			<option value="14">14</option>
  			<option value="15">15</option>
  			<option value="16">16</option>
  			<option value="17">17</option>
  			<option value="18">18</option>
		</select>
		<br>
		<span>Feature:</span>
    	<select name="polylineType">
  			<option value="targetline">Target line</option>
		</select>
		<br>
		<div style="height:40px">
    		<input type="hidden" name="polylineValue" id="polylineValue" value=""> 
    		<input type="submit" class="btn btn-primary" value="Submit">
  		</div>
	</form>
	<!-- adding a course point feature via info window form -->
	<form class="pointform" action="addPointFeature.php" method="post" style="display:none">
		<h4>Point Feature Details</h4>
		<span style="margin-right:9px;">Hole #</span>
		<select name="holeNum">
  			<option value="1">1</option>
  			<option value="2">2</option>
  			<option value="3">3</option>
  			<option value="4">4</option>
  			<option value="5">5</option>
  			<option value="6">6</option>
  			<option value="7">7</option>
  			<option value="8">8</option>
  			<option value="9">9</option>
  			<option value="10">10</option>
  			<option value="11">11</option>
  			<option value="12">12</option>
  			<option value="13">13</option>
  			<option value="14">14</option>
  			<option value="15">15</option>
  			<option value="16">16</option>
  			<option value="17">17</option>
  			<option value="18">18</option>
		</select>
		<br>
		<span>Feature:</span>
		<select name="pointType">
  			<option value="teemarker">Tee Marker</option>
  			<option value="pinlocation">Pin Location</option>
		</select>
		<br>
		<span>Sub Feature:</span>
    	<select name="pointSubType">
  			<option value="teemarkerblack">Black (M)</option>
  			<option value="teemarkerblue">Blue (M)</option>
  			<option value="teemarkerwhite">White (M/F)</option>
  			<option value="teemarkerred">Red (F)</option>
  			<option value="teemarkeryellow">Yellow (F)</option>
  			<option value="pin1">Position 1</option>
  			<option value="pin2">Position 2</option>
  			<option value="pin3">Position 3</option>
  			<option value="pin4">Position 4</option>
  			<option value="pin5">Position 5</option>
		</select>
		<br>
		<div style="height:40px">
    		<input type="hidden" name="pointValue" id="pointValue" value=""> 
    		<input type="submit" class="btn btn-primary" value="Submit">
  		</div>
	</form>
	
	<body>
		<!-- include header template -->
		<?php include("../Common/header.php"); ?>
		
		<div style="height:100%">  	
			<div class="col-md-3 scrollable" style="height:100%">
				<h3>Create Course</h3>
				<hr>
				<p>
					<label for="courseSelect">Course:
						<select name="courseSelect" id="courseSelect">
							<option>Brampton</option>
						</select>
					</label>
				</p>
				<p>
					<button class="btn btn-primary btn-lg btn-block" id="polygonBtn">+ Polygon Feature</button>
				</p>
				<p>
					<button class="btn btn-primary btn-lg btn-block" id="pointBtn">+ Point Feature</button>
				</p>
					<button class="btn btn-primary btn-lg btn-block" id="polylineBtn">+ Polyline</button>
				<hr>
				<label for="CourseHoleNum">Hole:
					<select name="CourseHoleNum" id="CourseHoleNum">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
					</select>
				</label>
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th style="background-color:#0066ff; color:#ffffff">Attributes</th>
						</tr>
					</thead>
					<tbody id="holeAttributes"></tbody>
				</table>
				<div id="names"></div>     	
			</div>  		
			<div class="col-md-9" id="map_canvas" style="height:700px"></div>
		</div> 

		<!-- javascript -->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMEWbu-DxkBYqkZa-gNuaLPPoAm0CEHCM&sensor=false&libraries=drawing"> </script>
		<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script type="text/javascript" src="../Common/js/wicket.src.js"> </script>
		<script type="text/javascript" src="../Common/js/wicket.js"> </script>
		<script type="text/javascript" src="../Common/js/accordion.js"> </script>
		<script type="text/javascript" src="js/googlemaps.js"></script>
		<script type="text/javascript" src="js/getHoleInfo.js"></script>	
	</body>
</html>
