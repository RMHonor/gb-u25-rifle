<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '/php/admin/sessionCheck.php');
	
	if (!isset($_POST['json'], $_POST['type'])){
		destroy(400);
	}

	include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");
	
	$conn = mysqli_connect($host, $username, $password, $database);
	
	if (!$conn){
		destroy(500);
	}
	
	$json = json_decode(utf8_encode($_POST['json']), true);
	if (json_last_error() != 0){
		destroy(400);
	}
	if ($_POST['type'] == 'edit'){
		$qry = "UPDATE members SET " 
			. "name=\"" . urldecode($json[0]['name']) . "\", "
			. "title=\"" . urldecode($json[0]['title']) . "\", "
			. "img=\"" . urldecode($json[0]['img']) . "\", "
			. "bio=\"" . urldecode($json[0]['bio']) . "\" "
			. "WHERE id=" . $json[0]['id'];
		$qry = $conn->query($qry);
	//else add new
	} else {
		$qry = "INSERT INTO members (name, title, img, bio) "
			 . "VALUES(\""
				 . urldecode($json[0]['name']) . "\",\"" 
				 . urldecode($json[0]['title']) . "\",\""
				 . urldecode($json[0]['img']) . "\",\"" 
				 . urldecode($json[0]['bio'])
			 . "\")";
		$qry = $conn->query($qry);
	}
	
	//kill script with http response code
	function destroy($code){
		http_response_code($code);
		exit();
	}
?>