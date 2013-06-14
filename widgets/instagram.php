
				<div class="content">
					<?php
						session_start();
						$lat = $_SESSION['latitude'];
						$long = $_SESSION['longitude'];
						
						$url = 'http://'. $_SERVER['HTTP_HOST'] .'/stage/data/instagram/instagram.php?lat=' . $lat . '&long=' . $long;
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						for ($i = 1; $i<3; $i++){
							$picture = $arrayData['picture' . $i]['url'];
							$date = $arrayData['picture' . $i]['date'];
							if (@GetImageSize($picture)) {
								$picture = $arrayData['picture' . $i]['url'];
							} else {
								$picture = "../img/instaOffline.png";
							}
							echo '<img class="insta" src="' . $picture . '" title="' . $date . '"></img>';
							
						}
						
					?>	
				</div>
