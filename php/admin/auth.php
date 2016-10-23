<?php
	session_start();
	
	if (!isset($_POST['user'], $_POST['pass'])){
		destroy(400, true);
	} else {
		$local_user = $_POST['user'];
		$local_pass = md5($_POST['pass'] . "!");
	}
	
	
	include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");
	
	$conn = mysqli_connect($host, $username, $password, $database);
	
	if (!$conn){
		destroy(500, false);
	}
		
	$qry = "SELECT id FROM auth WHERE username = '$local_user' AND password = '$local_pass'";
	$qry = $conn->query($qry);
	if ($qry->num_rows > 0){
		$row = $qry->fetch_assoc();
		$_SESSION['id'] = $row['id'];
		destroy(200, false);
	} else {
		destroy(401, true);
	}
	
	//kill script with http response code and boolean to end session
	function destroy($code, $end){
		if ($end){
			session_unset();
			session_destroy();
		}
		http_response_code($code);
		exit();
	}
?>