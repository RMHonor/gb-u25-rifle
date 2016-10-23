<?php

	include_once($_SERVER['DOCUMENT_ROOT'] . "/../conf/dbauth.php");
	
	global $conn;
	
	$conn = mysqli_connect($host, $username, $password, $database);
	
	$id = 0;
	
	if (isset($_GET['id'])){
		$id = $_GET['id'];
		loadArticle($id);
	}
	
	function getCount(){
		global $count, $conn, $page;
		
		$count = "SELECT COUNT(id) AS count FROM articles";
		$qry = $conn->query($count);	
		$count = max(1, ceil(bcdiv($qry->fetch_assoc()['count'], 5, 1)));
			
		if (isset($_GET['p']) && ($_GET['p'] > 0) && ($_GET['p'] <= $count)){
			$page = $_GET['p'];
		} else {
			$page = 1;
		}
	}
	
	function pageControl(){
		
		global $count, $page;
		
		getCount();
		
		//prev page
		
		echo "<a href=\"?p=" . ($page - 1) . "\"";
		if ($page <= 1){
			echo " disabled";
		}
		echo ">Prev</a>";
		
		//page selector text/input
		echo "Page ";
		echo "<input name=\"p\" type=\"number\" placeholder=\"" . $page . "\"/>";
		echo " of " . $count;
		
		//next page
		
		echo "<a href=\"?p=" . ($page + 1) . "\"";
		if ($page >= $count){
			echo " disabled";
		}
		echo ">Next</a>";
	}
	
	
	function loadNews(){
		global $conn, $page;
		
		$articles = "SELECT * FROM articles ORDER BY date DESC LIMIT 5";
		if ($page > 1) {
			$articles .= " OFFSET " . ($page - 1) * 5;
		}
		$qry = $conn->query($articles);
		if ($qry->num_rows > 0){
			for ($i = 0; $i < $qry->num_rows; $i++){
				$row = $qry->fetch_assoc();
				echo "<a href=\"news/" . $row['id'] . "\"><div class=\"article row\">";
				
					//get first image in article
					$startsAt = strpos($row['content'], '<img src="') + strlen('<img src="');
					if ($startsAt > strlen('<img src="')){
						$endsAt = strpos($row['content'], '"', $startsAt);
						$result = substr($row['content'], $startsAt, $endsAt - $startsAt);
						echo "<div class=\"col-sm-3";
						if ($i % 2 == 1){
							echo " col-sm-push-9";
						}
						echo "\">";
							echo "<img src=\"" . $result . "\">";
						echo "</div>";
					}
					
					//article contents
					if ($startsAt <= strlen('<img src="')){
						echo "<div class=\"content col-sm-12\">";
					} else {
						echo "<div class=\"content col-sm-9";
						if ($i % 2 == 1){
							echo " col-sm-pull-3";
						}
						echo "\">";
					}
						echo "<h3>" . $row['title'] . "</h3>";
						echo "<h5>" . $row['date'] . "</h5><br>";
						echo strip_tags($row['content']);
					echo "</div>";
					
				echo "</div></a>";
			}
		} else {
			header('Location: /news');
			exit();
		}
	}
	
	function loadArticle($id){
		global $conn, $article;
		
		$qry = "SELECT * FROM articles WHERE id = $id";
		$qry = $conn->query($qry);
		
		if ($qry->num_rows > 0){
			$row = $qry->fetch_assoc();
			
			$article = new stdClass();
			$article->title = $row['title'];
			$article->ddate = $row['date'];
			$article->content = $row['content'];
		} else {
			header('Location: /news');
			exit();
		}
	}
?>