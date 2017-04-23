<?php  // mise en BD des modifications faites en "inscription_personnel.inc.php"


	// echo "<br>DANS VALID<br>";

		

	if ( (isset($_POST['valid_modif_employe']))
		&
		(!isset($valid_modif_employe))
		 ) {

		if (isset($_SESSION['id_selection_employe'])) {
			
			echo $_SESSION['id_selection_employe']."<br>";
		}
		

		$valid_modif_employe=$_POST['valid_modif_employe'];

		echo "modifications en préparation...<br/>";


		// recupe des POSTS
		$employe_login=$_POST['employe_login'];
		$employe_mdp=$_POST['employe_mdp'];
		$employe_nom=$_POST['employe_nom'];
		$employe_prenom=$_POST['employe_prenom'];

		if (isset($_POST['employe_mail'])) {
			$employe_mail=$_POST['employe_mail'];
		} else $employe_mail='';
		

		if (isset($_POST['employe_commentaire'])) {
			
			$employe_commentaire=$_POST['employe_commentaire'];
		} else $employe_commentaire='';
			
		if (isset($_POST['employe_visible'])) {
			$employe_visible=$_POST['employe_visible'];
		} else $employe_visible=0;

		if (isset($_POST['employe_actif'])) {
			$employe_actif=$_POST['employe_actif'];
		} else $employe_actif=0;

		if (isset($_POST['employe_logo'])) {
			$employe_logo=$_POST['employe_logo'];
		} else $employe_logo='';
		
		$equipe_id=$_SESSION['equipe_id'];
		
		if (
			(isset($_SESSION['id_selection_employe']))
			AND
			($_SESSION['id_selection_employe']!=''))
			 {

			$employe_id=$_SESSION['id_selection_employe'];

			$sql_modif_employe="	UPDATE	employe
									SET employe_login=?,employe_mdp=?,
									employe_nom=?, employe_prenom=?,
									employe_mail=?, employe_commentaire=?, employe_visible=?,
									employe_actif=?,employe_logo=?,
									equipe_id=?
									WHERE employe_id = ? ";

		}

		else { $employe_id='';

				$sql_modif_employe="	INSERT INTO	employe
									SET employe_login=?,employe_mdp=?,
									employe_nom=?, employe_prenom=?,
									employe_mail=?, employe_commentaire=?, employe_visible=?,
									employe_actif=?,employe_logo=?,
									equipe_id=?, employe_id = ? ";
		};

		


		
		

	  	/* requete préparée */
	  	$modif_employe = $pdo->prepare($sql_modif_employe);

	  	// prepare le tableau des valeurs à updater
		$nouvelles_valeurs = array ($employe_login, $employe_mdp,$employe_nom, $employe_prenom, $employe_mail,$employe_commentaire, $employe_visible, $employe_actif,$employe_logo, $equipe_id, $employe_id );

		/* execution de la requete préparée plus haut */
		$modif_employe->execute ($nouvelles_valeurs);

		echo "modifications ou nouvel employé VALIDES<br/>";

		$valid_modif_employe=1;

	}

	else echo "<br/>-----  AUCUN CHANGEMENT EN BD  ------<br/>";







 ?>