<?php
	if(isset($_POST['login'])) {
		$username = mysql_escape_string($_POST['username']);
		$pass = mysql_escape_string($_POST['password']);
	}
	
     $veza = new PDO("mysql:dbname=test123;host=localhost:8081;charset=utf8", "root", "");
     $veza->exec("set names utf8");
	 $pass = md5($pass);
     $rezultat = $veza->query("select * from 'User' where 'username' = '".$username."' AND 'pass' = '".$pass."'");
     if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 else {
		 session_start();
		 $_SESSION["username"] = $username;
		 header("location: Index.html");
	 }
?>