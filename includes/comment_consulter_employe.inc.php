<!--==================COMMENT CREER UNE EQUIPE====================-->
<?php

// ---------   si une équipe est connectée-------------------------------
if (! isset($_SESSION['ticket_employe'])) { ?>

<h2>POUR CONSULTER VOS CONGES EN ETANT EMPLOYE<br>d'une entreprise ou membre d'une équipe.</h2>


<p>Une fois inscrit par votre responsable, vous pourrez consulter ici le solde de vos congés.</p>

<p>La section ci-dessous vous permettra de récapituler en un coup d'oeil:<br> les congés que vous avez posés, qui ont été accordés... ou refusés.</p>


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

 	<!--  =================== SOLDE DES CONGES ==========================-->


 	<H2>Voici le solde de vos congés:</H2>

 	<?php         


			$id_selection_employe=$_SESSION['id_selection_employe'];

 			// requete de selection des type de congés et des congés attribué à l'employé:
            $sql_employe_dispose_combiens_type_conges =
                                "   SELECT  type_conge_nom,
                                     T.type_conge_id AS id_type_conge,
                                        disposer_quantite, type_conge_unite

                                    FROM `type_conge` T 
                                    LEFT JOIN 
                                    (SELECT * FROM disposer WHERE disposer.employe_id='$id_selection_employe' )
                                    AS D 

                                    ON T.type_conge_id = D.type_conge_id

                                    WHERE T.type_conge_valable=1

                                    ORDER BY type_conge_nom;";


            $employe_dispose_type_conges = $pdo -> query($sql_employe_dispose_combiens_type_conges);

 		$sql_solde_conges_employe=";";

 		?>






 	<?php
 } ?>
