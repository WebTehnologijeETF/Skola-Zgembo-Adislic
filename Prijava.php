<?php
	include = 'leftmenu.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Stil.css">
    <title>Administracija</title>
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
		
		<div id="pagecontent" style="padding-left:60px;">
			<h2> Prijavite se </h2>
			<div id="forma">
			<form action="login.php" method="post">
				<h4>Prijava</h4>

					<div>
						<label>
								<span>Korisnicko ime: (obavezno)</span>
								<input placeholder="Korisnicko ime..." type="text" tabindex="1" name="username" required autofocus>
						</label>
					</div>
					<div>
						<label>
								<span>Sifra: (obavezno)</span>
								<input placeholder="Sifra..." type="password" tabindex="3" name="password" required>
						</label>
						
					</div>
					<div style="text-align=right;">
						<a> Zaboravili ste password? </a>
					</div>
					<div>
					<button name="login" type="submit" id="contact-submit">Prijavi se</button>
					</div>
				</form>
			</div>
		</div>
		<div id="footer">
		<p >Copyright (c) 2015 Nihad Ahmetović Web tehnologije </p>
		</div>
	</div>
</body>

</html>