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
    
      <!-- <div class='col-sm-3 sidebar' style='padding:0px'>
        <div id="content"></div>
        <div id='btn-container' class='btn-group btn-group-justified' style='padding:10px; background-color:#e6e6e6'>
          <a class='btn btn-default' onclick="showSearch()">Search</a>
          <a class='btn btn-default' onclick="showUploads()">Uploads</a>
          <a class='btn btn-default' onclick="showLibrary()">Library</a>
        </div>
        <div id='tabs'>
          <div id='search-tab'>
            <div style="background-color:#e6e6e6; padding: 0px 10px 10px 10px; width:100%">
              <div class="input-group">
                <input id="query" class="form-control" type="text" placeholder="Search...">
                <span class="input-group-btn">
                  <button id="search-button" class='btn btn-default' disabled onclick="search()">Search</button>
                </span>
              </div>
            </div>        
            <div id="search-container"></div>
          </div>

          <div id='uploads-tab' style='display:none'>
            <div id="uploads-container"></div> 
          </div>

          <div id='library-tab' style='display:none'>
            <div id="library-container"></div> 
          </div>
        </div>
      </div> -->
      </div>
      <div >
        <button class='btn' id="authorize-button" style="visibility: hidden">Authorize</button>
        
        <div id='video-container' style="display:none">
          <div class='col-sm-3 sidebar' style='padding:0px'>
            <div id='btn-container' class='btn-group btn-group-justified' style='padding:10px; background-color:#e6e6e6'>
              <a class='btn btn-default' onclick="showSearch()">Search</a>
              <a class='btn btn-default' onclick="showUploads()">Uploads</a>
              <a class='btn btn-default' onclick="showLibrary()">Library</a>
            </div>
            <div id='tabs'>
              <div id='search-tab'>
                <div style="background-color:#e6e6e6; padding: 0px 10px 10px 10px; width:100%">
                  <div class="input-group">
                    <input id="query" class="form-control" type="text" placeholder="Search...">
                    <span class="input-group-btn">
                      <button id="search-button" class='btn btn-default' disabled onclick="search()">Search</button>
                    </span>
                  </div>
                </div>        
                <div id="search-container"></div>
              </div>

              <div id='uploads-tab' style='display:none'>
                <div id="uploads-container"></div> 
              </div>

              <div id='library-tab' style='display:none'>
                <div id="library-container"></div> 
              </div>
            </div>
          </div> 
          <div id='controls' style="text-align: center">
            <button class='btn' id='draw-line'>Line</button>
            <button class='btn' id='draw-circle'>Circle</button>
            <div class="dropdown" style="display:inline">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                Color
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" id='color-red'>Red</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" id='color-black'>Black</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" id='color-blue'>Blue</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" id='color-yellow'>Yellow</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" id='color-green'>Green</a></li>
              </ul>
            </div>
            <button class='btn' id='clear-all'>Clear</button>
            <!-- <button class='btn btn-default' id="add-video" data-toggle="modal" data-target="#newRoundModal">Add video</button>
 -->
            <div id="wrapper" class="row" style="text-align: center; margin: 0px;">
              <canvas id="canvasTemp" width=100 height=100></canvas>
              <canvas id="canvas" width=100 height=100></canvas>
              <div id='another-wrapper' style="display: inline-block;">
                <div id="video-wrapper-grp" style="display: inline-block; margin: 0 auto;"></div>
              </div>
            </div>      
          </div>
        </div>
        <!-- <div class="modal fade" id="newRoundModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">COMPARE VIDEOS</h4>
              </div>
              <div class="modal-body">
                
                <div id='btn-container' class='btn-group btn-group-justified' style='padding:10px; background-color:#e6e6e6'>
                  <a class='btn btn-default' onclick="showSearch()">Search</a>
                  <a class='btn btn-default' onclick="showUploads()">Uploads</a>
                  <a class='btn btn-default' onclick="showLibrary()">Library</a>
                </div>
                <div id='tabs'>
                  <div id='search-tab'>
                    <div style="background-color:#e6e6e6; padding: 0px 10px 10px 10px; width:100%">
                      <div class="input-group">
                        <input id="modal-query" class="form-control" type="text" placeholder="Search...">
                        <span class="input-group-btn">
                          <button id="search-button" class='btn btn-default'  onclick="search()">Search</button>
                        </span>
                      </div>
                    </div>        
                    <div id="search-container-modal"></div>
                  </div>

                  <div id='uploads-tab' style='display:none'>
                    <div id="uploads-container"></div> 
                  </div>

                  <div id='library-tab' style='display:none'>
                    <div id="library-container"></div> 
                  </div>
                </div>
              </div>
            
              <br style="clear:all">
            </div>
            
          </div>
        </div> -->
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
