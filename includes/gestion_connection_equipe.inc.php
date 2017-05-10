<?php  session_start();

		// ================ Connection bdd via PDO ================
 		include("./includes/connection.php"); 
		require('./includes/fonctions_utiles.php');//pour affichage des logos
		// gestion de la connection


	// si on tente de se connecter via le log équipe------------------

	if (isset($_POST['login_equipe'])) {

		$log=$_POST['login_equipe'];
		$mdp=$_POST['equipe-passwd'];

		// test login 
		$sql_log_equipe = "SELECT equipe_id, equipe_login, equipe_mdp, 									equipe_nom, equipe_entreprise, equipe_responsable, equipe_mail, equipe_logo, equipe_visible
							FROM 		equipe ;" ;
		
		$log_equipes= $pdo->query($sql_log_equipe);

			//parcours la table des logs equipe
			while ( $log_equipe=$log_equipes->fetch()) {

				if (
					($log_equipe['equipe_login']==$log)
					&
					($log_equipe['equipe_mdp']==$mdp)
					& 
					($log_equipe['equipe_mdp']!='')
					&
					($log_equipe['equipe_visible'])
					) {

					$_SESSION['ticket_equipe']=1;
					$_SESSION['equipe_id']=$log_equipe['equipe_id'];
					$_SESSION['equipe_login']=$log_equipe['equipe_login'];
					$_SESSION['equipe_nom']=$log_equipe['equipe_nom'];
					$_SESSION['equipe_entreprise']=$log_equipe['equipe_entreprise'];
					$_SESSION['equipe_responsable']=$log_equipe['equipe_responsable'];
					$_SESSION['equipe_mail']=$log_equipe['equipe_mail'];
					$_SESSION['equipe_logo']=$log_equipe['equipe_logo'];



					//echo '<p>OK équipe: '.$log_equipe['equipe_login'];'</p>';
					}
				
			}

		}


	// si on tente de se déconnecter via le log équipe------------------

		if (isset($_POST['deconnecter_equipe'])) {
			if ($_POST['deconnecter_equipe']=='OK') {

				// fermeture de session
 
  				$_SESSION = array();
  				session_destroy();
			}
		};


 ?>