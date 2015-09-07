<?php

	include 'Model/User.php';
	session_start();
	if(isset($_SESSION["user"]) == true) {
		$user = new User();
		$user->set($_SESSION["user"]);
	}
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Content/CommonStyle.css">
    <script type="text/javascript" src="Scripts/mainScript.js"></script>
    <title>Zgembo</title>
    <meta charset="UTF-8">
</head>

<body  onclick="onClickOutsideSettings(event)">
	<div id="okvir">
		<div id="header">
			<img src="Content/logo.png" alt="logo">
			<label class="logo">Srednja škola <span> Zgembo Adislić</span> </label>
			<div id="settings-menu">
				<ul>
					<?php
						if(isset($_SESSION["user"]) == true) {
							
							print '<li><a>' . $user->firstName . '</a></li>';
						}
						else 
							print '<li><a>Profil</a></li>';
					?>
					<li class="has-sub"><a>Podesavanja</a>
						<ul class="sub-settings-menu">
							<li class="sub">
								<a>Promjeni sifru</a>
							</li>
							<li class="sub">
								<a>Promjeni podatke </a>
							</li>
						</ul>
					</li>
					<li><a>Pomoc</a></li>
					<?php
						if(isset($_SESSION["user"]) == true) 
							print '<li onclick="logout()"><a>Odjava</a></li>';
						else 
							print '<li onclick="ajaxLoad(' . "'#login', true" .')"><a href="#">Prijava</a></li>';
					?>
				</ul>
			</div>
			<div id="settings">
			</div>
			<div id="search">
				<label> Pretraga: </label>
				<input type="text">
			</div>
		</div>
		<div id="leftmenu">
			<ul>
			   <li><a onclick="changeWindowHash('#index')"><span>Naslovnica</span></a></li>
			   <li class="has-sub"><a><span>Raspored</span></a>
				  <ul>
					 <li><a onclick="changeWindowHash('#timetable1')"><span>Raspored I razred</span></a>
					 </li>
					 <li><a onclick="changeWindowHash('#timetable2')"><span>Raspored II razred</span></a>
					 </li>
					 <li><a onclick="changeWindowHash('#timetable3')"><span>Raspored III razred</span></a>
					 </li>
					 <li><a onclick="changeWindowHash('#timetable4')"><span>Raspored IV razred</span></a>
					 </li>
				  </ul>
			   </li>
			   <li><a onclick="changeWindowHash('#partners')"><span>Partneri</span></a></li>
			   <li><a onclick="changeWindowHash('#aboutus')"><span>O Nama</span></a></li>
			   <li><a onclick="changeWindowHash('#contact')"><span>Kontakt</span></a></li>
			   <li><a onclick="changeWindowHash('#quiz')"><span>Igra gradovi</span></a></li>
			   <li><a onclick="changeWindowHash('#books')"><span>Knjige</span></a></li>
			   <?php 
			   		if(isset($_SESSION["user"]) == true) {
			   			if($user->role == 1) 
			   			print '<li><a onclick="changeWindowHash(' . "'#adduser'" .')"><span>Korisnici</span></a></li>';
			   			print '<li><a onclick="changeWindowHash(' . "'#novosti'" .')"><span>Novosti</span></a></li>';
			   			print '<li><a onclick="changeWindowHash(' . "'#comments'" .')"><span>Komentari</span></a></li>';
			   		}
			   ?>
			</ul>
		</div>
		<div id="pagecontent">
			<!---partial load-->
		</div>
		<div id="footer">
		<p >Copyright (c) 2015 Nihad Ahmetović Web tehnologije </p>
		</div>
	</div>
	
	<script type="text/javascript" src="Scripts/book.js"></script>
	<script type="text/javascript" src="Scripts/quiz.js"></script>
	<script type="text/javascript" src="Scripts/service.js"></script>
	<script type="text/javascript" src="Scripts/singlePageScript.js"></script>
	<script type="text/javascript" src="Scripts/dropDownScript.js"></script>
</body>
</html>