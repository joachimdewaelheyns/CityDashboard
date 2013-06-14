<?php
	require_once('../../../php/dbconnect.php');
	
	header('Content-type: application/json');
	
						$COLLECTION = 'twitter';

						$latitude = $_GET['lat'];
						$longitude = $_GET['long'];

						$url = 'https://api.mongolab.com/api/1/databases/' . $DB . '/collections/' . $COLLECTION . '?q={"loc":{"$near":['. $latitude . ',' . $longitude . ']}}&l=10&apiKey=' . $MONGOLAB_API_KEY;


						$jsondata = file_get_contents($url);
						$array = json_decode($jsondata, true);

	
	$count = 1;
	foreach ($array as $tweet) {
		$arrayOut['tweet' . $count] = array(
			"loc" => $tweet['loc'],
			"date" => $tweet['date'],
			"message" => $tweet['message']
		);
		$count++;
	}
	
	echo json_encode($arrayOut);
?>