<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '/php/admin/sessionCheck.php');
	include_once($_SERVER['DOCUMENT_ROOT'] . '/php/admin/content-filler/home.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>GBU25RT Admin Centre</title>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="description" content="Admin control panel for Great Britain Under-25 Rifle Team.">
    <meta name="author" content="Richard Honor">
	
	<!-- OG fields -->
	<meta property="og:url" content="http://www.gbu25rifleteam.co.uk"/>
	<meta property="og:site_name" content="GBU25RT Admin Centre"/>
	<meta property="og:description" content="Admin control panel for Great Britain Under-25 Rifle Team."/>
	
	
	<!-- Bootstrap CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet" defer>
	<!-- Custom CSS -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' defer>
	<link href="/css/admin/style.css" rel="stylesheet" type="text/css" defer>
	
	<!-- jQuery -->
	<script type="text/javascript" src="/js/jquery-3.0.0.min.js" defer></script>
	<!-- TinyMCE WYSIWYG editor -->
	<script type="text/javascript" src="/js/tinymce/tinymce.min.js" defer></script>
	<!-- Misc. JS -->
	<script type="text/javascript" src="/js/admin/general.js" defer></script>
	<script type="text/javascript" src="/js/admin/save/home.js" defer></script>
</head>
<body>
	<div id="container-fluid">
		<div class="row">
			<div class="col-sm-2">
				<a href="#">Home</a>
				<a href="/admin/team">Team</a>
				<a href="/admin/news">News</a>
				<a href="/admin/history">History</a>
				<a href="/admin/misc">Misc.</a>
				<a href="/php/admin/logout.php">Logout</a>
			</div>
			<div class="col-sm-10">
				<h2>Home Control</h2>
				Welcome sub-heading: <input id="welcome-sub" type="text" value="<?php loadWelcomeHeading(); ?>"/><br>
				Captain image: <input id="captain-img" type="text" value="<?php loadCapImg(); ?>"/><br>
				Welcome message:<br>
				<textarea class="editor" id="welcome">
					<?php loadWelcome(); ?>
				</textarea>
				
				<h2>Quick Updates</h2>
				<textarea class="editor" id="updates">
					<?php loadUpdates(); ?>
				</textarea>
				
				<h2>Sponsorship Column</h2>
				<textarea class="editor" id="sponsorship">
					<?php loadSponsors(); ?>
				</textarea>
				
				<button class="btn btn-primary" id="save">Save</button>
			</div>
		</div>
	</div>
</body>