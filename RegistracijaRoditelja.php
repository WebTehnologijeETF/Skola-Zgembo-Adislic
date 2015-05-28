<?php
	include = 'leftmenu.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Stil.css">
    <title>registracija roditelja</title>
    <meta charset="utf-8" />
</head>

<body>
	<div id="okvir">
		<div id="header">
			<img src="Images/logo.png" alt="logo">
			<label class="logo">Srednja škola <span> Zgembo Adislić</span> </label>
			<div id="search">
				<label> Pretraga: </label>
				<input type="text">
			</div>
		</div>
		<div id="leftmenu">
			<?php
			RenderLeftMenu();
			?>
		</div>
		<div id="pagecontent">
			<h2> Registrujte se </h2>
			<div id="forma">
			<form id="contact-form" method="post">
				<h4>Popunite podatke za registraciju</h4>

					<div>
						<label>
								<span>Ime: (obavezno)</span> <span id="firstNameGreska" class="skriven">    Greska!!  Polje ime ne može biti prazno</span>
								<input placeholder="Ime..." type="text" tabindex="1" name="firstName" id="firstName" onfocusout="onValidateFirstName()">
						</label>
					</div>
					<div>
						<label>
								<span>Przime: (obavezno)</span> <span id="lastNameGreska" class="skriven">    Greska!! Polje prezime ne može biti prazno</span>
								<input placeholder="Przime..." type="text" tabindex="2" name="lastName" id="lastName" onfocusout="onValidateLastName()">
						</label>
					</div>
					<div>
						<label>
								<span>Email: (obavezno)</span> <span id="emailGreska" class="skriven">    Greska!! </span>
								<input placeholder="Email..." type="text" tabindex="3" name="email" id="email" onfocusout="onValidateEmail()">
						</label>
					</div>
					<div>
						<label>
								<span>Telefon: (obavezno)</span> <span id="telGreska" class="skriven">    Greska!! Telefon mora biti u formatu +387 66 666-999</span>
								<input placeholder="Telefon..." type="text" tabindex="4" name="tel" id="tel" onfocusout="onValidateTel()">
						</label>
					</div>
					<div>
						<label>
								<span>Ime i prezime učenika: (obavezno)</span> <span id="studentNameGreska" class="skriven">    Greska!! Polje ime i prezime učenika ne može biti prazno</span>
								<input placeholder="Ime i prezime..." type="text" tabindex="5" name="studentName" id="studentName" onfocusout="onValidateStudentName()">
						</label>
					</div>
					<div>
						<label>
								<span>Matični broj učenika: (obavezno)</span> <span id="JMBGGreska" class="skriven">    Greska!! Matični broj mora imati 13 cifara</span>
								<input placeholder="JMBG..." type="text" tabindex="5" name="JMBG" id="JMBG" onfocusout="onValidateJMBG()">
						</label>
					</div>
					<div>
						<label>
								<span>Šifra: (obavezno)</span> <span id="passwordGreska" class="skriven">    Greska!! Šifra mora imati bar 6 karaktera</span>
								<input type="password" placeholder="Šifra..." tabindex="6" name="password" id="password" onfocusout="onValidatePassword()">
						</label>
					</div>
					<div>
						<label>
								<span>Potvrda šifre: (obavezno)</span> <span id="potvrdaGreska" class="skriven">    Greska!! Šifre se ne poklapaju</span>
								<input type="password" placeholder="Potvrda šifre..." tabindex="7" name="confirmPassword" id="confirmPassword" onfocusout="onValidateConfirmPassword()">
						</label>
					</div>
					<div>
					<button id="contact-submit" onclick="return submitFunction(); ">Pošaljite zahtjev za registraciju</button>
					</div>
				</form>
			</div>
		</div>
		<div id="footer">
		<p >Copyright (c) 2015 Nihad Ahmetović Web tehnologije </p>
		</div>
	</div>
	<script src="skripta.js"> </script>
</body>

</html>