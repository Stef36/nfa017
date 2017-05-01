<!--==================COMMENT CREER UNE EQUIPE====================-->





<?php

	// si la connection du chef d'équipe n'est pas active
	if ( !isset($_SESSION['ticket_employe']) OR ($_SESSION['ticket_employe'])==0)
	{

	?><h2>Les équipes qui nous font confiance:</h2> <?php

	$sqlequipe = "SELECT 		equipe_id, equipe_visible,
								equipe_login, equipe_nom, equipe_entreprise,
								equipe_responsable,
								equipe_mail, equipe_logo
							
					FROM 		equipe 
					ORDER BY    equipe_visible DESC ;" ;
		
		$equipes= $pdo->query($sqlequipe);


		while ($equipe = $equipes->fetch()) {
			// affichage des logos des équipes


			if (($equipe['equipe_visible']==TRUE) )  {?>
						<!-- affiche le nom de l'équipe -->
						<p><?php echo $equipe['equipe_nom']; ?></p>
						<?php
						if ($equipe['equipe_logo']!=''){ ?>
							<!-- affiche le logo via la fonction afficher_suivant_mime() -->
						<?php
						afficher_suivant_mime($equipe['equipe_logo'],$equipe['equipe_entreprise'] , NULL, 'logo_equipe', NULL );

						} else afficher_suivant_mime("./logos/Dom.jpg","MesRepos" , NULL, 'logo_equipe', NULL );
						
					}
			}

	
	}


	// si l'employé est loggée
	elseif ($_SESSION['ticket_employe']==1)
		 {
			$employe_id= $_SESSION['employe_id'];
		 	echo "Employe-id: ".$employe_id;

		 	?><h2>Votre fiche employé:</h2> <?php

		 	


		 	$sqlDecritEmploye = "SELECT employe_id, employe_login, employe_mdp, 									employe_nom, employe_prenom, employe_mail, employe_commentaire, employe_visible, employe_actif,  employe_logo, equipe_id
							FROM 		employe
							WHERE  employe_id='$employe_id';";



		 	$fichesEmploye = $pdo -> query($sqlDecritEmploye);

		 	while ($ficheEmploye = $fichesEmploye->fetch()) { ?>

		 		<H3> <?php

		 		echo $ficheEmploye['employe_prenom'].' '.$ficheEmploye['employe_nom']; ?>
		 		</H3> 

		 		<p>	<?php
		 		echo $ficheEmploye['employe_commentaire']; ?>
		 			

		 		</p> <?php


		 	
		 	}


		 	}?>

