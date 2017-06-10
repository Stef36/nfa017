<!-- ===================== TITRE ===================== -->
<?php 


function titre_header($titre)
{ ?>

<div >
				<?php
				
				//echo $titre;

				$checksum= md5 ($titre);
				//echo $checksum;
				
				
				$addresse_convertie=substr ($titre,0,3).(substr ($checksum,0,4));
				//$addresse_convertie=$nom_page.'.txt';


				// créé le repertoire ./compteur s'il n'existe pas
				if (!is_dir("./compteur"))
					{mkdir("./compteur", 0777);};


				//Ouvre le fichier pour lecture et écriture
				$monfichier = fopen('compteur/'.$addresse_convertie, 'c+');
 
				$pages_vues = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
				$pages_vues += 1; // On augmente de 1 ce nombre de pages vues
				fseek($monfichier, 0); // On remet le curseur au début du fichier
				fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues
 
				fclose($monfichier);
 
				echo '<p id="compteur">Depuis le 10 juin 2017, page vue '. $pages_vues . ' fois.</p>';
				?>
</div>


<!--
<div id="cookies">
			
			<p><img src="./images/cookies.png"  height=50 onclick="afficheOuMasque('cookies');"/>En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de Cookies ou autres traceurs pour vous proposer des statistiques de visites.<br>De plus, des cookies de reseaux sociaux sont intégrés à ces pages<br>Cliquez sur les cookies ou sur le titre de la page pour faire disparaitre et réapparaitre ce message...
			</p>
</div>
-->



<header id="titre-page" class="headera">
		 
 
	<section>

		<?php include("./includes/bouton_connect.inc.php"); ?>

  	</section>



  	<section id="Titre" onclick="afficheOuMasque('cookies');" >
  
    <H1><?php echo ($titre); ?> </H1>
    
  	</section>

<!-- ===================== CONTACTS ===================== -->
  <section id="contactsTitre">
  	<!-- TODO -->
  </section>
</header>
<!-- ======================================================= -->

<?php 
}
 ?>
