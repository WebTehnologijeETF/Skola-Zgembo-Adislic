<?php
	include './../Model/User.php';
	include './../Model/News.php';
	session_start();
	$request_vars;
	parse_str(file_get_contents('php://input'), $request_vars);

	$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

    $connection->exec("set names utf8");
    $news = new News();
    $user = $_SESSION["user"];
    $news->set(json_decode($request_vars["data"]));
    echo $request_vars["data"];
    $news->author = $user->firstName . ' ' . $user->lastName;
    $news->time = date("Y-m-d h:i");

    $query = $connection->prepare("UPDATE news SET author=?,time=?, text=?, moretext=?, header=? WHERE id = ?");
    $query->execute(array($news->author, $news->time, $news->text, $news->more, $news->header, $news->id));
?>