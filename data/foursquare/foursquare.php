<?php
	require_once('../../php/dbconnect.php');
	
	header('Content-type: application/json');
	
						$COLLECTION = 'foursquare';

						$latitude = $_GET['lat'];
						$longitude = $_GET['long'];

						$url = 'https://api.mongolab.com/api/1/databases/' . $DB . '/collections/' . $COLLECTION . '?q={"loc":{"$near":['. $latitude . ',' . $longitude . ']}}&l=20&apiKey=' . $MONGOLAB_API_KEY;


						$jsondata = file_get_contents($url);
						$array = json_decode($jsondata, true);
						
	
	$count = 1;
	foreach ($array as $checkin) {
		$arrayOut['checkin' . $count] = array(
			"place" => $checkin['name'],
			"loc" => $checkin['loc'],
			"checkinsCount" => $checkin['checkinsCount'],
			"usersCount" => $checkin['usersCount']
		);
		$count++;
	}
	
	echo json_encode($arrayOut);
	
	
	
?>
