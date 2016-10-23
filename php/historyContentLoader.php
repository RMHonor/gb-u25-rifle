<?php
	function loadHistory(){
		include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");
		
		$conn = mysqli_connect($host, $username, $password, $database);
		
		global $members;
		
		$qry = "SELECT content FROM content WHERE section = 'history'";
		$qry = $conn->query($qry);
		if ($qry->num_rows > 0){
			$row = $qry->fetch_assoc();
			echo $row['content'];
		}
	}
?>