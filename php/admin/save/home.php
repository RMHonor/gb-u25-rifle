<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '/php/admin/sessionCheck.php');

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
		
	update('welcome-heading', urldecode($_POST['welcome-sub']));
	update('captain-img', urldecode($_POST['captain-img']));
	update('welcome-content', urldecode($_POST['welcome']));
	update('home-updates', urldecode($_POST['updates']));
	update('sponsorship', urldecode($_POST['sponsorship']));
	
	
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