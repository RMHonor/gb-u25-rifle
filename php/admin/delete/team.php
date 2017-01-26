<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '/php/admin/sessionCheck.php');

	$request_vars = array();
	if (!isset($_SERVER['REQUEST_METHOD']) && !($_SERVER['REQUEST_METHOD']) != 'DELETE'){
		destroy(400);
	} else {
		$data = json_decode(file_get_contents("php://input"), true);
		echo $data['id'];
		//if (!isset($request_vars['id'])){
			//destroy(401);
		//}
	}
	
	include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");
	
	$conn = mysqli_connect($host, $username, $password, $database);
	
	if (!$conn){
		destroy(500);
	}
	
	$qry = "DELETE FROM members WHERE id = " . $data['id'];
	$qry = $conn->query($qry);
	
	function destroy($code){
		http_response_code($code);
		exit();
	}
?>