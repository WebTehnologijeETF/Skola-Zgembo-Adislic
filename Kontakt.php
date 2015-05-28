<?php
	include = 'leftmenu.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Stil.css">
    <title>Kontakt</title>
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
			<h2> Kontaktirajte nas </h2>
			<div id="forma">
			<form id="contact-form" method="post">
				<h4>Popunite formu ispod i mi ćemo odgovoriti u roku od 24 časa</h4>

					<div>
						<label>
								<span>Ime: (obavezno)</span>
								<input placeholder="Ime..." type="text" tabindex="1" name="name" required autofocus>
						</label>
					</div>
					<div>
						<label>
								<span>Email: (obavezno)</span>
								<input placeholder="Email..." type="email" tabindex="3" name="email" required>
						</label>
					</div>
					<div>
						<label>
								<span>Naslov: (obavezno)</span>
								<input placeholder="Naslov..." type="text" tabindex="4" name="title" required>
						</label>
					</div>
					<div>
						<label>
								<span>Poruka:</span>
								<textarea tabindex="5" placeholder="Poruka..." required></textarea>
						</label>
					</div>
					<div>
					<button name="submit" type="submit" id="contact-submit">Pošaljite email</button>
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