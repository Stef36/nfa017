<?php session_start();
	require('./includes/fonctions_utiles.php');
?>

<!DOCTYPE html>
<html lang="fr-fr">

<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>

<!-- ======================================================= -->
<head>

<meta charset="UTF-8" lang="fr"/>
<meta name="description"  content="Mes Repos validation modif équipe">

<link rel="icon" href="soullat2.ico" />

<title>Mes Repos | validation modif équipe de travail </title>
<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<!-- ======================================================= -->


<body>
<!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>


<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Page d\'administration</br>Validation</br> modification équipe de travail')?>


<!-- ===================== VISUEL ===================== -->

<section id="centre">
<!-- ===================== MENU ===================== -->
	<?php include("includes/menu.php");  ?>
<!-- ================================================ -->

	<section id="accrocheValidation">


  	<!-- bouton de retour au choix d'administration -->
<p><a href="backoffice.php"><img src="./images/boutons/retour.png"></a><p>

  	
  	<?php /*recupération en POST des données à transmettre pour la connection à la bd */
  	 /*echo ('log de session: '.$_SESSION['login']); test*/
  	
 if (isset($_SESSION['login']))
 {		


 			?>
		<H3>Liste des mises à jour</H3>
		<p><?php

 		/* récup des variables */
		$choixEquipe=$_SESSION['choixEquipe'];
 		echo ('equipe_id -> '.$choixEquipe);
		?></br>


		<?php
			if (isset($_POST ['generation_mdp']) & ($_SESSION['vientDeAdministrationEquipeModif']==1)) {
				echo 'generer mdp  -> ';

				// géneration du mdp

				$alibaba=generer_mot_de_passe(4);
				echo $alibaba.'<br/>';

			} 
			else {

				echo 'mot de passe  -> ';
				

				// affichage du mdp

			 	$sql_alibaba = "	SELECT 		equipe_mdp
						FROM 		equipe
						WHERE 		equipe_id = '$choixEquipe' " ;
			
  				$recherche_alibabas= $pdo->query($sql_alibaba);

  				while ($recherche_alibaba = $recherche_alibabas -> fetch()){
  					$alibaba = $recherche_alibaba['equipe_mdp'];
  					echo $alibaba.'<br/>';
  					} ;

  				};


		?>



		<?php
		$equipe_nom=$_POST ['equipe_nom'];?>
		<?php echo ('equipe_nom -> '.$equipe_nom);?></br><?php

		$equipe_entreprise=$_POST ['equipe_entreprise'];?>
		<?php echo ('equipe_entreprise -> '.$equipe_entreprise);?></br><?php

		$equipe_responsable=$_POST ['equipe_responsable'];?>
		<?php echo ('equipe_responsable -> '.$equipe_responsable);?></br><?php

		$equipe_mail=$_POST ['equipe_mail'];?>
		<?php echo ('equipe_mail -> '.$equipe_mail);?></br>
		
		
		

				<!-- affichage du logo le cas échéant -->
		<?php $equipe_logo=$_POST ['equipe_logo'];?>
		<?php echo ($equipe_logo);?>
				<?php
				//pour affichage du logo
				if ($equipe_logo!='') { // si logo déjà défini
					 
				afficher_suivant_mime($equipe_logo,$equipe_entreprise , NULL, 'logo_equipe', NULL );
				} 
			// sinon pas d'affichage de logo
					
				

		$equipe_visible=$_POST ['equipe_visible'];?>
		<?php echo ($equipe_visible);?></br>

		<?php		

		/* --------   Partie reservée à l'Upload des logos --------*/
		
		$uploaddir = './logos/'; // initialise où seront stockés les logos
		$uploadfile = $uploaddir . basename($_FILES['logo_nouveau']['name']);


		echo '<pre>';
			if (move_uploaded_file($_FILES['logo_nouveau']['tmp_name'], $uploadfile)) {
	    		echo "Le fichier est valide, et a été téléchargé
	           avec succès. Voici plus d'informations :\n";
				$equipe_logo=$uploaddir.$_FILES['logo_nouveau']['name'];


				} else {
	    			echo "Aucun téléchargement de fichier,</br>(ou attaque potentielle par téléchargement de fichiers... peu probable) <br/>";
					}

			echo 'Informations de débogage :';
			print_r($_FILES);
			
			echo '</br><p> type MIME du fichier:';
			$type_Mime_fichier=$_FILES['logo_nouveau']['type'];
			echo $type_Mime_fichier;
			echo '</p></br>';


		echo '</pre>'; ?>

		  	<!-- bouton de retour au choix d'administration -->
<p><a href="backoffice.php"><img src="./images/boutons/retour.png"></a><p> <?php

	/* ------------------------------------------------------------ */

	
	

	/* flag qui évite d'actualiser la requete sur la même page */
	 if ($_SESSION ['flag_requete_update_equipe']==0) {
	
		/*--------INSERTION EN BD -----------------*/
		
		$sql_update_equipe = "	UPDATE 	equipe
								SET equipe_mdp= ?, equipe_nom = ?, equipe_entreprise = ?, equipe_responsable  = ?, equipe_mail = ?,
									equipe_logo = ? , equipe_visible =?
								WHERE equipe_id = ? " ;
				
	  	/* requete préparée */
	  	$prepar_equipe = $pdo->prepare($sql_update_equipe);

	  	$nouvelles_valeurs = array ($alibaba, $equipe_nom, $equipe_entreprise, $equipe_responsable, $equipe_mail ,$equipe_logo, $equipe_visible,$choixEquipe  );
		
		/* execution de la requete préparée plus haut */
		$prepar_equipe->execute ($nouvelles_valeurs);
		
		/* mise à 1 du flag  */
		$_SESSION ['flag_requete_update_equipe'] = 1;
		
		}

		else
			{	
				echo ('Votre requète a déjà été enregistrée...inutile d\'insister');
			}

	}

  	else { ?>
  	<H2>Vous n'êtes plus connectés.</H2>
  	<p><a href="connection_back_office.php"><img src="./images/boutonRetour.png"></a><p>
  	 
  	 
  <?php	}

?>

	</section>
</section> 

<?php $_SESSION['vientDeAdministrationEquipeModif']= 0;
?>

<!-- ===================== BAS DE PAGE  ===================== -->
<?php include("includes/basDePage.php"); ?>
</body>

</html>
