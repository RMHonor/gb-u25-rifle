<?php

	session_start();
	
	if (isset($_SESSION['id'])){
		include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");
	
		$id = $_SESSION['id'];
		$conn = mysqli_connect($host, $username, $password, $database);
		
		if (!$conn){
			endSession();
		}
			
		$qry = "SELECT id FROM auth WHERE id = '$id'";
		$qry = $conn->query($qry);
		if ($qry->num_rows == 0){
			endSession();
		}
	} else {
		echo "test";
		endSession();
	}
	
	function endSession(){
		session_unset();
		session_destroy();
		header("Location: /admin/login");
	}
?>