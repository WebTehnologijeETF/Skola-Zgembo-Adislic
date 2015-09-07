<?php
	session_start();
	include './../Model/User.php';
	$login = json_decode($_POST["data"]);
	$email = htmlentities($login->email, ENT_QUOTES);
	$pass = htmlentities($login->pass, ENT_QUOTES);
	$pass = md5($pass);
	$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

    $connection->exec("set names utf8");

    $query = $connection->prepare("SELECT * FROM user WHERE email = ? AND password = ?;");
    $query->execute(array($email, $pass));
	$user = new User();
	if($query->rowCount() > 0) {
		$row = $query->fetch();
		$user->id = $row["id"];
		$user->firstName = $row["firstname"];
		$user->lastName = $row["lastname"];
		$user->email = $row["email"];
		$user->role = $row["role"];
		$user->pass = $row["password"];
		$_SESSION["user"] = $user;
		echo 1;
	}
	else {
		echo 0;
	}
?>
