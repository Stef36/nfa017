<?php
// recuperation de la date passer dans l'url via la methode get
$jour = $_GET["date"];
//connexion a la bdd
include('config.inc.php');
$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);
// supression du jour correspondant dans la bdd
$req_sql = 'DELETE FROM calendrier WHERE jour="'.$jour.'"';
mysql_query($req_sql);
if(!mysql_error()){
	include("fonctions.php");
	// recuperation dans un tableau des deux variables renvoyée via la fonction convertion (cf fonctions.php
	$retour = convertion($jour);
	mysql_close($connect);
	// on passe en paramettre de l'url les deux variables recuperer.
	header('Location: calendrier_bo.php?mois='.$retour[0].'&an='.$retour[1]);
}else{
	mysql_close($connect);
	echo 'Echeque de la supression : <br> '.mysql_error();
};
?>