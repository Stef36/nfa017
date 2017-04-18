<?php  Session_start();

		// ================ Connection bdd via PDO ================
 		include("./includes/connection.php"); 

		// gestion de la connection


	// si on tente de se connecter via le log équipe------------------

	if (isset($_POST['login_equipe'])) {

		$log=$_POST['login_equipe'];
		$mdp=$_POST['equipe-passwd'];

		// test login 
		$sql_log_equipe = "SELECT equipe_id, equipe_login, equipe_mdp
							FROM 		equipe ;" ;
		
		$log_equipes= $pdo->query($sql_log_equipe);

		//parcours la table des logs equipe
		while ( $log_equipe=$log_equipes->fetch()) {

			if (
				($log_equipe['equipe_login']==$log)
				&
				($log_equipe['equipe_mdp']==$mdp)
				) {
				# code...
				$_SESSION['equipe_id']=$log_equipe;
				$_SESSION['ticket_equipe']=1;
				echo '<p>OK équipe: '.$log_equipe['equipe_login'];'</p>';
			}
			
		}

		}


	// si on tente de se déconnecter via le log équipe------------------

		if (isset($_POST['deconnecter_equipe'])) {
			if ($_POST['deconnecter_equipe']=='OK') {

				// fermeture de session
				//session_start(); 
  				$_SESSION = array();
  				session_destroy();
			}
		};


 ?>