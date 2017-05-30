<!--==================COMMENT CREER UNE EQUIPE====================-->
<?php

// ---------   si une équipe est connectée-------------------------------
if (! isset($_SESSION['ticket_employe'])) { ?>

<h2>COMMENT UTILISER CE SITE EN ETANT EMPLOYE<br>d'une entreprise ou membre d'une équipe.</h2>

<p>Comment faire ?</p>
<p>Il faut avoir reçu de son responsable ou du chargé d'équipe un login et un mot de passe.</p>

<p>Cela vous permettra de vous connecter.</p>
<p>Vous pourrez ensuite <a href="mes-conges-consulter.php" class="liens-direct" >consulter</a> et <a href="mes-conges-poser.php" class="liens-direct">poser</a> vos congés en ligne. </p>

<p>Le responsable sera averti automatiquement et donnera sa réponse de son côté sur le site.</p>

<p>Vous pourrez consulter sa réponse <a href="mes-conges-consulter.php">ici</a>.</p>
<p>Bons congés !</p>

<?php 
}
else { ?>
 	<h2>------       Bienvenue sur le site Mes Repos!      ------</h2>

 	<p>Vous avez été inscrit par votre responsable ou par le chargé de votre équipe de travail. </p>
 	<p>Vous allez maintenant pouvoir profiter à fond des fonctionnalités du site.</p>
 	<p>N'hésitez pas à utiliser le formulaire de contact pour toute question.</p>
 	<p>De même pour nous signaler un disfonctionnement, ou si vous avez une idée d'amélioration du site.</p>
 	<p>Bon repos !</p>
 	<p>Vous pouvez  <a href="mes-conges-consulter.php">consulter</a> et <a href="mes-conges-poser.php">poser</a> vos congés en ligne. </p>
 	<?php
 } ?>
