<?php
function RenderLeftMenu() {
	$content = "<ul>
			   <li><a href='Index.php'><span>Naslovnica</span></a></li>
			   <li class='has-sub'><a href='#'><span>Raspored</span></a>
				  <ul>
					 <li><a href='RasporedI.php'><span>Raspored I razred</span></a>
					 </li>
					 <li><a href='RasporedII.php'><span>Raspored II razred</span></a>
					 </li>
					 <li><a href='RasporedIII.php'><span>Raspored III razred</span></a>
					 </li>
					 <li><a href='RasporedIV.php'><span>Raspored IV razred</span></a>
					 </li>
				  </ul>
			   </li>
			   <li class='has-sub'><a href='#'><span>Matura</span></a>
				  <ul>
					 <li><a href='#'><span>2014</span></a>
					 </li>
					 <li><a href='#'><span>2015</span></a>
					 </li>
					 <li><a href='#'><span>2013</span></a>
					 </li>
					 <li><a href='#'><span>2012</span></a>
					 </li>
				  </ul>
			   </li>
			   <li class='has-sub'><a href='#'><span>Eksurzija</span></a>
				  <ul>
					 <li><a href='#'><span>2014</span></a>
					 </li>
					 <li><a href='#'><span>2013</span></a>
					 </li>
					 <li><a href='#'><span>2012</span></a>
					 </li>
					 <li><a href='#'><span>2011</span></a>
					 </li>
				  </ul>
			   </li>
			   <li><a href='Partneri.php'><span>Partneri</span></a></li>
			   <li><a href='ONama.php'><span>O Nama</span></a></li>
			   <li><a href='Kontakt.php'><span>Kontakt</span></a></li>
			   <li><a href='UpitZaOcene.php'><span>Upit za ocene</span></a></li>
			   <li><a href='RegistracijaRoditelja.php'><span>Registracija roditelja</span></a></li>";
			   
			if(isset($_SESSION["username"])) {
				$content += "<li><a href='DodajKorisnika.php'><span>Editovanje korisnika</span></a></li>";
				$content += "<li><a href='DoadjNovost.php'><span>Editovanje novosti</span></a></li><ul>";
			}
			else {
				$content += "</ul>";
			}
		echo $content;
}
?>