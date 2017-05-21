<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Raspberry Pi Temperature Monitor</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  
  <h3>Temperature Monitor via Raspberry Pi IoT</h3>

<?php

  // Start generating the table of results
  echo '<table border="0" cellpadding="2">';

  // Generate the search result headings
  echo '<tr class="heading">';
  echo '<td>S.No.</td><td>Date-Time</td><td>Temperature</td>';
  echo '</tr>';

  // Connect to the database
  require_once('iotconnectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Error Connecting to database. Check Credentials.');

  // Query to get the results
  $query = "SELECT * FROM billboard ORDER BY lastUpdated DESC";
  $result = mysqli_query($dbc, $query) or die('Error Executing Query on Database.');
  while ($row = mysqli_fetch_array($result)) {
    echo '<tr class="results">';
    echo '<td valign="top" width="20%">' . $row['_id'] . '</td>';
    echo '<td valign="top" width="20%">' . $row['lastUpdated'] . '</td>';
    echo '<td valign="top" width="50%">' . $row['temp'] . '</td>';
    echo '</tr>';
  } 
  echo '</table>';

  mysqli_close($dbc) or die('Error Closing Database.');
?>

</body>
</html>
