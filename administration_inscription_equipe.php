<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr-fr">

<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>

<!-- ======================================================= -->
<head>

<meta charset="UTF-8" lang="fr"/>
<meta name="description"  content="Mes repot inscription d'une équipe">

<link rel="icon" href="mesrepos.ico" />

<title>Mes Repos | ajout d'une équipe </title>
<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<!-- ======================================================= -->


<body>
<!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>

<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Page d\'administration</br>Ajout d\'une équipe')?>


<!-- ===================== VISUEL ===================== -->

<section id="centre">
<!-- ===================== MENU ===================== -->
	<?php include("includes/menu.php");  ?>
<!-- ================================================ -->

	<section id="accrocheValidation">

  	<p> Vous devez selectionner l'équipe dans la page de modification pour l'instruire, merci.</p>
  	<?php /*recupération en POST des données à transmettre pour la connection à la bd */
  	 /*echo ('log de session: '.$_SESSION['login']); test*/
  	
 if ( isset($_SESSION['login'])) {


 			$recup_contact_id = $_POST ['selection_id'];
 			echo $recup_contact_id;

 			$sql_recup_champs_equipe =" SELECT contact_login_souhait,
 											contact_email, contact_nom
 										FROM  contact 
 										WHERE contact_id = $recup_contact_id ;";



 				$champs = $pdo->query($sql_recup_champs_equipe) ;

				while ( $champ = $champs->fetch()) {
					$equipe_login= $champ['contact_login_souhait'];
					$equipe_responsable=$champ['contact_nom'];
					$equipe_mail=$champ['contact_email'];
 						}
 					echo ("Une équipe est créée avec ces champs: <br/>");
					echo "equipe_login: ".$equipe_login."<br/>";
					echo "equipe_mdp: TODO<br/>";
					echo "equipe_nom: TODO<br/>";
					echo "equipe_entreprise: TODO<br/>";
					echo "equipe_responsable: ".$equipe_responsable."<br/>";
					echo "equipe_mail: ".$equipe_mail."<br/>";
					echo "equipe_logo: TODO<br/>";
					echo "equipe_visible: 1";

					
				 

 		?>
				
				</br>


			<?php


			/* flag qui évite d'actualiser la requete sur la même page */
			 if ($_SESSION ['flag_requete_ajout_equipe']==0 ) {
			
			/*--------INSERTION EN BD -----------------*/
			
			$sql_ajout_equipe = "INSERT INTO 	equipe
									( equipe_login, equipe_responsable, equipe_mail, equipe_visible  )
									VALUE (?,?,?, ? ) " ;
					
		  	/* requete préparée */
		  	$prepar_equipe = $pdo->prepare($sql_ajout_equipe);
		  	$nouvelles_valeurs= array ($equipe_login, $equipe_responsable, $equipe_mail, 1 );
			
			/* execution de la requete préparée plus haut */
			$prepar_equipe -> execute ($nouvelles_valeurs);
			
			/* mise à 1 du flag  */
			$_SESSION ['flag_requete_ajout_equipe']= 1;?>

		<!-- ========================bouton retour ===========================  -->
		<p><a href="backoffice.php"><img src="./images/boutons/retour.png"></a><p>
		<!-- ==================================================================  -->
		<?php
	
	}
	else
			{
			echo ('Votre requète a déjà été enregistrée...inutile d\'insister');}




			}

  	else 	{ ?>
  	<H2>Vous n'êtes plus connectés.</H2>
  	<p><a href="connection-back-office.php"><img src="./images/boutonRetour.png"></a><p>
  	 
  	 
  	<?php	}  ?>

	</section>
</section> 

<!-- ===================== BAS DE PAGE  ===================== -->
<?php include("includes/basDePage.php"); ?>
</body>

</html>
