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
		destroy(501);
	}
	if ($_POST['type'] == 'team'){
		$qry = "SELECT * FROM members";
		$qry = $conn->query($qry);
		$count = $qry->num_rows;
		$members = array();
		if ($count > 0){
			for ($i = 0; $i < $count; $i++){
				$row = $qry->fetch_assoc();
				$members[$i] = array();
				$members[$i]['pos'] = $row['pos'];
				$members[$i]['name'] = $row['name'];
				$members[$i]['img']  = $row['img'];
				$members[$i]['title']= $row['title'];
				$members[$i]['bio']  = $row['bio'];
			}
		}

		$qry = "TRUNCATE TABLE members";
		$qry = $conn->query($qry);
		insertMembers($json);

		//check that row count is still the same
		$qry = "SELECT id FROM members";
		$qry = $conn->query($qry);
		if ($qry->num_rows != $count){
			$qry = "TRUNCATE TABLE members";
			$qry = $conn->query($qry);
			insertMembers($members);
			destroy(501);
		}
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

	function insertMembers($members){
		global $conn;

		foreach($members as $result){
			$qry = "INSERT INTO members "
				 . "VALUES("
					 . urldecode($result['pos']) . ",\""
					 . urldecode($result['name']) . "\",\"" 
					 . urldecode($result['title']) . "\",\""
					 . urldecode($result['img']) . "\",\"" 
					 . urldecode($result['bio'])
				 . "\")";
			$qry = $conn->query($qry);
		}
	}
	
	//kill script with http response code
	function destroy($code){
		http_response_code($code);
		exit();
	}
?>