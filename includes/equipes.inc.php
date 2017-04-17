<!--==================COMMENT CREER UNE EQUIPE====================-->
<h2>EQUIPES</h2>

<p>Affichage des équipes</p>


<?php

	// si la connection du chef d'équipe n'est pas active
	if ( !isset($ticket_equipe) OR $ticket_equipe==0)
	{
			include("./includes/connection.php"); 
	require('./includes/fonctions_utiles.php');//pour affichage des logos


	$sqlequipe = "SELECT 		equipe_id, equipe_visible,
								equipe_login, equipe_nom, equipe_entreprise,
								equipe_responsable,
								equipe_mail, equipe_logo
							
					FROM 		equipe 
					ORDER BY    equipe_visible DESC ;" ;
		
		$equipes= $pdo->query($sqlequipe);


		while ($equipe = $equipes->fetch()) {
			// affichage des logos des équipes


			if (($equipe['equipe_visible']==TRUE) & ($equipe['equipe_logo']!='') ) {?>
						<!-- affiche le nom de l'équipe -->
						<p><?php echo $equipe['equipe_nom']; ?></p>

						<!-- affiche le logo via la fonction afficher_suivant_mime() -->
						<?php
						afficher_suivant_mime($equipe['equipe_logo'],$equipe['equipe_entreprise'] , NULL, 'logo_equipe', NULL );
					}
			}

	
	}

	elseif ($ticket_equipe==1)
		 {
		 	}?>

