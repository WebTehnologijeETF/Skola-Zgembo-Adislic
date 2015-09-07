<?php
	include './../Model/User.php';

	$request_vars;
	parse_str(file_get_contents('php://input'), $request_vars);

	$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

    $connection->exec("set names utf8");
    
    $user = new User();
    $user->set(json_decode($request_vars["data"]));

    $query = $connection->prepare("UPDATE user SET firstname=?,lastname=?,email=?,role=? WHERE id = ?");
    $query->execute(array($user->firstName, $user->lastName, $user->email, $user->role, $user->id));
?>