<?php
    include './../Model/User.php';

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

    function get_users() {
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
    }

    function add_users() {
    	$user = new User();
		$user->set(json_decode($_POST["data"]));

		$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

	    $connection->exec("set names utf8");

	    $query = $connection->prepare("INSERT INTO user(firstname, lastname, password, role, email) VALUES (?,?,?,?,?)");
	    $query->execute(array($user->firstName, $user->lastName, md5($user->pass), $user->role, $user->email));
    }


	function edit_users() {
    	$request_vars;
		parse_str(file_get_contents('php://input'), $request_vars);

		$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

	    $connection->exec("set names utf8");
	    
	    $user = new User();
	    $user->set(json_decode($request_vars["data"]));

	    $query = $connection->prepare("UPDATE user SET firstname=?,lastname=?,email=?,role=? WHERE id = ?");
	    $query->execute(array($user->firstName, $user->lastName, $user->email, $user->role, $user->id));
    }


	function delete_users() {
    	$request_vars;
		parse_str(file_get_contents('php://input'), $request_vars);
		
		$connection = new PDO("mysql:dbname=zgembo;host=localhost;charset=utf8", "root", "");

	    $connection->exec("set names utf8");

	    $query = $connection->query("SELECT Count(*) FROM user;");

	    $result = $query->fetchColumn();

	    if($result > 1) { 
	    	$query = $connection->prepare("DELETE FROM user WHERE id = ?;");
	    	$query->execute(array($request_vars["data"]));
		}
    }

    authorizeAdmin();

    switch($method) {
        case 'GET':
            get_users();
            break;
        case 'POST':
            add_users();
            break;
        case 'PUT':
            edit_users();
            break;
        case 'DELETE':
            delete_users();
            break;
        default:
            header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
            break;
    }

?>