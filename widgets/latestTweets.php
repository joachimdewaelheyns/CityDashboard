
				<div class="content">
					<?php
						session_start();
						$lat = $_SESSION['latitude'];
						$long = $_SESSION['longitude'];
						
						$url = 'http://'. $_SERVER['HTTP_HOST'] .'/stage/data/twitter/tweets/tweets.php?lat=' . $lat . '&long=' . $long;
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						for ($i = 1; $i<6; $i++){
							$message = $arrayData['tweet' . $i]['message'];
							if(strlen($message)>40){
								echo '<div class="tweet" title="' . $message . '">' . substr($message,0,40) . '…</div>';
							} else {
								echo '<div class="tweet" title="' . $message . '">' . $message . '</div>';
							}
						}
					?>	
				</div>
