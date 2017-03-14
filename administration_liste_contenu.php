<!DOCTYPE html>
<html lang="fr-fr">

<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>

<!-- ======================================================= -->
<head>

	<meta charset="UTF-8" lang="fr"/>
	<meta name="description"  content="Contenus administrables">

	<link rel="icon" href="icone.ico" />

	<title> | connection </title>
	<link href="./css/soul.css" rel="stylesheet" type="text/css" />
</head>
<!-- ======================================================= -->


<body>


<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Liste administration')?>

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
			WHERE 		mem_persona = 'Gestionaire' 
			AND 		mem_login = '$login' " ;
			
  	$administrateurs= $pdo->query($sql);
	
	/* test de login et mdp */
	if (($administrateur = $administrateurs->fetch() /* verifie que le login est dans la base */) 
			& 
		 ( password_verify ($mdp_entre_user,$administrateur['mem_mdp'])/* test du hash */)) 
		{
	
  			 /*echo ('log de session: '.$_SESSION['login']); test*/?>

 			

  
    	<span id="administration"> 

			<H2><?php echo 'Bienvenue '.$administrateur['mem_prenom'].'<br> alias '.$login.'.';
				$_SESSION['vientDeAdminContenu']=1; ?> </H2>
  		 		
  			<p>Attention, toute modification influe sur le contenu de la base de donnée...</br>
  		Soyez sûr de ce que vous faites.</p>
  		

		</span>
		<?php 
		
		}

	else {	?>
	<span>
		<H2>Désolé <?php echo ($_SESSION['login']);?>, mot de passe et/ou login incorrect...
		<a href="connection_back_office.php"><img src="./images/boutonRetour.png"></a></H2>
		
	</span>
		
	<?php /* destruction de la session */
	$_SESSION = array();
  	session_destroy();
	}
	?> 


</section>




</body>

</html>
