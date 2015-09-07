<?php
	include './../Model/User.php';
	include './../Model/Comment.php';

    session_start();

    $method  = $_SERVER['REQUEST_METHOD'];
    $request = $_SERVER['REQUEST_URI'];

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

    function get_comments() {
    	

    	if(isset($_GET["data"])) {
    		$id = $_GET["data"];
			$comments = [];

			$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");
		    $connection->exec("set names utf8");
		    $query = $connection->prepare("SELECT id, text, mail, visitor, UNIX_TIMESTAMP(time) time1 FROM comment where newsid =?;");
		    $query->execute(array($id));
		    $result = $query->fetchAll();
		    foreach ($result as $item) {
		    	$singleComment = new Comment();
		    	$singleComment->id = $item["id"];
		  		$singleComment->text = $item["text"];
		  		$singleComment->email = $item["mail"];
		  		$singleComment->visitor = $item["visitor"];
		  		$singleComment->time = date('d.m.Y H:i', $item["time1"]);
		  		array_push($comments, $singleComment);
	    	}

		    function cmp_function($a, $b)
		    {
		      $v1 = strtotime($a->time);
		      $v2 = strtotime($b->time);

		      if($v1 == $v2) 
		        return 0;

		      return $v1 < $v2 ? -1 : 1;
		    }

		    usort($comments, "cmp_function");
		    echo json_encode($comments);
		}
		else {
			$id = $_GET["id"];

			$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

		    $connection->exec("set names utf8");

		    $query = $connection->prepare("SELECT Count(*) FROM comment where newsid=?;");
		    $query->execute(array($id));
		    echo $query->fetchColumn();
		}
    }

    function add_comments() {
		$comment = new Comment();
		$comment->set(json_decode($_POST["data"]));

		$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");
		$comment->time = date("Y-m-d h:i");
	    $connection->exec("set names utf8");
	    $query = $connection->prepare("INSERT INTO comment(newsid, time, text, mail, visitor) VALUES (?,?,?,?,?)");
	    $query->execute(array($comment->newsid, $comment->time, $comment->text, $comment->email, $comment->visitor));
    }
    function delete_comments() {
    	$request_vars;
	    parse_str(file_get_contents('php://input'), $request_vars);
	    
	    $connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

	    $connection->exec("set names utf8");

	    $query = $connection->prepare("DELETE FROM comment WHERE id = ?;");
	    $query->execute(array($request_vars["data"]));
    }

    switch($method) {
        case 'GET':
            get_comments();
            break;
        case 'POST':
            add_comments();
            break;
        case 'PUT':
            break;
        case 'DELETE':
        	authorizeAdmin();
            delete_comments();
            break;
        default:
            header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
            break;
    }
?>