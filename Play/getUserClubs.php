<?php

	include '../Common/admininfo.php';
	
	$registeredUserId = 1;

	$query = mysqli_query($conn, "SELECT ClubId, ClubAbbr FROM `RegisteredUserClubs` where RegisteredUserId ='$registeredUserId'");
	
	echo "<option value=\"0\" disabled selected=\"selected\">Select club</option>";
	while($row = mysqli_fetch_array($query)){
		$clubId = $row['ClubId'];
		$clubAbbr = $row['ClubAbbr'];
		echo "<option value=\"".$clubId."\">".$clubAbbr."</option>";
	}
	//close your connections
	mysqli_close($conn);
?> 