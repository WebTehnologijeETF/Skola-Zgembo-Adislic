<?php
function RenderNews() {
	$veza = new PDO("mysql:dbname=wt8;host=localhost;charset=utf8", "adminbaZigZn", "wt8pass");
    $veza->exec("set names utf8");
	
	$rezultat = $veza->query("select * from 'news';");
	
	$content = "";
	while($row in $rezultat) {
		$content += '<div class="topicallarge">
					<h3> '.$row["header"].' </h3>
					<img src="'.$row["imglocation"].'" alt="topic">
					<p> '.$row["description"].'
					</p>
					<a href="#" > Detaljnije... </a>
				</div>';
	}
	echo $content;
}
?>