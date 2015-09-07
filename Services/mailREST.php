<?php
	session_start();

	$method  = $_SERVER['REQUEST_METHOD'];
    $request = $_SERVER['REQUEST_URI'];

    function validateMail ($val) {
		return preg_match("/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/", $val);
	} 

	function validateString ($val) {
		return strlen($val) > 1;
	}

    function validateemail() {
    	$name = htmlentities($_POST['name'], ENT_QUOTES);
		$mail = htmlentities($_POST['mail'], ENT_QUOTES);
		$subject = htmlentities($_POST['subject'], ENT_QUOTES);
		$message = htmlentities($_POST['message'], ENT_QUOTES);

		$validate;

		if(!validateString(preg_replace('/\s+/', '', $name))) {
			$validate = "name";
		}
		else if(!validateMail($mail)) {
			$validate = "mail";
		}
		else if(!validateString($subject)) {
			$validate = "subject";
		}
		else if(!validateString($message)) {
			$validate = "message";
		}

		if(isset($validate) == false) {
			$_SESSION["contactName"] = $name;
			$_SESSION["contactMail"] = $mail;
			$_SESSION["contactSubject"] = $subject;
			$_SESSION["contactMessage"] = $message;
			echo json_encode(array('status' => 'ok', 'name' => $name, 'mail' => $mail, 'subject' => $subject, 'message' => $message));
		}
		else {
			echo json_encode(array('status' => 'NaN', 'name' => $name, 'mail' => $mail, 'subject' => $subject, 'message' => $message));
		}

    }


	switch($method) {
        case 'GET':
            break;
        case 'POST':
            validateemail();
            break;
        case 'PUT':
            break;
        case 'DELETE':
            break;
        default:
            header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
            break;
    }
?>