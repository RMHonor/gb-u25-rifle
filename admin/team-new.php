<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '/php/admin/sessionCheck.php');
	include_once($_SERVER['DOCUMENT_ROOT'] . '/php/admin/content-filler/team.php');
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
	<script type="text/javascript" src="/js/admin/save/team.js" defer></script>
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
				<h2>Create new team member</h2>
				<p>
					Name: <input class="name" type="text"/>
					Title: <input class="title" type="text"/>
					Image link: <input class="img" type="text"/><br>
					Bio: <textarea class="editor" id="bio"></textarea></p>
				<button class="btn btn-primary" id="save-new">Create</button>
			</div>
		</div>
	</div>
</body>