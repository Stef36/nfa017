<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr-fr">

<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>

<!-- ======================================================= -->
<head>

    <meta charset="UTF-8" lang="fr"/>
    <meta name="description"  content="Contenus administrables">

    <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">


	<title>Mes Repos | BackOffice </title>
	<link href="./css/style.css" rel="stylesheet" type="text/css" />

</head>
<!-- ======================================================= -->


<body>
<!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>

<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Liste administration')?>


<!-- ===================== MENU ===================== -->
<?php include("includes/menu.php"); ?>



<!-- ===================== VISUEL ===================== -->

<section id="centre">


 	
  	<?php /*recupération en POST des données à transmettre pour la connection à la bd */
  	
  	if (!isset($_SESSION['login'])){ /*init des variables de session*/
  	
  			$_SESSION['login']=htmlentities($_POST ['user-name'],ENT_QUOTES); 
  			$_SESSION['mdp']=htmlentities($_POST ['user-passwd'],ENT_QUOTES); 
  	}
  	
 	
  	$login=$_SESSION['login'];
  	$mdp_entre_user=$_SESSION['mdp'];
  	
  	$sql = "SELECT 		mem_prenom, mem_login, mem_mdp
			FROM 		membre 
			WHERE 		mem_persona = 'Gestionnaire' 
			AND 		mem_login = '$login' " ;
			
  	$administrateurs= $pdo->query($sql);
	
	/* test de login et mdp */
	if (($administrateur = $administrateurs->fetch()) 
		/* verifie que le login est dans la base */ 
			& 
		 ( password_verify ($mdp_entre_user,$administrateur['mem_mdp'])
		 	/* test du hash */)) 
		{

			$_SESSION['ticket']=true;
	
  			 /*echo ('log de session: '.$_SESSION['login']); test*/?>

 			

  		<!-- =================   SECTION AUTORISEE ADMINISTRATION  ===================== -->

    	<span id="administration"> 

			<H2><?php echo 'Bienvenue '.$administrateur['mem_prenom'].'<br> alias '.$login.'.';
				$_SESSION['vientDeBackoffice']=1; ?> </H2>
  		 		
  			<p>Attention, toute modification influe sur le contenu de la base de donnée...</br>
  		Soyez sûr de ce que vous faites.</p>

		</span>



			<form name="form_liste_contenu" method="POST" action="./administration_page.php">
			  			
			  	<table>	

			  		<tr>
			        	<th>Votre choix: ?</th>
			        		<td>
								<input type="radio" name="rad-1" id="messages" checked="checked" value="messages" />Consultation des messages d' internautes.<br />

								<input type="radio" name="rad-1" id="membres"  value="membres" />Membres<br />


                      			<input type="radio" name="rad-1" id="visualiser-equipe"  value="visualiser-equipe" />Visualiser la liste des équipes.<br />

                      			<!-- OPTION inutile, inscription via formulaire

			             		<input type="radio" name="rad-1" id="inscrire-equipe"  value="inscrire-equipe" />Inscrire une équipe.<br />
			             		 -->


			             	</td>

			      	</tr>

			      	<tr>
			        	<th>C'est parti mon kiki</th>
			        	
			        	<td><input type="submit" name="soumission" id="soumission" value="Soumettre" />
			        	</td>
			      	</tr>

			  	</table>

			</form>



		<?php 
		
		}

	// si la connection a échoué



	else {	$_SESSION['ticket']=false; ?>

	<!-- =================   SECTION NON AUTORISEE ADMINISTRATION  ===================== -->
	<span>
		<H2>Désolé <?php echo ($_SESSION['login']);?>, mot de passe et/ou login incorrect...
		<a href="connection_back_office.php"><img src="./images/boutonRetour.png"></a></H2>
		
	</span>
	

	<?php 
	
	// destruction de la session 
	$_SESSION = array();
  	session_destroy();
	}
	?> 


</section>




</body>

</html>
