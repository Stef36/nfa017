<?php



function applique_requete($sql_modif_employe, $pdo, $nouvelles_valeurs ){
				/* requete préparée */
	  	$modif_employe = $pdo->prepare($sql_modif_employe);

		/* execution de la requete préparée plus haut */
		$modif_employe->execute ($nouvelles_valeurs);

		echo "requête VALIDE<br/>";
		}


function verif_nouvel_employe($employe_login){
	return true;
}


function converti_type_input_SQL_vers_HTML ($typeSQL){

	if (preg_match('/varchar/',  $typeSQL)){
		$resultat="text";
	}


	elseif (preg_match('/tinyint/',  $typeSQL)) {

	 	$resultat="radio";
	 } 


	return $resultat;

}

function cherche_caractere_dans_chaine($chaine, $caractère){

	// calcul la position dans la chaine
	$position=strpos($chaine, $caractère);

	return $position;
}

function extrait_nombre_entre_parentheses($chaine){
	// cherche position 1ere parenthese
	$pos1= strpos($chaine, "(")+1;

	// cherche position 2eme parenthese
	$pos2= strpos($chaine, ")");

	$longueur_segment= $pos2-$pos1;

	// extrait chaine entre les deux positions
	$chaine_extraite=substr($chaine, $pos1,$longueur_segment );


	return $chaine_extraite;
}




function generer_mot_de_passe($nb_caractere)
{
        $mot_de_passe = "";
       
        $chaine = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789+@!$%?&";
        $longeur_chaine = strlen($chaine);
       
        for($i = 1; $i <= $nb_caractere; $i++)
        {
            $place_aleatoire = mt_rand(0,($longeur_chaine-1));
            $mot_de_passe .= $chaine[$place_aleatoire];
        }

        return $mot_de_passe;
        // pour utiliser et generer un mdp de 5 caractères:
		// echo ('voilà votre mdp: '.generer_mot_de_passe(5));
}


function generer_login($nb_caractere, $nom_equipe)
{
        $login = "";
       
        $chaine = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ";
        $longeur_chaine = strlen($chaine);
       
        for($i = 1; $i <= $nb_caractere; $i++)
        {
            $place_aleatoire = mt_rand(0,($longeur_chaine-1));
            $login .= $chaine[$place_aleatoire];
        }

        $login .= '_'.$nom_equipe;

        return $login;
        // pour utiliser et generer un login de 5 caractères + nom de l'equipe:
		// echo ('voilà votre login : '.generer_mot_de_passe(5, "mon_equipe"));
}




/* fonction d'affichage suivant le type MIME  */

	function afficher_suivant_mime($fichier, $credit, $id, $class, $alt) {

		$typeMime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $fichier) ;

	if ( $typeMime == 'image/jpeg' OR $typeMime =='image/png'OR $typeMime =='image/gif') 

		{?>
		<span>
			<p>
			<img id = "<?php echo $id; ?>" class= "<?php echo $class;?>" src="<?php echo $fichier ;?>" alt="<?php echo $alt; ?> www.mesrepos.domduf.com"/>
			</p>

			<!-- <p><?php echo $typeMime ; ?></p> -->
				<?php 
				if ($credit){ ?>
				<p class= "<?php echo $class;?>">logo &copy <?php echo $credit ;?></p>
		</span>
			<?php }?>
		<?php 
		}
	
	elseif ( $typeMime == 'video/webm' OR $typeMime == 'video/mp4' OR $typeMime == 'video/3gpp') /*'video/x-flv'*/
		
		{?>
		<video src="<?php echo $fichier ; ?>" controls poster="./images/Video-Icon-crop-1.png" preload="none" alt ="<?php echo $alt ; ?> www.soullatitude.com" >  <?php echo $alt ; ?> www.soullatitude.com </video>
		<p>vidéo de type: <?php echo $typeMime ; ?></p>

			<?php 
			if ($credit){ ?>
			<p>Vidéo &copy <?php echo $credit ;?></p>
			<?php }?>

		<?php 
		}

	}

	function affiche_variables_session(){
		?>
		<pre>

        <?php print_r($_SESSION); ?>
        </pre> <?php
	}
		
?>