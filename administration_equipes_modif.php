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
						WHERE 		equipe_id = '$choixEquipe' " ;
			
  	$equipes= $pdo->query($sql_equipe); ?>
 	

  	
	<?php
	/* test de login et mdp */
	if ($equipe = $equipes->fetch()) {
	
  			 /*echo ('membre: '.$equipe['mem_prenom']); test*/?>
  
    <span id="administration"> 

		<?php echo (' id choix equipe: '. $choixEquipe.'<br/>------------'); ?>

		<H2><?php echo ('Modification de l\'équipe: <br/>'.$equipe['equipe_nom'].
		'<br/> login: '.$equipe['equipe_login'].'<br/> (id '.$equipe['equipe_id'].')');?><br> 
		
			<?php	$_SESSION['vientDeBackoffice']=1;
					$_SESSION ['flag_requete_update_equipe']=0 ?> </H2>

<!-- ==================================================================  -->
<!-- bouton de retour au choix d'administration -->
<p><a href="backoffice.php"><img src="./images/boutons/retour.png"></a><p>
<!-- ==================================================================  -->

  		 		
  		<p>Attention, toute modification influe sur le contenu de la base de donnée...</br>
  		Soyez sûr de ce que vous faites.</p>
  		
  	<form name="modifEquipe"  method="POST" action="./administration_equipes_modif_validation.php" >
  	
  		<table id="tableau_messages">
			<tr>
				
				<th>equipe_id</th>
				<td><?php echo ($equipe['equipe_id']); ?></td>	
			</tr>
				
			<tr>
				<th>equipe_nom</th>
				<td>
					<input type="textarea" maxlengthid="200"
					name="equipe_nom" 
					value="<?php echo ($equipe['equipe_nom']); ?>">
				</td>
			</tr>

			<tr>
				<th>equipe_entreprise</th>
				<td>
					<input type="textarea" maxlengthid="200"
					name="equipe_entreprise" 
					value="<?php echo ($equipe['equipe_entreprise']); ?>">
				</td>
			</tr>

			<tr>
				<th>equipe_responsable</th>
				<td>
					<input type="textarea" maxlengthid="30"
					name="equipe_responsable" 
					value="<?php echo ($equipe['equipe_responsable']); ?>">
				</td>
			</tr>

			<tr>
				<th>equipe_mail</th>
				<td>
					<input type="email" maxlengthid="100"
					name="equipe_mail" 
					value="<?php echo ($equipe['equipe_mail']); ?>">
				</td>
			</tr>

			<tr>
				<th>equipe_logo</th>
				<td>
					<input type="textarea" maxlengthid="300"
					name="equipe_logo" 
					value="<?php echo ($equipe['equipe_logo']); ?>">
				</td>
			</tr>

			<tr>
				<th>equipe_visible ?</th>
				<td>
					<input type="radio" 
					name="equipe_visible" 
					value="1" 
						<?php if ($equipe['equipe_visible']==1){
							echo "checked";
						} ?>
					> oui
					

				</td>
				<td>
					<input type="radio" 
					name="equipe_visible" 
					value="0" 
						<?php if ($equipe['equipe_visible']==0){
							echo "checked";
						} ?>
					> non
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
