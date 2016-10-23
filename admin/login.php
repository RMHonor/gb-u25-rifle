<?php
	session_start();
	
	if (isset($_SESSION['id'])){
		header("Location: /admin");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login - GB Under 25 Rifle</title>
	
	<!-- jQuery -->
	<script type="text/javascript" src="/js/jquery-3.0.0.min.js" defer></script>
	<!-- Misc. JS -->
	<script type="text/javascript" src="/js/admin/login.js" defer></script>
	
	<!-- Bootstrap CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<!-- General CSS -->
	<link href="/css/admin/login.css" rel="stylesheet">
</head>
<body>
	<div>
		<h1>Admin Login</h1>
		<div id="status"></div>
		<noscript>The admin panel requires JavaScript to be enabled, please enable JavaScript or switch to a compatible browser</noscript>
		<form id="login" action="" method="post" style="display: none">
			<input type="text" name="user" placeholder="Username"/>
			<span><input type="password" name="pass" placeholder="Password"/>
			<button type="submit" class="btn btn-primary" disabled>Login</button>
		</form>
	</div>
</body>
<html>