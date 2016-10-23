<?php
	if (!isset(
			$_POST['welcome-sub'], 
			$_POST['captain-img'], 
			$_POST['welcome'], 
			$_POST['updates'], 
			$_POST['sponsorship']
	)){
		destroy(400, true);
	}
	
	
	include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");
	
	$conn = mysqli_connect($host, $username, $password, $database);
	
	if (!$conn){
		destroy(500, false);
	}
		
	update('welcome-heading', $_POST['welcome-sub']);
	update('captain-img', $_POST['captain-img']);
	update('welcome', $_POST['welcome']);
	update('home-updates', $_POST['updates']);
	update('sponsorship', $_POST['sponsorship']);
	
	
	function update($section, $newContent){
		global $conn;
		
		$qry = "UPDATE content SET content='$newContent' WHERE section='$section'";
		$qry = $conn->query($qry);
		if ($qry){
			destroy(200, false);
		} else {
			destroy(401, true);
		}
	}
	
	//kill script with http response code
	function destroy($code){
		http_response_code($code);
		exit();
	}
?>