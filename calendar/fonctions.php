<?php
// conversion de la date (aaa-mm-jj) en deux variables $mois (mm) et $an (aa)
function convertion($date){
// recup�re les 2 caract�re apr�s le 5eme caract�re de $ date (aaaa-mm-jj donne mm)
$mois = substr($date, 5, 2);
// recup�re les 4 premiers carat�res de $ date (aaaa-mm-jj donne aaaa)
$an  = substr($date, 0, 4);
// on retourne un tableau contanant les deux variables
return array( $mois, $an);
}


// fonction permetant de retourner la date au format aaaa-mm-jj
function ajout_zero($jj, $mm, $aa){
	// ajoute un 0 quand le jour ne contient pas de 0 et qu'il est inferieur � 10 (8 donne 08)
	if($jj <= 9 && substr($jj, 0, 1)!= 0){
		$jj  = '0'.$jj;
	}	
	// ajoute un 0 quand le mois ne contient pas de 0 et qu'il est inferieur � 10 (8 donne 08)
	if($mm <= 9 && substr($mm, 0, 1)!= 0){
		$mm  = '0'.$mm;
	}
// on retourne le tout sous la forme aaaa-mm-jj
$retour = (string)$aa.'-'.$mm.'-'.$jj;
return $retour;
}

?>