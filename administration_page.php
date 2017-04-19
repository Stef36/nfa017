<?php Session_start()?>
<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>

<!-- ======================================================= -->
<head>

  <meta charset="UTF-8" lang="fr">
  <meta name="description"  content="liens contenus administrables">

  <link rel="icon" href="soullat2.ico" />

  <title>Mes Repos | Administration </title>
  <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<!-- ======================================================= -->


<body>

<?php //include_once("./includes/analyticstracking.inc.php"); ?> 

<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Page d\'administration')?>


<!-- ===================== VISUEL ===================== -->

<section id="centre">
<!-- ===================== MENU ===================== -->
	<?php /*include("includes/menu.php"); */ ?>
<!-- ================================================ -->

  		<section id="administration">

  	
  	<?php /*recupération en POST des données à transmettre pour la connection à la bd */
  	 /*echo ('log de session: '.$_SESSION['login']); test*/
  	
 if ( isset($_SESSION['login'])) {
  	

    if ( $_SESSION['vientDeBackoffice']==1 ){
  	$_SESSION['choix_administration']=$_POST ['rad-1'];}
  	
  	
  	if ($_SESSION['choix_administration'] == 'messages') {

			/*  test de selection ou non de tri */
		if (!isset ($_POST ['tri_messages'])){
		$_SESSION ['ordre_messages'] = 'contact_id DESC';
		}
			else {
			$_SESSION ['ordre_messages'] = ($_POST ['tri_messages'].$_POST ['tri_ordre']);
			}
  		
  		include("./includes/messages_admin.inc.php");
  	
  	}
  	
  	
  	if ($_SESSION['choix_administration'] == 'membres'){
  	
  		include("includes/membres_admin.inc.php");
  	
  	}

    if ($_SESSION['choix_administration'] == 'visualiser-equipe'){
    
      include("includes/visualiser-equipe_admin.inc.php");
    
    }    

  	if ($_SESSION['choix_administration'] == 'inscrire-equipe'){
  	
  		include("includes/inscrire-equipe_admin.inc.php");
  	
  	}?>

    
  	<!-- bouton de retour au choix d'administration -->
<p><a href="backoffice.php"><img src="./images/boutons/retour.png"></a><p>

    <?php
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
