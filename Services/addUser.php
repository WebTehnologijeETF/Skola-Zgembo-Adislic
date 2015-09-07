<?php
	include './../Model/User.php';

	$user = new User();
	$user->set(json_decode($_POST["data"]));

	$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

    $connection->exec("set names utf8");

    $query = $connection->prepare("INSERT INTO user(firstname, lastname, password, role, email) VALUES (?,?,?,?,?)");
    $query->execute(array($user->firstName, $user->lastName, md5($user->pass), $user->role, $user->email));
?>