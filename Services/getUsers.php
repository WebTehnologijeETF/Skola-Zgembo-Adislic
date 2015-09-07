<?php
	include './../Model/User.php';

	$users = [];

	$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

    $connection->exec("set names utf8");
    $result = $connection->query("SELECT * FROM user;");

    foreach ($result as $item) {
    	$singleUser = new User();
    	$singleUser->id = $item["id"];
  		$singleUser->firstName = $item["firstname"];
  		$singleUser->lastName = $item["lastname"];
  		$singleUser->email = $item["email"];
  		$singleUser->role = $item["role"];
    	array_push($users, $singleUser);
    }

    echo json_encode($users);
?>