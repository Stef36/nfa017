<!--==================COMMENT CREER UNE EQUIPE====================-->


<?php  


// si une équipe est connectée-------------------------------
if (isset($_SESSION['ticket_equipe'])) {
	# code...
	if ($_SESSION['equipe_logo']!=''){ ?>
							<!-- affiche le logo via la fonction afficher_suivant_mime() -->
						<?php
							afficher_suivant_mime($_SESSION['equipe_logo'],$_SESSION['equipe_entreprise'] , NULL, 'logo_equipe', NULL );

						} else afficher_suivant_mime("./logos/Dom.jpg","MesRepos" , NULL, 'logo_equipe', NULL );
}



// si aucune équipe n'est connectée-------------------------------

else {
 ?>
	<h2>EQUIPES</h2>

<p>equipe-presentation</p> <?php

}


?>




