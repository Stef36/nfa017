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


			$id_selection_employe=$_SESSION['employe_id'];

 			// requete de selection des type de congés et des congés attribués à l'employé:
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
                                    	AND disposer_quantite != ''

                                    ;";


            $employe_dispose_type_conges = $pdo -> query($sql_employe_dispose_combiens_type_conges);



            // tableau des congés accordés à l'employé
            $tab_conges_accordes=array(); ?>

            <!-- =========== Tableau des congés attribués =====================--> 
            <table summary="congés attribués au début de cette année">

                <caption>congés attribués au début de cette année:</caption>

                <tr>
                    <td>-id-</td>
                    <td>NOM</td>
                    <td>Quantité</td>
                    <td>base</td>
                    <td>SOLDE</td>
                </tr>

            <?php
 			while($employe_dispose_type_conge= $employe_dispose_type_conges->fetch()){

                ?>  <tr> 
                        <td><?php echo $employe_dispose_type_conge['id_type_conge']; ?>
                            
                        </td> 

                        <td>
                        <?php echo $employe_dispose_type_conge['type_conge_nom']; ?>    
                        </td>

                        <td>
                        <?php echo $employe_dispose_type_conge['disposer_quantite']; ?>
                        </td>

                        <td>
                        <?php echo $employe_dispose_type_conge['type_conge_unite']."(s)"; ?>
                        </td>

                    </tr><?php

                    // définition de l'index du tableau des congés accordés
                    // utile plus bas
     				$id_type_conge = $employe_dispose_type_conge['id_type_conge'];
                    $tab_conges_accordes[$id_type_conge]=$employe_dispose_type_conge['disposer_quantite'];
                    

 			}?>

            </table>
            <br>











            

                <?php
            // requete de selection des congés accordés à l'employé:
            $sql_conges_employe="SELECT conge_id, conge_quantite, conge_accorde,type_conge_id
                                FROM conge
                                WHERE (employe_id = '$id_selection_employe'
                                AND conge_accorde IS TRUE)
                                ;";

            $conge_accordes = $pdo -> query($sql_conges_employe);

            

            while ( $conge_accorde=$conge_accordes->fetch()) {
                echo $conge_accorde['type_conge_id']."->".$conge_accorde['conge_quantite']."<br>";
                $tab_conges_accordes[$conge_accorde['type_conge_id']]-=$conge_accorde['conge_quantite'];


                echo $tab_conges_accordes[$conge_accorde['type_conge_id']]."<br>";
            }

            print_r($tab_conges_accordes);

 		?>






 	<?php
 } ?>
