
				<div class="content">
					<?php
						session_start();
						$lat = $_SESSION['latitude'];
						$long = $_SESSION['longitude'];
						
						$url = "http://". $_SERVER['HTTP_HOST'] ."/stage/data/foursquare/foursquare.php?lat=" . $lat . "&long=" . $long;
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						echo '<ul>';
						for ($i = 1; $i<9; $i++){
							$place = $arrayData['checkin' . $i]['place'];
							$count = $arrayData['checkin' . $i]['checkinsCount'];
							if(strlen($place)>18) {
								echo '<div class="checkin" title="' . $place . '">' . substr($place,0,18) . '…</div>';
							} else {
								echo '<div class="checkin" title="' . $place . '">' . $place . '</div>';
							}
							
						}
						echo '</ul>';
					?>	
				</div>
