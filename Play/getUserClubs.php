<?php

	include '../Common/admininfo.php';
	$conn = mysql_connect($dbhost,$username,$password);
	
	$registeredUserId = 1;

	$query = mysql_query("SELECT ClubId, ClubAbbr FROM `RegisteredUserClubs` where RegisteredUserId ='$registeredUserId'");
	
	echo "<option value=\"0\" disabled selected=\"selected\">Select club</option>";
	while($row = mysql_fetch_array($query)){
		$clubId = $row['ClubId'];
		$clubAbbr = $row['ClubAbbr'];
		echo "<option value=\"".$clubId."\">".$clubAbbr."</option>";
	}
	//close your connections
	mysql_close();
?> 