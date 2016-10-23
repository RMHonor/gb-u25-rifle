<?php 
	include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");

	$conn = mysqli_connect($host, $username, $password, $database);
	
	
	function loadUpdates(){
		global $conn;
		
		$qry = "SELECT content FROM content WHERE section = 'home-updates'";
		$qry = $conn->query($qry);
		if ($qry->num_rows > 0){ 
			$row = $qry->fetch_assoc();
			echo $row['content'];
		}
	}
	
	function loadSponsors(){
		global $conn;
		
		$qry = "SELECT content FROM content WHERE section = 'sponsor'";
		$qry = $conn->query($qry);
		if ($qry->num_rows > 0){ 
			$row = $qry->fetch_assoc();
			echo $row['content'];
		}
	}
	
	function loadWelcomeHeading(){
		global $conn;
		
		$qry = "SELECT content FROM content WHERE section = 'welcome-heading'";
		$qry = $conn->query($qry);
		if ($qry->num_rows > 0){ 
			$row = $qry->fetch_assoc();
			echo $row['content'];
		}
	}
		
	function loadWelcome(){
		global $conn;
		
		$qry = "SELECT content FROM content WHERE section = 'welcome-content'";
		$qry = $conn->query($qry);
		if ($qry->num_rows > 0){ 
			$row = $qry->fetch_assoc();
			echo "<p>" . $row['content'] . "</p>";
		}
	}
	
	function loadCapImg(){
		global $conn;
		
		$qry = "SELECT content FROM content WHERE section = 'captain-img'";
		$qry = $conn->query($qry);
		if ($qry->num_rows > 0){ 
			$row = $qry->fetch_assoc();
			echo $row['content'];
		}
	}
?>