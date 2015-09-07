<?php
	include './../Model/News.php';

	$news = [];

    $connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

    $connection->exec("set names utf8");
    $result = $connection->query("SELECT id, author, UNIX_TIMESTAMP(time) time1, text, moretext, image, header  FROM news");

    foreach ($result as $item) {
    	$singleNews = new News();
      $singleNews->id = $item["id"];
  		$singleNews->time = date('d.m.Y H:i', $item["time1"]);
  		$singleNews->author = $item["author"];
  		$singleNews->header = $item["header"];
  		$singleNews->imageUrl = $item["image"];
  		$singleNews->text = $item["text"];
  		$singleNews->more = $item["moretext"];
    	array_push($news, $singleNews);
    }

    function sortFunction($a, $b) {
    	$v1 = strtotime($a->time);
    	$v2 = strtotime($b->time);

    	if($v1 == $v2) 
    		return 0;

    	return $v1 > $v2 ? -1 : 1;
    }

    usort($news, "sortFunction");

    echo json_encode($news);
?>