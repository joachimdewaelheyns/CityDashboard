<?php
	require_once('../../php/dbconnect.php');
	
	header('Content-type: application/json');
	
						$COLLECTION = 'instagram';

						$latitude = $_GET['lat'];
						$longitude = $_GET['long'];

						$url = 'https://api.mongolab.com/api/1/databases/' . $DB . '/collections/' . $COLLECTION . '?q={"loc":{"$near":['. $latitude . ',' . $longitude . ']}}&l=3&apiKey=' . $MONGOLAB_API_KEY;


						$jsondata = file_get_contents($url);
						$array = json_decode($jsondata, true);
	
	$count = 1;
	foreach ($array as $pic) {
		$arrayOut['picture' . $count] = array(
			"loc" => $pic['loc'],
			"date" => date('F j H:i:s',$pic['created_at']->sec),
			"url" => $pic['url'],
			"caption" => $pic['caption']
		);
		$count++;
	}
	
	echo json_encode($arrayOut);
	
	
	
?>