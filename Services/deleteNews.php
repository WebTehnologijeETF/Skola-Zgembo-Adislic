<?php
    $request_vars;
    parse_str(file_get_contents('php://input'), $request_vars);
    
    $connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

    $connection->exec("set names utf8");

    $query = $connection->prepare("DELETE FROM news WHERE id = ?;");
    $query->execute(array($request_vars["id"]));

?>