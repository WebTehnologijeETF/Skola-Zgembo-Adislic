<?php
	session_start();
	if(isset($_SESSION["user"])) {
		unset($_SESSION["user"]);
		echo 1;
	}
	else {
		echo 0;
	}
?>