<!--==================COMMENT CREER UNE EQUIPE====================-->


<?php

	// si la connection du chef d'équipe n'est pas active
	if ( !isset($_SESSION['ticket_equipe']) OR ($_SESSION['ticket_equipe'])==0)
	{

     include("includes/affichage_liste_et_logos_des_equipes.inc.php");


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

