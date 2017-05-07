<!--==================COMMENT CREER UNE EQUIPE====================-->
<?php

// ---------   si une équipe est connectée-------------------------------
if (! isset($_SESSION['ticket_employe'])) { ?>

<h2>ICI bientôt les détails de vos congés posée et/ou accordés</h2>



<p>Bons congés !</p>

<?php 
}
else { ?>
 	<h2>Voici le détails de vos congés posés.</h2>



 	<!--  =================== SOLDE DES CONGES ==========================-->


 	

 	<?php         

			$id_selection_employe=$_SESSION['employe_id'];

            $conge_accordes = $pdo -> query($sql_conges_employe); ?>


            <table>  

                <caption>DETAILS DES CONGES POSES</caption>

                <tr>
                    <td>date</td>
                    <td>NOM du congé</td>
                    <td>Qté </td>
                    <td></td>
                    <td>commentaire</td>
                    <td>demandé</td>
                    <td>consulté</td>
                    <td>accordé</td>
                    <td></td>
                </tr>  <?php





            while ( $conge_accorde=$conge_accordes->fetch()){ 
                // voir requete ligne 100 de comment_consulter_employe.inc.php?>

                <tr> 
                    <td><?php echo formate_date($conge_accorde['conge_datedebut']);?></td>        
                    <td><?php echo $conge_accorde['type_conge_nom'];?></td>
                    <td><?php echo $conge_accorde['conge_quantite'];?></td>
                    <td><?php echo $conge_accorde['type_conge_unite'];?></td>
                    <td><?php echo $conge_accorde['conge_commentaire'];?></td>

                    <td><?php echo $conge_accorde['conge_demande'];?></td>
                    <td><?php echo $conge_accorde['conge_consulte'];?></td>
                    <td><?php echo $conge_accorde['conge_accorde'];?></td>
                   
                  

                </tr> <?php

                
            } ?>





            </table>



 	<?php
 } ?>
