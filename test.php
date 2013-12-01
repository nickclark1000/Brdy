<?php

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
    
    $roughHoles = array();
    
	$query = "SELECT RoundId, HoleNum, ShotNum FROM Shots where ShotNum=2 and ShotFrom='rough'";
  	
	$result = mysql_query($query);

	while($row = mysql_fetch_array($result, MYSQL_BOTH)){
		printf( "ID: %s Hole: %s <br>", $row['RoundId'], $row['HoleNum']);	
	}

	//close your connections
	mysql_close();
?> 