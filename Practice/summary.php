
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Brdy Golf - Short Game Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Nicholas Clark" >

    <!-- Le styles -->
    <link href="../Common/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/shortgame.css" rel="stylesheet"> 
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        background-color: #e6e6e6;
      }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner" style="background-image: linear-gradient(to bottom, #144f14, #0E370E);">
        <div class="container">
          <a class="brand" href="#">Short Game Test</a>
          <a href="/shortgame copy.html" ><button class="btn" id="newtest" style="float:right">+ New Test</button></a>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="testcard">
      <button class="btn btn-success">List View</button>
      		<select class="input-medium" id="shotType" style="float:right">
				<option value="Overall" selected="selected">Overall</option>
				<option value="Bunker">Bunker Shot</option>
				<option value="Chip">Chip Shot</option>
				<option value="Pitch">Pitch Shot</option>
				<option value="Wedge">Wedge Shot</option>
				<option value="LagPutting">Lag Putting</option>
				<option value="PuttingSkills">Putting Skills</option>       		
      		</select>	
      		<table class="table table-striped">
				    
				    <thead>
				    	<tr>
				    		<th>Date</th>
				    		<th>Score</th>
				    		<th>Handicap</th>
				   	 	</tr>
				    </thead>
				    <tbody id="summarycontents">
				    <?php include 'shortgame.php'; 

  				    ?>
				    </tbody>
				   
				  </table>
      	</div>
    </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
	 <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="js/shortgame.js"></script>
  </body>
</html>
