<?php
	if (!isset($_POST['json'], $_POST['type'])){
		destroy(400, true);
	}

	include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");
	
	$conn = mysqli_connect($host, $username, $password, $database);
	
	if (!$conn){
		destroy(500, false);
	}
	
	$json = json_decode(utf8_encode($_POST['json']), true);
	if ($_POST['type'] == 'team'){
		$qry = "TRUNCATE TABLE members";
		$qry = $conn->query($qry);
		foreach($json as $result){
			echo $result['pos'];
			$qry = "INSERT INTO members "
				 . "VALUES("
					 . urlencode($result['pos']) . ",\""
					 . urlencode($result['name']) . "\",\"" 
					 . urlencode($result['title']) . "\",\""
					 . urlencode($result['img']) . "\",\"" 
					 . urlencode($result['bio'])
				 . "\")";
			$qry = $conn->query($qry);
		}
	//else add new
	} else {
		echo json_last_error_msg();
		$qry = "INSERT INTO members (name, title, img, bio) "
			 . "VALUES(\""
				 . urlencode($json[0]['name']) . "\",\"" 
				 . urlencode($json[0]['title']) . "\",\""
				 . urlencode($json[0]['img']) . "\",\"" 
				 . urlencode($json[0]['bio'])
			 . "\")";
		$qry = $conn->query($qry);
	}
	
	//kill script with http response code
	function destroy($code){
		http_response_code($code);
		exit();
	}
?>