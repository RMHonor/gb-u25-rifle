<?php
	if (!isset($_POST['json'])){
		destroy(400, true);
	}
	
	include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");
	
	$conn = mysqli_connect($host, $username, $password, $database);
	
	if (!$conn){
		destroy(500, false);
	}
	
	$json = json_decode(utf8_encode($_POST['json']), true);
	if (sizeof($json) > 1){
		$qry = "TRUNCATE TABLE members";
		$qry = $conn->query($qry);
		foreach($json as $result){
			$qry = "INSERT INTO members "
				 . "VALUES("
					 . $result['pos'] . ",\""
					 . $result['name'] . "\",\"" 
					 . $result['title'] . "\",\""
					 . $result['img'] . "\",\"" 
					 . $result['bio']
				 . "\")";
			$qry = $conn->query($qry);
		}
	//else add new
	} else {
		echo json_last_error();
		$qry = "INSERT INTO members (name, title, img, bio) "
			 . "VALUES(\""
				 . $json[0]['name'] . "\",\"" 
				 . $json[0]['title'] . "\",\""
				 . $json[0]['img'] . "\",\"" 
				 . $json[0]['bio']
			 . "\")";
		$qry = $conn->query($qry);
	}
	
	//kill script with http response code
	function destroy($code){
		http_response_code($code);
		exit();
	}
?>