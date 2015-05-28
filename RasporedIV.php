<?php
	include = 'leftmenu.php';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Stil.css">
    <title>Raspored IV razred</title>
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
			<h2> Raspored časova četvrtih razreda </h2>
				<table>
				<thead>
					<tr>
						<th class="topleft"> </th>
						<th> Ponedeljak </th>
						<th> Utorak </th>
						<th> Srijeda </th>
						<th> Četvrtak </th>
						<th> Petak </th>
					</tr>
				</thead>
				<tbody>
					<tr> 
						<td> 1 </td>
						<td> Latinski </td>
						<td> Matematika </td>
						<td> Tjelesni odgoj </td>
						<td> Fizika </td>
						<td> Muzičko </td>
					</tr>
					<tr> 
						<td> 2 </td>
						<td> Muzičko </td>
						<td> Matematika </td>
						<td> Bosanski </td>
						<td> Njemački </td>
						<td> Sociologija </td>
					</tr>
					<tr> 
						<td> 3 </td>
						<td> Latinski </td>
						<td> Hemija </td>
						<td> Ruski </td>
						<td> Muzičko </td>
						<td> Tjelesni odgoj </td>
					</tr>
					<tr> 
						<td> 4 </td>
						<td> Ruski </td>
						<td> Matematika </td>
						<td> Engleski </td>
						<td> Filozofija </td>
						<td> Hemija </td>
					</tr>
					<tr> 
						<td> 5 </td>
						<td> Matematika </td>
						<td> Bosanski </td>
						<td> Njemački </td>
						<td> Engleski </td>
						<td> Fizika </td>
					</tr>
					<tr> 
						<td> 6 </td>
						<td> Muzičko </td>
						<td> Matematika </td>
						<td> Latinski </td>
						<td> Fizika </td>
						<td> Filozofija </td>
					</tr>
					<tr> 
						<td> 7 </td>
						<td> Bosanski </td>
						<td> Filozofija </td>
						<td> Engleski </td>
						<td> Fizika </td>
						<td> Likovno </td>
					</tr>
				</tbody>
			</table>
		</div>
		<div id="footer">
		<p >Copyright (c) 2015 Nihad Ahmetović Web tehnologije </p>
		</div>
	</div>
</body>

</html>