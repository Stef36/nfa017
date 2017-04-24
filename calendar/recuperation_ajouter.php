<?php
$jour = $_GET["date"];
include("config.inc.php");
$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);
$req_sql="INSERT into calendrier (jour) VALUE ('$jour')";
mysql_query($req_sql);
if(!mysql_error()){
	include("fonctions.php");
	$retour = convertion($jour);
	mysql_close($connect);
	header('Location: calendrier_bo.php?mois='.$retour[0].'&an='.$retour[1]);
}else{
	mysql_close($connect);
	echo 'Echeque de l\'enregistrement : <br> '.mysql_error();
};
?>