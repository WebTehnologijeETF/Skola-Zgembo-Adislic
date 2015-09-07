<?php
	include './../Model/News.php';
	include './../Model/Comment.php';
	$comment = new Comment();
	$comment->set(json_decode($_POST["data"]));

	$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");
	$comment->time = date("Y-m-d h:i");
    $connection->exec("set names utf8");
    $query = $connection->prepare("INSERT INTO comment(newsid, time, text, mail, visitor) VALUES (?,?,?,?,?)");
    $query->execute(array($comment->newsid, $comment->time, $comment->text, $comment->email, $comment->visitor));
?>