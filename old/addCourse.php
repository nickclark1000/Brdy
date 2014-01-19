<?php
include 'admininfo.php';

$name = $_GET['name'];
	
$conn = mysql_connect($dbhost,$username,$password);

if(!$conn) {
	die('Could not connect:' . mysql_error());
}
	
mysql_select_db('$database',$conn);
	
$query = sprintf("INSERT INTO GolfCourseInfo" .
			" (id, name) " .
			" VALUES (NULL, '%s');",
			mysql_real_escape_string($name);
	
$result = mysql_query($query);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}

?>

