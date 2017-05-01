<!--==================COMMENT CREER UNE EQUIPE====================-->
<?php

// ---------   si une équipe est connectée-------------------------------
if (! isset($_SESSION['ticket_equipe'])) { ?>

<h2>COMMENT UTILISER CE SITE EN ETANT EMPLOYE<br>d'une entreprise ou membre d'une équipe.</h2>

<p>Comment faire ?</p>
<p>Il faut avoir reçu de son responsable ou du chargé d'équipe un login et un mot de passe.</p>

<p>Cela vous permettra de vous connecter.</p>
<p>Vous pourrez ensuite <a href="mes_conges_consulter.php">consulter</a> et <a href="mes_conges_poser.php">poser</a> vos congés en ligne. </p>

<p>Le responsable sera averti automatiquement et donnera sa réponse de son côté sur le site.</p>

<p>Vous pourrez consulter sa réponse <a href="mes_conges_consulter.php">ici</a>.</p>
<p>Bons congés !</p>

<?php 
}
else { ?>
 	<h2>------       MES COORDONNEES       ------</h2> <?php
 } ?>
