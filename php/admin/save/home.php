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
		
	update('welcome-heading', urlencode($_POST['welcome-sub']));
	update('captain-img', urlencode($_POST['captain-img']));
	update('welcome-content', urlencode($_POST['welcome']));
	update('home-updates', urlencode($_POST['updates']));
	update('sponsorship', urlencode($_POST['sponsorship']));
	
	
	function update($section, $newContent){
		global $conn;

		$qry = "UPDATE content SET content=\"$newContent\" WHERE section='$section'";
		$res = $qry;
		$qry = $conn->query($qry);
		if (!$qry){
			echo $res;
			echo mysqli_error($conn);
			destroy(400, true);
		}
	}
	
	//kill script with http response code
	function destroy($code){
		http_response_code($code);
		exit();
	}
?>