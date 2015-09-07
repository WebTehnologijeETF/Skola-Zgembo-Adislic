<?php
	include './../Model/News.php';
	include './../Model/User.php';
	session_start();
	$news = new News();
	$news->set(json_decode($_POST["data"]));

	$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");
	$news->time = date("Y-m-d h:i");
	$user = $_SESSION["user"];

	$news->author = $user->firstName . " " . $user->lastName;
    $connection->exec("set names utf8");
    $query = $connection->prepare("INSERT INTO news(author, time, text, moretext, image, header) VALUES (?,?,?,?,?,?)");
    $query->execute(array($news->author, $news->time, $news->text, $news->more, $news->imageUrl, $news->header));

?>