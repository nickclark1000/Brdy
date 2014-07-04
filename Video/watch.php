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
    <link rel="stylesheet" href="video.css" />

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
             
  </head>
  <body onload='addVideo()'>
     <!-- include header template -->
  <?php include("../Common/header.php"); ?>
      <div > 
        <div id='video-container'>
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
          
          <div id="wrapper" class="col-sm-9 col-sm-offset-3" >
            <div id='controls' class='row' style="width:100%; border-bottom:1px solid #eee">
              <button style="border: 1px solid #666; border-radius: 0px; float:left; height:35px; width: 35px; background-color:#e6e6e6" id='draw-circle'><div style="border-radius: 50%; border:2px solid black; height:17px; width:22px; margin: 0px auto"></div></button>
              <button style="border: 1px solid #666; border-radius: 0px; float:left; height:35px; width: 35px; background-color:#e6e6e6;" id='draw-line'><div style="background-color:#000; height:24px; width:2px; margin: 0px auto; transform:rotate(45deg);-ms-transform:rotate(45deg); -webkit-transform:rotate(45deg);"></div></button>
              <button style="border: 1px solid #666; border-radius: 0px; float:left; height:35px; width: 35px; background-color:#e6e6e6; margin-right:10px" id='clear-all'><span class="glyphicon glyphicon-remove"></span></button>
              <button style="border: 1px solid #666; border-radius: 0px; float:left; height:35px; width: 35px; background-color:#e6e6e6; padding:5px;" id='color-red'><div style="background-color:#990000; height:24px; width:24px; border: 1px solid black"></div></button>
              <button style="border: 1px solid #666; border-radius: 0px; float:left; height:35px; width: 35px; background-color:#e6e6e6; padding:5px" id='color-green'><div style="background-color:#009900; height:24px; width:24px; border: 1px solid black"></div></button>
              <button style="border: 1px solid #666; border-radius: 0px; float:left; height:35px; width: 35px; background-color:#e6e6e6; padding:5px" id='color-blue'><div style="background-color:#000099; height:24px; width:24px; border: 1px solid black"></div></button>
              <button style="border: 1px solid #666; border-radius: 0px; float:left; height:35px; width: 35px; background-color:#e6e6e6; padding:5px" id='color-yellow'><div style="background-color:#999900; height:24px; width:24px; border: 1px solid black"></div></button>
              <button style="border: 1px solid #666; border-radius: 0px; float:left; height:35px; width: 35px; background-color:#e6e6e6; padding:5px; margin-right:10px" id='color-black'><div style="background-color:#000000; height:24px; width:24px; border: 1px solid black"></div></button>
              <button style="border: 1px solid #666; border-radius: 0px; float:left; height:35px; width: 35px; background-color:#e6e6e6;"><div style="background-color:#000; height:24px; width:2px; margin: 0px auto"></div></button>
              <button style="border: 1px solid #666; border-radius: 0px; float:left; height:35px; width: 35px; background-color:#e6e6e6;"><div style="background-color:#000; height:24px; width:4px; margin: 0px auto"></div></button>
              <button style="border: 1px solid #666; border-radius: 0px; float:left; height:35px; width: 35px; background-color:#e6e6e6;"><div style="background-color:#000; height:24px; width:6px; margin: 0px auto"></div></button>
              
              <button class='btn' id="authorize-button" style="visibility: hidden">Authorize</button>
              <!-- <button class='btn btn-default' id="add-video" data-toggle="modal" data-target="#newRoundModal">Add video</button>--> 
            </div>
            <div class="row">
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
