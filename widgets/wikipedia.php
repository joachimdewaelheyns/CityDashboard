				<div class="content">
					<?php
						session_start();
						$lat = $_SESSION['latitude'];
						$long = $_SESSION['longitude'];
						
						require_once('../php/config.php');	
						$url = $SITE_PATH . 'data/wikipedia/wikipedia.php?lat=' . $lat . '&long=' . $long;
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
					?>
					<div id="places">
						<div id="place" title="Place">
							<div id="place-icon">
								<div style="height:20px">Name</div>
							</div>
							<div id="place-list">
								<?php
									for ($i = 1; $i<6; $i++){
										$title = $arrayData['wikiItem' . $i]['title'];
										if(strlen($title)>22){
											$title = substr($title,0,22).'…';
										}
										$link = $arrayData['wikiItem' . $i]['link'];
										echo '<a href="' . $link . '" title="' . $title . '">' . $title . '</a><br>';
									}
								?>
							</div>
						</div>
						<div id="dist" title="Distance from here">
							<div id="dist-icon">
								<div style="height:20px">Distance</div>
							</div>
							<div id="dist-list">
								<?php
									for ($i = 1; $i<6; $i++){
										$dist = $arrayData['wikiItem' . $i]['distance'];
										echo $dist . '<br>';
									}
								?>
							</div>
						</div>
						
					</div>
				</div>
