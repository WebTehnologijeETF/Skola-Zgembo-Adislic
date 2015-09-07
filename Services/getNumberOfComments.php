<?php
	$id = htmlentities($_GET["data"], ENT_QUOTES);

	$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

    $connection->exec("set names utf8");

    $query = $connection->prepare("SELECT Count(*) FROM comment where newsid=?;");
    $query->execute(array($id));
    echo $query->fetchColumn();
?>