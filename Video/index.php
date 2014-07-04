<!DOCTYPE html>
<html>
<head>
	<title>SMRZr</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- 	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/smrzr.css" rel="stylesheet"> -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
</head>

<!-- Feedback Tab -->
<style type='text/css'>@import url('http://getbarometer.s3.amazonaws.com/assets/barometer/css/barometer.css');</style>
<script src='http://getbarometer.s3.amazonaws.com/assets/barometer/javascripts/barometer.js' type='text/javascript'></script>
<script type="text/javascript" charset="utf-8">
  BAROMETER.load('O5y3Z1LYDK5K2da1cEhqT');
</script>
<!-- /Feedback Tab -->

<body>
<div class="container-narrow">
	<div class="masthead">
		<h4 class="muted hidden-phone" id="catchline">Summarize and share YouTube videos</h4>
		<a href="http://smrzr.com">
        	<!-- <img src="img/logo.png" alt="smrzr logo"> -->
        	<span id="smrzrLogo">SMRZ<span id="smrzrLogoR">r</span></span>
        	<span id="smrzrLogoBeta">beta</span>
        </a>
	</div>
	<hr>
	<div id="page1">
		<div >
			<form id="mainForm">
				<input type="text" placeholder="Enter video URL" id="urlinputbox">
				<button type="submit" id="go" class="btn btn-warning">Start SMRZing</button>
			</form>
		</div>
		<div class="row-fluid" id="tips">
			<ul class="thumbnails">
				<li class="span4">
					<div class="thumbnail">
						<img src="img/videoicon.png" alt="Watch It">
						<h3>Watch it.</h3>
						<p>Pick any YouTube video.</p>
					</div>
				</li>
				<li class="span4">
					<div class="thumbnail">
						<img src="img/smrz.png" alt="Summarize it">
						<h3>Summarize it.</h3>
						<p>Choose your favourite parts of the video with SMRZr.</p>
					</div>
				</li>
				<li class="span4">
					<div class="thumbnail">
						<img src="img/share.png" alt="Share it">
						<h3>Share it.</h3>
						<p>Quickly share your SMRZd video with all your friends!</p>
					</div>
				</li>
			</ul>
		</div>

		<h3>Recent SMRZ'd Videos</h3>
		<div id="recentVideos"></div>

		<h3>Popular SMRZ'd Videos</h3>
		<div id="popularVideos"></div>

		<h3>Get the SMRZr Bookmarklet</h3>
		<div id="bookmarklet">
			<a class="btn btn-large btn-info" type="button"href="javascript:(function(){document.body.appendChild(document.createElement('script')).src='http://smrzr.com/smrzrbmk.js';})();">
				SMRZ This!
			</a>
			<p>Activate the bookmarklet on any YouTube video page to instantly SMRZ that video and share it with your friends!</p>
			<p>Installation Instructions: 
				<ul>
					<li>Chrome or Safari: Drag the link to your bookmarks bar.</li>
					<li>Firefox: Right click and "Bookmark This Link", or drag to bookmarks bar.</li>
					<li>Internet Explorer: Right click and "Add to favourites...", or drag to bookmarks bar.</li>
				</ul>
			</p>
			<p>When you are on the YouTube page of a video you want to SMRZ, just click the bookmark.</p>
		</div>
	</div>


	<div id="page2">
		<!-- this div gets replaced with the YouTube iframe embedded player -->
		<div id="videoWrapper">
		<div id="ytplayer"></div>
		</div>
		<div id="controls" style="width:100%">
			<button id="snap" class="btn btn-success">Start a Clip...</button>
			<button id="cancel" class="btn btn-warning">Cancel</button>
			<button id="done" class="btn btn-primary">Done</button>
		</div>
		<ul id="clips"></ul>
	</div>

	<hr>
	<div class="footer">
		<p>&copy; SMRZr 2013</p>
	</div>
</div>
</body>

<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="index.js"></script>
</html>
