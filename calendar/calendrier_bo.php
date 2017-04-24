<html>
<head>
<title>index</title>
<link href="calendar.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include("fonctions.php");
// recuperatio du jous, mois, et année actuel
$jour_actuel = date("j", time());
$mois_actuel = date("m", time());
$an_actuel = date("Y", time());
$jour = $jour_actuel;

// si la variable mois n'existe pas, mois et année correspondent au mois et à l'année courante
if(!isset($_GET["mois"]))
    {
    $mois = $mois_actuel;
    $an = $an_actuel;
    }

//mois suivant
$mois_suivant = $mois + 1;
$an_suivant = $an;
if ($mois_suivant == 13)
{
    $mois_suivant = 1;
    $an_suivant = $an + 1;
}

//mois précédent
$mois_prec = $mois - 1;
$an_prec = $an;
if ($mois_prec == 0)
{
    $mois_prec = 12;
    $an_prec = $an - 1;
}

//affichage du mois et de l'année en french
$mois_de_annee = array("Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre");
$mois_en_clair = $mois_de_annee[$mois - 1];
// creation d'un tableau à 31 entrée (1 pour chaues jours) et on dit qu'aucuns jours n'est resevé
for($j = 1; $j < 32; $j++){
$tab_jours[$j] = (bool)false;
}
// connexion à la bdd
include("config.inc.php");
$connect = mysql_connect($hote, $user, $password);
mysql_select_db($base, $connect);

$requete = mysql_query("SELECT * FROM calendrier WHERE YEAR(jour) = $an    AND MONTH(jour) = $mois");
while ($ligne = mysql_fetch_array($requete)){
    // recupartion du jour ou il y a la reservation
    $jours = $ligne["jour"];
    // transforme aaaa/mm/jj en jj
    $jour_reserve = (int)substr($jours, 8, 2);
    // insertion des jours reservé dans le tableau
    $tab_jours[$jour_reserve] = (bool)true;    
}
mysql_close($connect);
?>
<br />

<table align="center" width="420" border="0" cellpadding="5" cellspacing="0"  class="tab_cal">
    <tr>
        <td height="51" colspan="7">
            <table width="346" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="282" class="date"><div><?php echo $mois_en_clair," ", $an; ?></div></td>
                    <td width="38">
                        <a href="calendrier_bo.php?mois=<?php echo $mois_prec; ?>&an=<?php echo $an_prec; ?>">
                      <div align="right"><img border="0" src="img/prec.gif" /></div></a>
                  </td>
                    <td width="26">
                        <a href="calendrier_bo.php?mois=<?php echo $mois_suivant; ?>&an=<?php echo $an_suivant; ?>">
                      <div><img border="0" src="img/suiv.gif" /></div>
                      </a>                    
                  </td>
                </tr>
          </table>
      </td>
    </tr>
    <tr align="center" class="jours">
        <td width="60">D</td>
        <td width="60">L</td>
        <td width="60">M</td>
        <td width="60">M</td>
        <td width="60">J</td>
        <td width="60">V</td>
        <td width="60">S</td>
    </tr>
</table>
<table align="center" width="420" border="0" cellpadding="5" cellspacing="0"  class="tab_numero">
    <tr align="center">
<?
//Détection du 1er et dernier jour du moiS
$nombre_date = mktime(0,0,0, $mois, 1, $an);
$premier_jour = date('w', $nombre_date);
$dernier_jour = 28;
while (checkdate($mois, $dernier_jour + 1, $an))
    { $dernier_jour++;}

//Affichage de 7 jours du calendrier

for ($i = 0; $i < 7; $i++){
    if ($i < $premier_jour){ 
        echo '<td width="60"></td>';
    }else{
        $ce_jour = ($i+1) - $premier_jour;
        // si c'est un jour reserve on applique le style reserve
        if($tab_jours[$ce_jour]){
            echo '<td width="60" class="reserve">';
            echo $ce_jour;
            echo '<br />';
            // conversion de la en aaaa-mm-jj (cf fonctions.php)
            $date = ajout_zero($ce_jour, $mois, $an);
            // on supprime le jour correspondant via la page recuperation_enlever.php
            echo '<a href="recuperation_enlever.php?date='.$date.'">';
            echo '<img src="img/enlever.png" border="0" alt="Marquer comme libre" />';
            echo '</a>';
            echo '</td>';                    
        // sinon on ne met pas de style
        }else{
            echo '<td width="60">';
            echo $ce_jour;
            echo '<br />';
            // cf fonctions.php
            $date = ajout_zero($ce_jour, $mois, $an);
            // on ajoute le jour correspondant via la page recuperation_ajouter.php
            echo '<a href="recuperation_ajouter.php?date='.$date.'">';
            echo '<img src="img/ajout.png" border="0" alt="Marquer comme reserve" />';
            echo '</a>';
            echo '</td>';
        }

    }
}
//affichage du reste du calendrier
$jour_suiv = ($i+1) - $premier_jour;
for ($rangee = 0; $rangee <= 4; $rangee++){
        echo '</tr>';
        echo '<tr align="center" class="numero">';
        for ($i = 0; $i < 7; $i++){
            if($jour_suiv > $dernier_jour){ 
                echo '<td width="60">';
                echo '</td>';
            }else{
                // si c'est un jour reserve on applique le style reserve
                if($tab_jours[$jour_suiv]){
                    echo '<td width="60" class="reserve">';
                    echo $jour_suiv;
                    echo '<br />';
                    $date = ajout_zero($jour_suiv, $mois, $an);
                    echo '<a href="recuperation_enlever.php?date='.$date.'">';
                    echo '<img src="img/enlever.png" border="0" alt="Marquer comme libre" />';
                    echo '</a>';
                    echo '</td>';                    
                // sinon on ne met pas de style
                }else{
                    echo '<td width="60">';
                    echo $jour_suiv;
                    echo '<br />';
                    $date = ajout_zero($jour_suiv, $mois, $an);
                    echo '<a href="recuperation_ajouter.php?date='.$date.'">';
                    echo '<img src="img/ajout.png" border="0" alt="Marquer comme reserve" />';
                    echo '</a>';
                    echo '</td>';
                }
            }
            $jour_suiv++;
        }
}
?>
</tr>
</table>
<table align="center" width="420" height="87" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="60" height="30" align="center"><img src="img/enlever.png" border="0" alt="Enlever la reservation de se jour" /></td>
    <td width="380"><div class="descriptif"> Permet de marquer comme libre. </div></td>
  </tr>
  <tr>
    <td width="60" height="30" align="center"><img src="img/ajout.png" border="0" alt="Marquer que ce jour est déja reservé." /></td>
    <td><div class="descriptif"> Permet de marquer le jour comme reserv&eacute;. </div></td>
  </tr>
  <tr>
    <td width="60" align="center" height="32" class="reserve">XX</td>
    <td><div class="descriptif"> Jour d&eacute;ja r&eacute;serv&eacute;..</div></td>
  </tr>
</table>
</body>
</html>
