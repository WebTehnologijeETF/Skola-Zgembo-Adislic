<?php
	include './../Model/User.php';
	session_start();
	$request_vars;
	parse_str(file_get_contents('php://input'), $request_vars);

	$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

    $connection->exec("set names utf8");

    $jsonDecoded = json_decode($request_vars["user"]);

    $pass = md5(htmlentities($jsonDecoded->pass, ENT_QUOTES));
    $oldPass = md5(htmlentities($jsonDecoded->old, ENT_QUOTES));

    $user = $_SESSION["user"];

    if($user->pass == $oldPass) {
		$query = $connection->prepare("UPDATE user SET password=? WHERE id = ?");
		$query->execute(array($pass, $user->id));
    }
?>