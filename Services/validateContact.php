<?php

	global $validate;

	function validateMail ($val) {
		return preg_match("/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/", $val);
	} 

	function validateString ($val) {
		return strlen($val) > 1;
	}

	function buildFields () {
		global $validate, $name, $message, $subject, $mail;
		$retVal = "";

		//name field

		$retVal .= '<div> <label> <span> Ime: </span> <span class="'; 
		if($validate != 'name') 
			 $retVal .= 'error-hidden';
		else 
			$retVal .= 'error-text';
		$retVal .= '"> ime mora biti duze od dva karaktera </span> <input class="';
		if($validate == 'name')
			$retVal .= 'input-error';
		$retVal .= '" id="contactName" placeholder="Ime..." type="text" tabindex="1" name="firstName" onblur="validateName(event)" value="';
		$retVal .=  $name;
		$retVal .= '" autofocus> </label> </div>';

		//mail field

		$retVal .= '<div> <label> <span> Email: </span> <span class="'; 
		if($validate != 'mail') 
			 $retVal .= 'error-hidden';
		else 
			$retVal .= 'error-text';
		$retVal .= '"> email nije validan </span> <input class="';
		if($validate == 'mail')
			$retVal .= 'input-error';
		$retVal .= '" id="contactMail" placeholder="Email..." type="email" tabindex="3" name="email" onblur="validateEmail()" value="';
		$retVal .= $mail;
		$retVal .= '"> </label> </div>';

		//subject field

		$retVal .= '<div> <label> <span> Naslov: </span> <span class="'; 
		if($validate != 'subject') 
			 $retVal .= 'error-hidden';
		else 
			$retVal .= 'error-text';
		$retVal .= '"> naslov nije validan </span> <input class="';
		if($validate == 'subject')
			$retVal .= 'input-error';
		$retVal .= '" id="contactSubject" placeholder="Naslov..." type="text" tabindex="4" name="title" onblur="validateSubject()" value="';
		$retVal .= $subject;
		$retVal .= '"> </label> </div>';

		//message field

		$retVal .= '<div> <label><span>Email:</span> <span class="';
		if($validate != 'message') 
			$retVal .= 'error-hidden';
		else 
			$retVal .= 'error-text';
		$retVal .= '">poruka nije validna</span><textarea class="';
		if($validate == 'message') 
			$retVal .= 'input-error';
		$retVal .= '" id="contactMessage" tabindex="5" onblur="validateMessage()">';
		$retVal .= $message;
		$retVal .= '</textarea></label> </div>';

		//buttons

		$retVal .= '<div>';
		$retVal .= '<button class="cancelEmail" name="cancel" id="contact-cancel" onclick="cancelSendEmail()">Odustani</button>';
		$retVal .= '<button class="sendEmail" name="submit" id="contact-submit" onclick="sendEmail()">Pošaljite email</button>';
		$retVal .= '</div>';

		return $retVal;

	}

	function buildHtmlResponse() {
		global $validate, $name, $message, $subject, $mail;
		$retVal = "";

		if(isset($validate)) {
		
			$retVal .= '<h2> Kontaktirajte nas </h2>';
			$retVal .= '<div id="forma">';
			$retVal .= '<div class="form">';
			$retVal .= '<h4>Popunite formu ispod i mi ćemo odgovoriti u roku od 24 časa</h4>';
			$retVal .= buildFields();
			$retVal .= '</div></div>';
		}
		else {
			$retVal .= '<h2> Provjerite da li ste ispravno popunili kontakt formu </h2>';
			$retVal .= '<div id="forma">';
			$retVal .= '<div class="form readonly">';

			$retVal .= '<div> Ime: ';
			$retVal .= $name;
			$retVal .= '</div>'; 

			$retVal .= '<div> Email: ';
			$retVal .= $mail;
			$retVal .= '</div>'; 

			$retVal .= '<div> Naslov: ';
			$retVal .= $subject;
			$retVal .= '</div>'; 

			$retVal .= '<div> Poruka:';
			$retVal .= $message;
			$retVal .= '</div>'; 

			$retVal .= '<h4> Da li ste sigurni da želite poslati ove podatke? </h4>';
			$retVal .= '<div><button name="cancel" onclick="IAgree()">Siguran sam</button></div>';

			

			$retVal .= '<h4> Ako ste pogrešno popunili formu, možete ispod prepraviti unesene podatke </h4>';
			$retVal .= '<div class="formCheckAndCorrect">';
			$retVal .= buildFields();
			$retVal .= '</div>';
			$retVal .= '</div></div>';

			//only if form valid store data in session

			//stored in session to prevent from editing validated data between two forms
			session_start();
			
			$_SESSION["contactName"] = $name;
			$_SESSION["contactMail"] = $mail;
			$_SESSION["contactSubject"] = $subject;
			$_SESSION["contactMessage"] = $message;
		}
		return $retVal;
	}

	$name = htmlentities($_POST['name'], ENT_QUOTES);
	$mail = htmlentities($_POST['mail'], ENT_QUOTES);
	$subject = htmlentities($_POST['subject'], ENT_QUOTES);
	$message = htmlentities($_POST['message'], ENT_QUOTES);

	

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

	echo buildHtmlResponse();

?>