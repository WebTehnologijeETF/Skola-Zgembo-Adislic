<?php
    include './../Model/News.php';
    include './../Model/User.php';

    session_start();

    $method  = $_SERVER['REQUEST_METHOD'];
    $request = $_SERVER['REQUEST_URI'];

    function get_news() {
        $news = [];

        $connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

        $connection->exec("set names utf8");
        $result = $connection->query("SELECT id, author, UNIX_TIMESTAMP(time) time1, text, moretext, image, header  FROM news");

        foreach ($result as $item) {
            $singleNews = new News();
            $singleNews->id = $item["id"];
            $singleNews->time = date('d.m.Y H:i', $item["time1"]);
            $singleNews->author = $item["author"];
            $singleNews->header = $item["header"];
            $singleNews->imageUrl = $item["image"];
            $singleNews->text = $item["text"];
            $singleNews->more = $item["moretext"];
            array_push($news, $singleNews);
        }

        function sortFunction($a, $b) {
            $v1 = strtotime($a->time);
            $v2 = strtotime($b->time);

            if($v1 == $v2) 
                return 0;

            return $v1 > $v2 ? -1 : 1;
        }

        usort($news, "sortFunction");

        echo json_encode($news);
    }

    function add_news() {
        authorizeAdmin();
        $news = new News();
        $news->set(json_decode($_POST["data"]));

        $connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");
        $news->time = date("Y-m-d h:i");
        $user = $_SESSION["user"];

        $news->author = $user->firstName . " " . $user->lastName;
        $connection->exec("set names utf8");
        $query = $connection->prepare("INSERT INTO news(author, time, text, moretext, image, header) VALUES (?,?,?,?,?,?)");
        $query->execute(array($news->author, $news->time, $news->text, $news->more, $news->imageUrl, $news->header));
    }

    function edit_news() {
        authorizeAdmin();
        $request_vars;
        parse_str(file_get_contents('php://input'), $request_vars);

        $connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

        $connection->exec("set names utf8");
        $news = new News();
        $user = $_SESSION["user"];
        $news->set(json_decode($request_vars["data"]));
        $news->author = $user->firstName . ' ' . $user->lastName;
        $news->time = date("Y-m-d h:i");

        $query = $connection->prepare("UPDATE news SET author=?,time=?, text=?, moretext=?, header=? WHERE id = ?");
        $query->execute(array($news->author, $news->time, $news->text, $news->more, $news->header, $news->id));
    }

    function delete_news() {
        $request_vars;
        parse_str(file_get_contents('php://input'), $request_vars);
        
        $connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

        $connection->exec("set names utf8");

        $query = $connection->prepare("DELETE FROM news WHERE id = ?;");
        $query->execute(array($request_vars["data"]));
    }

    function authorizeAdmin() {
        if(isset($_SESSION["user"])) {
            $user = $_SESSION["user"];
            if($user->role != 1) {
                exit;
            }
        }
        else {
            exit;
        }
    }

    switch($method) {
        case 'GET':
            get_news();
            break;
        case 'POST':
            authorizeAdmin();
            add_news();
            break;
        case 'PUT':
            authorizeAdmin();
            edit_news();
            break;
        case 'DELETE':
            authorizeAdmin();
            delete_news();
            break;
        default:
            header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
            break;
    }
?>