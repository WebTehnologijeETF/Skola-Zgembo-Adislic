<?php 
	include './../Model/Comment.php';
	$id = $_GET["data"];

	$comments = [];

	$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");
    $connection->exec("set names utf8");
    $query = $connection->prepare("SELECT id, text, mail, visitor, UNIX_TIMESTAMP(time) time1 FROM comment where newsid =?;");
    $query->execute(array($id));
    $result = $query->fetchAll();
    foreach ($result as $item) {
    	$singleComment = new Comment();
    	$singleComment->id = $item["id"];
  		$singleComment->text = $item["text"];
  		$singleComment->email = $item["mail"];
  		$singleComment->visitor = $item["visitor"];
  		$singleComment->time = date('d.m.Y H:i', $item["time1"]);
  		array_push($comments, $singleComment);
    }

    function cmp_function($a, $b)
    {
      $v1 = strtotime($a->time);
      $v2 = strtotime($b->time);

      if($v1 == $v2) 
        return 0;

      return $v1 < $v2 ? -1 : 1;
    }

    usort($comments, "cmp_function");
    echo json_encode($comments);
?>