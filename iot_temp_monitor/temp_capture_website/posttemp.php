<?php


	// URL to add temperature to database
	// http://localhost:8888/iot/posttemp.php?tempvalue=88
	// http://www.softwaresunleashed.com/iot/posttemp.php?tempvalue=88         <-- live server url
  $temperature = $_GET['tempvalue'];

  // Connect to the database
  require_once('iotconnectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error Connecting to database. Check Credentials.');

  // Query to get the results
  $query = "INSERT INTO `billboard` (`_id`, `temp`) VALUES (NULL, '$temperature')";
  $result = mysqli_query($dbc, $query) or die('Error Executing Query on Database.');
  
  mysqli_close($dbc) or die('Error Closing Database.');
?>
