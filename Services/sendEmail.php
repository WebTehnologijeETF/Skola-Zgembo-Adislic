<?php
	session_start();
	if(isset($_SESSION["contactName"]) && isset($_SESSION["contactMail"])
		&& isset($_SESSION["contactSubject"]) && isset($_SESSION["contactMessage"])) {
		ini_set("SMTP", "webmail.etf.unsa.ba");
		ini_set("smtp_port", "25");
		ini_set("sendmail_from", "nahmetovic1@etf.unsa.ba");

		$to = "nahmetovic1@etf.unsa.ba";
		$cc = "nihad92@gmail.com";
		$subject = "Poruka sa kontakt forme - " .  $_SESSION["contactSubject"];
		$replyTo = $_SESSION["contactMail"];
		$message = $_SESSION["contactMessage"];

		$headers = "From: ". $_SESSION["contactName"] . " <" . $replyTo . ">\r\n";
		$headers .= 'Reply-to:' . $replyTo ."\r\n";
		$headers .= 'Cc:' . $cc . "\r\n";
		mail($to, $subject, $message, $headers);
	}
?>