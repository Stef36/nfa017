<?php  Session_start();

		// ================ Connection bdd via PDO ================
 		include("./includes/connection.php"); 
		require('./includes/fonctions_utiles.php');//pour affichage des logos
		// gestion de la connection


	// si on tente de se connecter via le log employe------------------

	if (isset($_POST['login_employe'])) {

		$log=$_POST['login_employe'];
		$mdp=$_POST['employe-passwd'];

		// test login 
		$sql_log_employe = "SELECT employe_id, employe_login, employe_mdp, 									employe_nom, employe_prenom, employe_mail, employe_commentaire, employe_visible, employe_actif,  employe_logo, equipe_id
							FROM 		employe ;" ;
		
		$log_employes= $pdo->query($sql_log_employe);

			//parcours la table des logs employe
			while ( $log_employe=$log_employes->fetch()) {

				if (
					($log_employe['employe_login']==$log)
					&
					($log_employe['employe_mdp']==$mdp)
					& 
					($log_employe['employe_mdp']!='')
					&
					($log_employe['employe_visible'])
					) {

					$_SESSION['ticket_employe']=1;
					$_SESSION['employe_id']=$log_employe['employe_id'];
					$_SESSION['employe_login']=$log_employe['employe_login'];
					$_SESSION['employe_nom']=$log_employe['employe_nom'];
					$_SESSION['employe_mail']=$log_employe['employe_mail'];
					$_SESSION['employe_logo']=$log_employe['employe_logo'];



					//echo '<p>OK équipe: '.$log_employe['employe_login'];'</p>';
					}
				
			}

		}


	// si on tente de se déconnecter via le log équipe------------------

		if (isset($_POST['deconnecter_employe'])) {
			if ($_POST['deconnecter_employe']=='OK') {

				// fermeture de session
 
  				$_SESSION = array();
  				session_destroy();
			}
		};


 ?>