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
				echo "<div class=\"member\" id=\"" . $row['id'] ."\">";
					echo "Index: <input class=\"pos\" type=\"number\" value=\"" . $i . "\"/>";
					echo "Name: <input class=\"name\" type=\"text\" value=\"" . urldecode($row['name']) . "\"/>";
					echo "Title: <input class=\"title\" type=\"text\" value=\"" . urldecode($row['title']) . "\"/>";
					echo "Image link: <input class=\"img\" type=\"text\" value=\"" . urldecode($row['img']) . "\"/>";
					echo "<span class=\"delete glyphicon glyphicon-remove\" aria-hidden=\"true\"></span><br>";
					echo "Bio: <textarea class=\"bio\">" . urldecode($row['bio']) . "</textarea>";
				echo "</div>";
			}
		}
	}
?>