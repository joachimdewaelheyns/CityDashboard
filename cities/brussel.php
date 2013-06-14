<!-- CHECK IF SESSION EXISTS AND GET CITY -->
<?php
	session_set_cookie_params(0);
	session_start();
	
	if(isset($_SESSION['hasPos'])){
		//do nothing
	} else {
		header('Location: ../intro/index.php'); 
	}
	
	$city = $_SESSION['city'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <title>City Dashboard - <?php echo ucfirst($city);?></title>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="../js/packery.pkgd.min.js"></script>
        <script src="../js/draggabilly.pkgd.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&sensor=false"></script>
        <script src="../js/main.js"></script>
        <script src="../js/contentLoader.js"></script>
        <link type="text/css" rel="stylesheet" href="../css/reset.css">
		<link type="text/css" rel="stylesheet" href="../css/desktop.css" media="screen">
        <link type="text/css" rel="stylesheet" href="../css/mobile.css" media="screen and (max-width: 1100px)">
        <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Average+Sans|Titillium+Web|Anaheim|Noto+Serif">
		<script>
			latitude = <?php echo $_SESSION['latitude'];?>;
			longitude = <?php echo $_SESSION['longitude'];?>;
		</script>
	</head>
    <body>
    	<!-- PAGE HEADER -->
    	<header>
    		<span id="city"><?php echo strtoupper($city);?></span>
    		<div id="clock"></div>
    		<span id="date"><?php echo date("d/m/Y");?></span>
    		<span id="restart"><a href="../php/destroySession.php">restart</a></span>
    	</header>
		<div class="packery">
			<!-- WIDGETS -->
			<div class="item" id="weather" title="Weather info">
				<div class="title">
					<div class="title-text">Weather</div>
					<div class="fontawesome-umbrella"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer nocount">
					
				</div>
			</div>
			<div class="item double" id="forecast" title="Weather forecast">
				<div class="title">
					<div class="title-text">Six day weather forecast</div>
					<div class="typicons-lineChart"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer nocount">
					
				</div>
			</div>
			<div class="item" id="twitterTrends"  title="Twitter trends in this city">
				<div class="title">
					<div class="title-text">Twitter trends</div>
					<div class="brandico-twitter-bird"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer">
					<span id="trendsCountdown" class="timer"></span>
				</div>
			</div>
			<div class="item" id="map-canvas" title="City map"></div>
			<div class="item" id="news"  title="Latest news from this city">
				<div class="title">
					<div class="title-text">Latest news</div>
					<div class="entypo-rss"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer">
					<span id="newsCountdown" class="timer"></span>
				</div>
			</div>
			<div class="item" id="bus"  title="Schedule for nearest bus station">
				<div class="title">
					<div class="title-text">Bus schedule for nearest bus stop</div>
					<div class="maki-bus"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer">
					<span id="busCountdown" class="timer"></span>
				</div>
			</div>
			<div class="item" id="commentBox"  title="Write any comment here">
				<div class="title">
					<div class="title-text">Comment box</div>
					<div class="entypo-pencil"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
			</div>
			<div class="item" id="instagram"  title="Latest Instagram pictures near you">
				<div class="title">
					<div class="title-text">Latest Instagrams near you</div>
					<div class="brandico-instagram-filled"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer">
					<span id="instagramCountdown" class="timer"></span>
				</div>
			</div>
			<div class="item" id="trafficCams"  title="Random traffic cameras in this city">
				<div class="title">
					<div class="title-text">Random traffic cameras</div>
					<div class="fontawesome-road"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer">
					<span id="trafcamCountdown" class="timer"></span>
				</div>
			</div>
			<div class="item" id="wikipedia"  title="Interesting things near you">
				<div class="title">
					<div class="title-text">Interesting things near you</div>
					<div class="zocial-wikipedia"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
			</div>
			<div class="item" id="policeTweets"  title="Latest tweets from local police">
				<div class="title">
					<div class="title-text">Police tweets</div>
					<div class="brandico-twitter-bird"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer">
					<span id="poltweetsCountdown" class="timer"></span>
				</div>
			</div>
			<div class="item" id="events"  title="Upcoming events in this city">
				<div class="title">
					<div class="title-text">Upcoming events</div>
					<div class="fontawesome-calendar"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer nocount">
					
				</div>
			</div>
			<div class="item" id="delijnTweets"  title="Latest tweets from de lijn">
				<div class="title">
					<div class="title-text">De Lijn tweets</div>
					<div class="brandico-twitter-bird"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer">
					<span id="delijntweetsCountdown" class="timer"></span>
				</div>
			</div>
			<div class="item" id="foursquare"  title="Latest Foursquare check-ins near you">
				<div class="title">
					<div class="title-text">Latest Foursquare checkins</div>
					<div class="zocial-foursquare"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer">
					<span id="foursquareCountdown" class="timer"></span>
				</div>
			</div>
			<div class="item" id="latestTweets"  title="Latest tweets near you">
				<div class="title">
					<div class="title-text">Latest tweets near you</div>
					<div class="brandico-twitter-bird"></div>
				</div>
				<div class="content">
					<img src="../img/loader.gif" class="loader"></img>
				</div>
				<div class="footer">
					<span id="latesttweetsCountdown" class="timer"></span>
				</div>
			</div>
		</div>
		<footer>
			
		</footer>
	</body>
</html>