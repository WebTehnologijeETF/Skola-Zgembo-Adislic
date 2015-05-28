<?php
	include 'news.php';
	include = 'leftmenu.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Stil.css">
    <title>Naslovnica</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
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
			<h2>  A k t u e l n o </h2>
			<?php
				RenderNews();
				
			?>
			
		</div>
		<div id="footer">
		<p >Copyright (c) 2015 Nihad Ahmetović Web tehnologije </p>
		</div>
	</div>
</body>

</html>