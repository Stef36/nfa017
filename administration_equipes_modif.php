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
	<link href="./css/soul.css" rel="stylesheet" type="text/css" />
</head>
<!-- ======================================================= -->


<body>




<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Administration </br>modif. d\'une équipe')?>


<!-- ===================== VISUEL ===================== -->

<section id="centre">
<!-- ===================== pas de MENU ===================== -->
	
  <!-- ===============Requete SQL selection du membre ==================== -->

  	<?php /*recupération en POST des données à transmettre pour la connection à la bd */
  	 
  	 
  	if ( isset($_SESSION['login'])) {
  	
 	$choixInstru=$_POST ['choixInstru'];
 	$_SESSION['choixInstru']=$choixInstru;

  	$login=$_SESSION['login'];
  	$mdp=$_SESSION['mdp'];
  	
  	$sql_instru = "	SELECT 		*
						FROM 		instrument
						WHERE 		inst_id= '$choixInstru' " ;
			
  	$instruments= $pdo->query($sql_instru); ?>
 	

  	
	<?php
	/* test de login et mdp */
	if ($instrument = $instruments->fetch()) {
	
  			 /*echo ('membre: '.$instrument['mem_prenom']); test*/?>
  
    <span id="administration"> 
		<?php echo (' id choix instrument: '. $choixInstru); ?>
		<H2><?php echo ('Modification de l\'instrument '.$instrument['inst_nom'].' type '.$instrument['inst_type'].' (id '.$instrument['inst_id'].')');?><br> 
		
			<?php	$_SESSION['vientDeAdminContenu']=1;
					$_SESSION ['flag_requete_update_instrument']=0 ?> </H2>

<!-- ==================================================================  -->
<p><a href="administration_liste_contenu.php"><img src="./images/boutonRetour.png"></a><p>
<!-- ==================================================================  -->

  		 		
  		<p>Attention, toute modification influe sur le contenu de la base de donnée...</br>
  		Soyez sûr de ce que vous faites.</p>
  		
  	<form name="modifInstrument"  method="POST" action="./administration_modif_instrument_validation.php" >
  	
  		<table id="tableau_messages">
			<tr>
				
				<th>inst_id</th>
				<td><?php echo ($instrument['inst_id']); ?></td>	
			</tr>
				
			<tr>
				<th>inst_nom</th>
				<td>
				<select name="inst_nom" id ="inst_nom">
		 			<?php 

					/* tableau des choix de nom d'instrument */
					
					$choix = array('chant','flûte','clarinette','saxophone','trompette','trombone',
									'tuba','guitare','basse','batterie','percussions','piano / orgue',
									'autre','sans');
					
 
					foreach ($choix as $choi) {	 ?>
							<option value="<?php echo ($choi); ?>" 
									<?php 
										if ($choi == $instrument['inst_nom']) { ?>
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
					<th>inst_type</th>
					<td>
					<input type="text" 
		   				 name="inst_type" value="<?php echo ($instrument['inst_type']); ?>" 
		    id="inst_type"/>
					</td>
			</tr>	
				
			<tr>
					<th>inst_marque</th>
					<td>
					<input type="text" 
		   				 name="inst_marque" value="<?php echo ($instrument['inst_marque']); ?>" 
		    id="inst_marque"/>
					</td>
			</tr>

	
			<tr>
					<th>inst_no_serie</th>
					<td>
					<input type="text" 
		   				 name="inst_no_serie" value="<?php echo ($instrument['inst_no_serie']); ?>" 
		    id="inst_no_serie"/>
					</td>
			</tr>	
					
  		</table>
  		
  		<input type="submit" name="submit" value="Modifier je suis sûr de tout..." />
  		
  	</form>

<!-- ==================================================================  -->
<p><a href="administration_liste_contenu.php"><img src="./images/boutonRetour.png"></a><p>
<!-- ==================================================================  -->

  		
	</span>
	
	<?php 
		
	}
	
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



<!-- ===================== BAS DE PAGE  ===================== -->
<?php include("includes/basDePage.php"); ?>
</body>

</html>
