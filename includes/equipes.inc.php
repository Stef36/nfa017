<!--==================COMMENT CREER UNE EQUIPE====================-->





<?php

	// si la connection du chef d'équipe n'est pas active
	if ( !isset($_SESSION['ticket_equipe']) OR ($_SESSION['ticket_equipe'])==0)
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


	// si l'équipe est loggée
	elseif ($_SESSION['ticket_equipe']==1)
		 {

		 	?><h2>Votre équipe est constituée des personnes:</h2> <?php

		 	$equipe_id=$_SESSION['equipe_id'];

		 	$sqlEmployeEquipe = "SELECT employe_nom, employe_prenom, employe_commentaire
		 						FROM employe
		 						WHERE equipe_id = '$equipe_id' ;";

		 	$employesDeLequipe = $pdo -> query($sqlEmployeEquipe);

		 	while ($employeDeLequipe = $employesDeLequipe->fetch()) { ?>

		 		<H3> <?php

		 		echo $employeDeLequipe['employe_prenom'].' '.$employeDeLequipe['employe_nom']; ?>
		 		</H3> 

		 		<p>	<?php
		 		echo $employeDeLequipe['employe_commentaire']; ?>
		 			

		 		</p> <?php


		 	
		 	}


		 	}?>

