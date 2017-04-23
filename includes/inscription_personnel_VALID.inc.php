<?php  // mise en BD des modifications faites en "inscription_personnel.inc.php"


	echo "<br>DANS VALID<br>";

	echo $_SESSION['id_selection_employe']."<br>";	

	if (isset($_POST['valid_modif_employe'])
		&
		!isset($valid_modif_employe) ) {



		$valid_modif_employe=$_POST['valid_modif_employe'];
		echo $_SESSION['id_selection_employe'];
		echo "modif bientôt FAITES<br/>";


		// recupe des POSTS
		$employe_login=$_POST['employe_login'];
		$employe_mdp=$_POST['employe_mdp'];
		$employe_nom=$_POST['employe_nom'];
		$employe_prenom=$_POST['employe_prenom'];
		$employe_mail=$_POST['employe_mail'];
		$employe_commentaire=$_POST['employe_commentaire'];	
		$employe_visible=$_POST['employe_visible'];
		$employe_actif=$_POST['employe_actif'];
		$employe_logo=$_POST['employe_logo'];

		$employe_id=$_SESSION['id_selection_employe'];



		$sql_modif_employe="	UPDATE 	employe
								SET employe_login=?,employe_mdp=?,
								employe_nom=?, employe_prenom=?,
								employe_mail=?, employe_commentaire=?, employe_visible=?,
								employe_actif=?,employe_logo=?
								WHERE employe_id = ? ";

	  	/* requete préparée */
	  	$modif_employe = $pdo->prepare($sql_modif_employe);

	  	// prepare le tableau des valeurs à updater
		$nouvelles_valeurs = array ($employe_login, $employe_mdp,$employe_nom, $employe_prenom, $employe_mail,$employe_commentaire, $employe_visible, $employe_actif,$employe_logo, $employe_id  );

		/* execution de la requete préparée plus haut */
		$modif_employe->execute ($nouvelles_valeurs);

		echo "modif FAITES<br/>";

		$valid_modif_employe=1;

	}

	else echo "-----  AUCUN CHANGEMENT EN BD  ------<br>";







 ?>