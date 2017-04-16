<?php Session_start()?>

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
  	
 if ( isset($_SESSION['login'])) {
 
 		
 		?>
		<H3>Liste des mises à jour</H3>
		<p><?php

 		/* récup des variables */
		$choixEquipe=$_SESSION['choixEquipe'];
 		echo ('equipe_id='.$choixEquipe);
		?></br>

		<?php
		$equipe_nom=$_POST ['equipe_nom'];?>
		<?php echo ($equipe_nom);?></br><?php

		$equipe_entreprise=$_POST ['equipe_entreprise'];?>
		<?php echo ($equipe_entreprise);?></br><?php

		$equipe_responsable=$_POST ['equipe_responsable'];?>
		<?php echo ($equipe_responsable);?></br><?php

		$equipe_mail=$_POST ['equipe_mail'];?>
		<?php echo ($equipe_mail);?></br><?php
		
		$equipe_logo=$_POST ['equipe_logo'];?>
		<?php echo ($equipe_logo);?></br><?php

		$equipe_visible=$_POST ['equipe_visible'];?>
		<?php echo ($equipe_visible);?></br>		



	<?php

	/* flag qui évite d'actualiser la requete sur la même page */
	 if ($_SESSION ['flag_requete_update_equipe']==0) {
	
	/*--------INSERTION EN BD -----------------*/
	
	$sql_update_equipe = "	UPDATE 	equipe
							SET equipe_nom = ?, equipe_entreprise = ?, equipe_responsable  = ?, equipe_mail = ?,
								equipe_logo = ? , equipe_visible =?
							WHERE equipe_id = ? " ;
			
  	/* requete préparée */
  	$prepar_equipe = $pdo->prepare($sql_update_equipe);

  	$nouvelles_valeurs = array ($equipe_nom, $equipe_entreprise, $equipe_responsable, $equipe_mail ,$equipe_logo, $equipe_visible,$choixEquipe  );
	
	/* execution de la requete préparée plus haut */
	$prepar_equipe->execute ($nouvelles_valeurs);
	
	/* mise à 1 du flag  */
	$_SESSION ['flag_requete_update_equipe']= 1;
	
	}
	else
			{
			echo ('Votre requète a déjà été enregistrée...inutile d\'insister');}

	}

  	else { ?>
  	<H2>Vous n'êtes plus connectés.</H2>
  	<p><a href="connection_back_office.php"><img src="./images/boutonRetour.png"></a><p>
  	 
  	 
  <?php	}

?>

	</section>
</section> 

<!-- ===================== BAS DE PAGE  ===================== -->
<?php include("includes/basDePage.php"); ?>
</body>

</html>
