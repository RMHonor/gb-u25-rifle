<?php include($_SERVER['DOCUMENT_ROOT'] . "/php/teamContentLoader.php"); ?>

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
	<link href="/css/team.css" rel="stylesheet" type="text/css" defer>
	
	<!-- jQuery -->
	<script src="/js/jquery-3.0.0.min.js" defer></script>
	<script src="/js/modal-control.js" defer></script>
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
					<li class="active"><a>Team</a></li>
					<li><a href="/news">News</a></li>
					<li><a href="/history">History</a></li>
				</ul>
			</div>
		</nav>
		
		<div class="content-holder text-padding" style="margin-top: 10px;">
			<h2 style="margin-top: 5px;">Meet the Team</h2>
			<h4>The team is made up of 4 members and 2 non-travelling reserves. Click on a member for more information.</h4>
		</div>
		
		<?php loadTeamTiles($members); ?>
		
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
	
	<?php loadTeamPopups($members); ?>
	<!-- Beta flag -->
	<div class="corner-ribbon">BETA</div>
	
</body>