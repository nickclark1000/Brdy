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
    <script src="http://popcornjs.org/code/dist/popcorn-complete.js"></script>

    <!-- Le styles -->
    <link href="../Common/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<!--     <link rel="stylesheet" href="mediaelementplayer.css" /> -->
    <link rel="stylesheet" href="video.css" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
             
  </head>
  <body>
     <!-- include header template -->
  <?php include("../Common/header.php"); ?>
  <div id='main' class='container' style="box-shadow: 0 -30px 30px -4px #999999;">
    <div style="margin-top:20px">
      <div class="row">
        <div class="col-sm-4">
          <h3 style="display:inline"><span class="glyphicon glyphicon-facetime-video"></span> VIDEOS</h3>
        </div>
        <div class="col-sm-4">
          <ul class="nav nav-pills">
            <li class="active"><a href="#" onclick="showPopular()">Popular</a></li>
            <li><a href="#" onclick="showUploads()">My Uploads</a></li>
            <li><a href="#">Library</a></li>
          </ul>
        </div>
        <div class="col-sm-4">
          <div class="input-group pull-right" style="width:300px">
            <input id="query" class="form-control" type="text" placeholder="Search...">
            <span class="input-group-btn">
              <button id="search-button" class='btn btn-default' disabled onclick="search('mainPage')">Search</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div id='video-list'>
      <div id='video-showcase'></div>
      <div id='search-list' style="display:none"></div>
      <div id="uploads-container" style="display:none"></div> 
    </div>
  </div>


    <!-- Le javascript -->
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script type="text/javascript" src="../Common/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/canvas.js"></script>
    <script src="js/video.js"></script>
    
    <script src="js/auth.js"></script>
    <script src="js/search.js"></script>
    <script src="js/uploads.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
  </body>
</html>
