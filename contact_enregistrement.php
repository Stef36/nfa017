<?php 	/* si une ou aucune donnée du formulaire n'a été entrée 
				(on arrive direct sur la page) */
	
if ( 	!isset($_POST['nom']) || $_POST['nom']=='' || 
				!isset($_POST['prenom']) ||
				!isset($_POST['monMail']) || $_POST['monMail']=='' ||	
				!isset($_POST['monTel']) || $_POST['monTel']=='' ||
				!isset($_POST['CHOIX']) || $_POST['CHOIX']=='' ||
				!isset($_POST['rem']) || $_POST['rem']=='' ||
				!isset($_POST['ip']) || $_POST['ip']=='' ) 
		
		{ 
			// tempo 3 secondes
			sleep (2);
			// redirection
			header('Location: ./contact.php');
  		// on ne charge pas le code suivant
			exit();
			
		}
?>

<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
<head>

<meta charset="UTF-8" lang="fr"/>
<meta name="description"  content="Mes Repos contact confirmation" >

<link rel="icon" href="soullat2.ico" />

<title>MesRepos | Formulaire_renseignement  </title>
<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<!-- ======================================================= -->


<body>



<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Contact</br>Mes Repos')?>

<!-- ======================================================= -->

<section id="accrocheAccueuil">
    <H3>Merci d'avoir rempli le formulaire.</H3>
    <p>Nous vous contactons au plus vite. </p>


</section>
<!-- ===================== VISUEL ===================== -->

<section id="centre">
	<!-- ===================== MENU ===================== -->
	<?php include("includes/menu.php"); ?>

  	<!-- =========================== Resultat ici ========================= -->
	<div>

	<?php
	

	 	

	/* si les données du formulaire ne sont pas déjà entrées en BD */
	if( !isset($_SESSION['formulaire_entreeBD']) || $_SESSION['formulaire_entreeBD']== 0 ) 
		
		{ 
		/* mise à 1 de l'indicateur d'entrée des données du formulaire en BD */
		$_SESSION['formulaire_entreeBD']=1;

		/* securite par fonction ET htmlentities */
		require "./includes/securit_donnees.inc.php";
		$nom=htmlentities($_POST['nom']);
		$prenom=htmlentities($_POST['prenom']);
		$monMail=htmlentities($_POST['monMail']);
		/* mise au format string du no de télephone, afin de récuperer l'éventuel 0 du début  */
		$monTel= htmlentities((string)$_POST['monTel']);
		$choix=htmlentities($_POST['CHOIX']);
		$message=htmlentities($_POST['rem']);	
		
		// adresse IP que verra l'internaute sur la page contact.php
		$IPpost= htmlentities($_POST['ip']) ;



		//va chercher la fonction get_ip()
		require "./includes/adresse_IP.php"; 
	 
		// Ajouter l'adresse IP à partir de cette page pour enregistrer en BD
		$adresseIP = 'Post: '.$IPpost.'<br/>Verification:<br/>'.get_ip();
		
		/*recupération de la date et de l'heure*/
		$contact_dateTime = date('Y-m-d H:i:s');?>
	
	<!-- ========================= Affichage comptre rendu du message ===================== -->
		<H2>Merci M/Mme <?php echo($prenom.' '.$nom);?></H2>
		
		<p>Date et heure d'enregistrement de votre message </br>
		<?php echo ($contact_dateTime); ?></p>

		<H2>Vos coordonnées: </H2>
		
		<p>
		<table id="tableau_messages">
			<tr>
				<td>Votre mail</td>
				<td>Votre télephone</td>
				<td>Votre adresse IP</td>
			</tr>
			<tr>
				<td><?php echo ($monMail);?></td>
				<td><?php echo ($monTel);?></td>
				<td><?php echo ($IPpost);?></td>
			</tr>
		</table>
		</p>
		
		<H2>Votre missive: </H2>
		<p>
		<table id="tableau_messages">
			<tr>
				<td>Objet du message</td>
				<td>Votre message</td>
			</tr>
			<tr>
				<td><?php echo ($choix);?></td>
				<td><?php echo ($message);?></td>
			</tr>
		</table>
		</p>		
		
		
		
		
		<!-- ================ Connection bdd via PDO ================ -->
		<?php include("includes/connection.php"); ?>	


		<?php 
		
		/* requète d'insertion préparée du message dans la bd */
		$sqlInsertionMessage= 
		"INSERT INTO contact (contact_nom, contact_prenom, contact_email,
		 contact_telephone, contact_objet, contact_message, contact_dateTime, 
			contact_adresseIP)
				VALUES (?,?,?,?,?,?,?,?)";


		/* insertion via pdo */	
		$stmt=$pdo->prepare($sqlInsertionMessage);
		$nouveau_message=array($nom,$prenom,$monMail,$monTel,$choix,$message,$contact_dateTime,$adresseIP);
		$stmt->execute($nouveau_message);

		/* affichage du message de l'heure d'enregistrement */
		?>
		<p>
		<?php 
		echo ('Votre message a été enregistré en base de donnée le '.
		date('d/m/Y').' à '.date('H').'h'.date('i').'min et '.date('s').' s</br>');		
		?>
		</p>
		<?php 


			/* envoi d'un mail de signalement d'un nouveau message au webmaster */
			$dest= 'minique.duf@gmail.com';//
			$sujet= "Nouveau message posté sur le site mesrepos.domduf.com";
			$misEnFormeMessage = wordwrap($message, 70, "\r\n");
			
			$corp="<H4>Message de Monsieur ou Madame<br> --- ".$prenom." ".$nom."---</H4>
					<H5>Adresse Mail: <a href=\"mailto:".$monMail."\">$monMail</a></H5>".
					"<H5>adresse IP: ".$adresseIP."</H5>".
					"<H5>Tel: ".$monTel."</H5><H6>Sujet: ".$choix."</H6><p>Voici le texte: <br>".$misEnFormeMessage."<p>";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
     		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			mail($dest,$sujet,$corp,$headers);
			
		}
		

		/* si les données du formulaire  sont pas déjà entrées en BD */
	else {?>
			<p>
			<?php 

				echo('Vous devez remplir un autre formulaire, celui ci est déjà enregistré en base de données, merci.');?>
			</p>

			<p><a href="contact.php"><img src="./images/boutonRetour.png"></a> au formulaire de contact.</p>

			<?php
		}
		?>

	</div>

</section>


<!-- ===================== BAS DE PAGE  ===================== -->
<?php include("includes/basDePage.php"); ?>

<!-- ============= Appels de scripts JS ================== 
<script src='./javascripts/localisation.js' type = 'text/javascript' ></script>-->


</body>

</html>
