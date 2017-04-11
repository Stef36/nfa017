<?php Session_start()?>

<!DOCTYPE html>
<html lang="fr-fr">

<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>

<!-- ======================================================= -->
<head>

	<meta charset="UTF-8" lang="fr"/>
	<meta name="description"  content="Mes Repos contenus administrables">

	<link rel="icon" href="mesRepos.ico" />

	<title>Mes Repos | modif équipes </title>
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<!-- ======================================================= -->


<body>




<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Administration </br>modification d\'une équipe')?>


<!-- ===================== VISUEL ===================== -->

<section id="centre">
<!-- ===================== pas de MENU ===================== -->
	
  <!-- ===============Requete SQL selection du membre ==================== -->

  	<?php /*recupération en POST des données à transmettre pour la connection à la bd */
  	 
  	 
  	if ( isset($_SESSION['login'])) {
  	
 	$choixEquipe=$_POST ['choixEquipe'];
 	$_SESSION['choixEquipe']=$choixEquipe;

  	$login=$_SESSION['login'];
  	$mdp=$_SESSION['mdp'];
  	
  	$sql_equipe = "	SELECT 		*
						FROM 		equipe
						WHERE 		equipe_id= '$choixEquipe' " ;
			
  	$equipes= $pdo->query($sql_equipe); ?>
 	

  	
	<?php
	/* test de login et mdp */
	if ($equipe = $equipes->fetch()) {
	
  			 /*echo ('membre: '.$equipe['mem_prenom']); test*/?>
  
    <span id="administration"> 

		<?php echo (' id choix equipe: '. $choixEquipe); ?>

		<H2><?php echo ('Modification de l\'equipe: '.$equipe['equipe_nom'].
		'<br/> login '.$equipe['equipe_login'].' (id '.$equipe['equipe_id'].')');?><br> 
		
			<?php	$_SESSION['vientDeBackoffice']=1;
					$_SESSION ['flag_requete_update_equipe']=0 ?> </H2>

<!-- ==================================================================  -->
<!-- bouton de retour au choix d'administration -->
<p><a href="backoffice.php"><img src="./images/boutons/retour.png"></a><p>
<!-- ==================================================================  -->

  		 		
  		<p>Attention, toute modification influe sur le contenu de la base de donnée...</br>
  		Soyez sûr de ce que vous faites.</p>
  		
  	<form name="modifEquipe"  method="POST" action="./administration_modif_equipe_validation.php" >
  	
  		<table id="tableau_messages">
			<tr>
				
				<th>equipe_id</th>
				<td><?php echo ($equipe['equipe_id']); ?></td>	
			</tr>
				
			<tr>
				<th>equipe_nom</th>
				<td>
				<select name="equipe_nom" id ="equipe_nom">
		 			<?php 

					/* tableau des choix de nom d'equipe */
					
					$choix = array('chant','flûte','clarinette','saxophone','trompette','trombone',
									'tuba','guitare','basse','batterie','percussions','piano / orgue',
									'autre','sans');
					
 
					foreach ($choix as $choi) {	 ?>
							<option value="<?php echo ($choi); ?>" 
									<?php 
										if ($choi == $equipe['equipe_nom']) { ?>
										 selected="selected" 
										<?php } ?> 
										><?php
									
							echo ($choi); ?>
							</option>							
							<?php } ?>
				</select>
				</td>
			</tr>



			<tr>
					<th>equipe_type</th>
					<td>
					<input type="text" 
		   				 name="equipe_type" value="<?php echo ($equipe['equipe_type']); ?>" 
		    id="equipe_type"/>
					</td>
			</tr>	
				
			<tr>
					<th>equipe_marque</th>
					<td>
					<input type="text" 
		   				 name="equipe_marque" value="<?php echo ($equipe['equipe_marque']); ?>" 
		    id="equipe_marque"/>
					</td>
			</tr>

	
			<tr>
					<th>equipe_no_serie</th>
					<td>
					<input type="text" 
		   				 name="equipe_no_serie" value="<?php echo ($equipe['equipe_no_serie']); ?>" 
		    id="equipe_no_serie"/>
					</td>
			</tr>	
					
  		</table>
  		
  		<input type="submit" name="submit" value="Modifier je suis sûr de tout..." />
  		
  	</form>

<!-- ==================================================================  -->
<!-- bouton de retour au choix d'administration -->
<p><a href="backoffice.php"><img src="./images/boutons/retour.png"></a><p>
<!-- ==================================================================  -->

  		
	</span>
	
	<?php 
		
	}
	
	}

	else {	?>
	<span>
		<H2>Désolé <?php echo ($_SESSION['login']);?>, mot de passe et/ou login incorrect...

<!-- bouton de retour au choix d'administration -->
<p><a href="backoffice.php"><img src="./images/boutons/retour.png"></a><p>
		
	</span>
		
	<?php /* destruction de la session */
	$_SESSION = array();
  	session_destroy();
	}
	
	
	
	?> 


</section>



<!-- ===================== BAS DE PAGE  ===================== -->
<?php include("includes/basDePage.php"); ?>
</body>

</html>
