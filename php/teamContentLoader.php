<?php

	include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");
	
	$conn = mysqli_connect($host, $username, $password, $database);
	
	global $members;
	
	$qry = "SELECT * FROM members";
	$qry = $conn->query($qry);
	if ($qry->num_rows > 0){
		$members = array();
		for ($i = 0; $i < $qry->num_rows; $i++){
			$row = $qry->fetch_assoc();
			$members[$i] = array();
			$members[$i]['name'] = $row['name'];
			$members[$i]['img']  = $row['img'];
			$members[$i]['title']= $row['title'];
			$members[$i]['bio']  = $row['bio'];
		}
	}
	
	
	function loadTeamTiles($members){		
		echo "<div class = \"row\">";
		for ($i = 0; $i < count($members); $i++){
			$member = $members[$i];
			echo "<div class=\"col-md-2 col-sm-3 col-xs-6 team-tile\">";
				echo "<div id=\"member-$i\">";
					echo "<div class=\"img\" style=\"background-image: url(" . urldecode($member['img']) . ")\"></div>";
					// echo "<img src=\"" . urldecode($member['img']) . "\">";
					echo urldecode($member['title']);
					echo "<div class=\"member-header\">";
						echo "<h3>" . urldecode($member['name']) . "</h3>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		}
		echo "</div>";
	}
	
	function loadTeamPopups($members){
		for ($i = 0; $i < count($members); $i++){
			echo "<div id=\"popup-$i\" class=\"modal\">";
				echo "<div class=\"modal-content\">";
					echo "<div class=\"row row-eq-height\">";
						$member = $members[$i];
						echo "<div class=\"col-sm-5\">";
							echo "<div class=\"img-holder\">";
								echo "<img class=\"center-block\" src=\"" . urldecode($member['img']) . "\">";
							echo "</div>";
						echo "</div>";
						echo "<div class=\"col-sm-7 bio\">";
							echo "<h2>" . urldecode($member['name']) . "</h3>";
							echo "<h3>" . urldecode($member['title']) . "</h4>";
							echo "<p>" . urldecode($member['bio']) . "</p>";
						echo "</div>";
					echo "</div>";
					echo "<span class=\"close\">Close</span>";
				echo "</div>";
			echo "</div>";
		}
	}
?>