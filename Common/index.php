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
	<link href="../Common/css/alertify.core.css" rel="stylesheet">
	<link href="../Common/css/alertify.default.css" rel="stylesheet">
    <style>
      body {
        padding-top: 40px; /* 60px to make the container go all the way to the bottom of the topbar */
    	background-image: url('img/jp-golfgreen1.jpg');
    	background-size: cover;
    	background-repeat: no-repeat;
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>
  
  	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Brdy</a>
        </div>
        <!--
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" action="checklogin.php" method="post">
            <div class="form-group">
              <input type="text" id="emailaddress" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" it="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Log In</button>
          </form>
        </div> -->
    </div>
    
	 <div class="pull-right">
    	<h1>Welcome to Brdy.</h1>
    </div>
    <div style="margin-left:130px; margin-top:150px; opacity:0.7; max-width:330px; background-color:#ffffff; padding:15px">
  		<form role="form" action="login.php" method="post">
            <div class="form-group">
              <input type="text" id="loginEmail" name="loginEmail" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" id="loginPassword" name="loginPassword" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success" style="display:inline">Log In</button>
          </form>
          <hr>
  		<form role="form" action="register.php" method="post">
            <div class="form-group">
              <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="form-control">
            </div>
            <div class="form-group">
              <input type="text" id="registerEmail" name="registerEmail" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" id="registerPassword" name="registerPassword" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign Up</button>
        </form>

    </div>
  
	 <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	 <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	 <script type="text/javascript" src="js/purl.js"></script>
	 <script type="text/javascript" src="js/alertify.js"></script>
	 <script>
	 	var url = $.url();
		var failed = url.param('failed');
		if(failed == 1) {
			alertify.alert("Login failed");
		}
	 </script>
	 
  </body>
</html>
