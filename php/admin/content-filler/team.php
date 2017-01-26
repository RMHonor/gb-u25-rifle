<?php 
	include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");

	$conn = mysqli_connect($host, $username, $password, $database);
	
	
	function loadTeam(){
		global $conn;
		
		$qry = "SELECT * FROM members ORDER BY id";
		$qry = $conn->query($qry);
		if ($qry->num_rows > 0){ 
			for ($i = 1; $i <= $qry->num_rows; $i++){
				$row = $qry->fetch_assoc();
				echo "<div class=\"member\" id=\"" . $row['id'] . "\">";
					echo "<strong>Name: </strong>" . urldecode($row['name']) . "  |  ";
					echo "<strong>Title: </strong>" . urldecode($row['title']);
					echo "<div class=\"action-holder\">";
						echo "<span class=\"delete glyphicon glyphicon-remove\" aria-hidden=\"true\"></span><br>";
						echo "<span class=\"edit glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span><br>";
					echo "</div>";
					echo "<br><strong>Bio:</strong> <br>" . urldecode($row['bio']);
				echo "</div>";
			}
		}
	}
?>