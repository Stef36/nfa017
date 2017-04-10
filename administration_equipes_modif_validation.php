<!DOCTYPE html>
<html lang="fr-fr">

<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>

<!-- ======================================================= -->
<head>

<meta charset="UTF-8" lang="fr"/>
<meta name="description"  content="Soul Latitude validation modif instrument">

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
		$choixInstru=$_SESSION['choixInstru'];
 		
 		echo ('inst_id='.$choixInstru);
		?></br>

		<?php
		$inst_nom=$_POST ['inst_nom'];?>
		<?php echo ($inst_nom);?></br><?php

		
		$inst_type=$_POST ['inst_type'];?>
		<?php echo ($inst_type);?></br><?php

		$inst_marque=$_POST ['inst_marque'];?>
		<?php echo ($inst_marque);?></br><?php

		$inst_no_serie=$_POST ['inst_no_serie'];?>
		<?php echo ($inst_no_serie);?></br>
		

		



	<?php
	/* flag qui évite d'actualiser la requete sur la même page */
	
	 if ($_SESSION ['flag_requete_update_instrument']==0) {
	
	/*--------INSERTION EN BD -----------------*/
	
	$sql_update_instrument = "	UPDATE 	instrument
								SET inst_nom = ?, inst_type = ?, inst_marque = ?, inst_no_serie = ?
								WHERE inst_id = ? " ;
			
  	/* requete préparée */
  	$prepar_inst = $pdo->prepare($sql_update_instrument);
  	$nouvelles_valeurs= array ($inst_nom, $inst_type, $inst_marque, $inst_no_serie ,$choixInstru );
	
	/* execution de la requete préparée plus haut */
	$prepar_inst->execute ($nouvelles_valeurs);
	
	/* mise à 1 du flag  */
	$_SESSION ['flag_requete_update_instrument']= 1;
	
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
