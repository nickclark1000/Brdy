<?php

//posts data about the hole tee markers

//  $id = $_GET["s"];  // the unique id for this summary

	include 'admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
					  
  $shottype = $_REQUEST['shotType'];
  
  session_start();
  
  if($shottype=='Overall' || $shottype=='') {
  		  $query = "SELECT UserId, TestId, Date, SUM(Total) sum_total FROM `ShortGameTestResults` WHERE `UserId` = '".$_SESSION['userid']."' group by TestId";
  		  
  		  $result = mysql_query($query);
  		  while($row = mysql_fetch_array($result)){
  		  	   $total = $row['sum_total'];
  		  	   $date = $row['Date'];
  		  	   if($total<80){
					$handicap = 0.4843*$total -42.593;  		  	   	
  		  	   	}
  		  	   	else {
  		  	   		$handicap = 0.1942*$total - 20.5;
  		  	   	}
  		  	   	if ($handicap > 0) {
					$handicap = "+".$handicap;		
				}
				else {
					$handicap = -1*$handicap;
				}
  		  
  		  echo "<tr><td>".$date."</td><td>".$total."</td><td>".$handicap."</td></tr>";}}
  	else{

  // get the info for this summary
  $query = "SELECT * FROM  `ShortGameTestResults` WHERE `TestCategory` LIKE '$shottype%' and `UserId` = '".$_SESSION['userid']."'";
  $result = mysql_query($query);
//  echo "shottype $shottype";
	

  
  while($row = mysql_fetch_array($result)){
  		$handicap = $row['Handicap'];
  		if ($handicap > 0) {
			$handicap = "+".$handicap;		
		}
		else {
			$handicap = -1*$handicap;}
  		
  echo "<tr><td>".$row['Date']."</td><td>".$row['Total']."</td><td>".$handicap."</td></tr>";}
//    echo "$shottype , $result";
  }
	//close your connections
	mysql_close();
?> 