<?php header('Content-Type: text/xml');?>
<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<rss version="2.0">
	<channel>
	
		<title>IoT Temperature Monitor - Rss Feed</title>
		<link>www.softwaresunleashed.com</link>
		<description>Temperature Monitoring via IoT devices - RaspberryPi</description>
		<language>en-us</language>
		
		<?php 
		require_once('iotconnectvars.php');
		
		// Connect to the database
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
		// Retrieve the temperature data from cloud from MySQL
		$query = "SELECT * from billboard ORDER BY lastUpdated DESC";
		
		$data  = mysqli_query($dbc, $query);
		
		// Loop through the array of temperature collected, formatting it as RSS
		while($row = mysqli_fetch_array($data))	{
			// Display each row as RSS item
			echo '<item>';
			echo '<title>Temperature Monitor IoT</title>';
			echo '<link>http://www.softwaresunleashed.com/iot/temperature_records.php</link>';
			echo '<pubDate>' . $row[lastUpdated] . '</pubDate>';
			echo '<description>' . $row[temp] . '</description>';
			echo '</item>';
		}	
		?>
		
	</channel>
</rss>

