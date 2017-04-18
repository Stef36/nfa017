<!--==================COMMENT CREER UNE EQUIPE====================-->
<?php

// ---------   si une équipe est connectée-------------------------------
if (! isset($_SESSION['ticket_equipe'])) { ?>

<h2>COMMENT CREER UNE EQUIPE</h2>

<p>Pour créer une équipe, il vous faut d'abord remplir le <a href ="./contact.php" >formulaire d'inscription</a> en spécifiant bien le nom de l'équipe souhaité, le nom de l'entreprise où cette équipe travaille.</p>
<p>Ce formulaire est transmis au responsable du site web qui validera votre demande et vous enverra par mail votre login et votre mot de passe.</p>
<p>Vous pourrez ensuite vous connecter sur cette page (en tant que responsable d'équipe) pour saisir les noms et les congés alloués à chaque employés dont vous êtes en charge.</p>

<p>Dans un deuxième temps, vous pourrez consulter, autoriser ou rejeter les demandes de congés formulées par les membres de votre équipe.</p>
<p>Bons congés !</p>

<?php 
}
else { ?>
 	<h2>------       VOTRE EQUIPE       ------</h2> <?php
 } ?>
