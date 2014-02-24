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
	<!-- include header template -->
	<?php include("../Common/header.php"); ?>
	
	<div class="container">
		<div style="margin-top:20px">
			<h3 style="display:inline">ROUNDS</h3>
			<button class="btn btn-default pull-right" data-toggle="modal" data-target="#newRoundModal">New Round</button>
		</div>
		<hr>
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
		
    </div> <!-- /container -->
	<!-- Modal -->
	<div class="modal fade" id="newRoundModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">NEW ROUND</h4>
		  </div>
		  <div class="modal-body">
		    <div class="form-group">
				<label>Date</label>
				<input type="text" id="datepicker">
			</div>
			  <div class="form-group">
				<label>Course</label>
				<select id="courseSelect"></select>

		
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
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" id="newRoundBtn" class="btn btn-primary">Start Round</button>
		  </div>
		</div>
	  </div>
	</div>
	

 	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript" src="../Common/bootstrap/js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="js/newround.js"></script>
 </body>