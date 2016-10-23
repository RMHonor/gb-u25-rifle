<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/php/historyContentLoader.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Great Britain U25 Rifle Team</title>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="description" content="Home of the Great Britain Under-25 Rifle Team. Team information, current news and team history.">
    <meta name="author" content="Richard Honor">
	
	<!-- OG fields -->
	<!-- TODO -->
	<meta property="og:image" content=""/>
	<meta property="og:url" content="http://www.gbu25rifleteam.co.uk"/>
	<meta property="og:site_name" content="Great Britain U25 Rifle Team"/>
	<meta property="og:description" content="Home of the Great Britain Under-25 Rifle Team. Team information, current news and team history."/>
	
	<!-- Bootstrap CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet" defer>
	<!-- Custom CSS -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' defer>
	<link href="/css/style.css" rel="stylesheet" type="text/css" defer>
	<link href="/css/news.css" rel="stylesheet" type="text/css" defer>
</head>
<body>
	
	<div class="container">
	
		<!-- Header -->
		<div class="header">
			<div class="title">
				<h1>Great Britain<br> Under 25<br> Rifle Team</h1>
			</div>
			<div class="header-img">
				<img src="/img/flag.jpg"/>
			</div>
		</div>
		
		<!-- Navbar -->
		<nav class="navbar">
			<div id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="/">Home</a></li>
					<li><a href="/team">Team</a></li>
					<li><a href="/news">News</a></li>
					<li class="active"><a href="/history">History</a></li>
				</ul>
			</div>
		</nav>
		
		<div class="content-holder">
			<h2>History</h2>
		</div>
		
		<div class="content-holder">
			<?php loadHistory(); ?>
		</div>
		
		<div class="footer content-holder">
			<div class="footer-txt">
				© 2016 Great Britain Under-25 Rifle Team<br>
				Site created by Honor Web Design
			</div>
			<div class="social-media">
				<a href="https://www.facebook.com/GBU25SA17"><img src="/img/facebook-icon.jpg"></a>
				<a href="https://twitter.com/gbu25_sa17"><img src="/img/twitter-icon.png"></a>
				<a href="https://www.instagram.com/gbu25rt_sa17"><img src="/img/insta-icon.png"></a>
			</div>
		</div>
	</div>
	
	<!-- Beta flag -->
	<div class="corner-ribbon">BETA</div>
	
</body>