<!--==================COMMENT CREER UNE EQUIPE====================-->
<?php

// ---------   si un employé est connectée-------------------------------
if (! isset($_SESSION['ticket_employe'])) { ?>

<h3>Une fois connecté, vous pourrez consulter ici vos congés posés et/ou accordés</h3>


<?php 
}
else { ?>
     <h2>Voici le détails de vos congés posés.</h2>




     <!--  =================== SOLDE DES CONGES ==========================-->


     

     <?php         

            $id_selection_employe=$_SESSION['employe_id'];



            // requete de selection des congés demandés par l'employé:
            $sql_conges_demandes="SELECT T.type_conge_id AS conge_type_id, T.type_conge_nom, C.conge_id, C.conge_datedebut, C.conge_quantite, C.conge_commentaire, C.conge_demande,C.conge_consulte, C.conge_accorde, T.type_conge_unite,
                C.employe_id
                                FROM type_conge AS T LEFT JOIN conge AS C 
                                ON T.type_conge_id = C.type_conge_id


                                WHERE employe_id = '$id_selection_employe'
                                ORDER BY conge_datedebut , conge_id
                                ;";





            $conge_demandes = $pdo -> query($sql_conges_demandes); ?>

   <form method="POST" name="formulaire_modif_conge" action="./mes-conges-poser.php">
            <table>  

                <caption>DETAILS DES CONGES POSES<br>
                <p> légende:
                <span class="grey">Pas posé ou pas consulté</span>
                <span class="yellow">Vu, en attente</span>
                <span class="red">Refusé</span>
                <span class="green">Accordé</span>

                </p>

                </caption>

                <tr>
                    <td>-select-</td>
                    <td>NOM du congé</td>
                    <td>date</td>
                    <td colspan="2">Quantité </td>
                    <td>commentaire</td>
                    <td>demandé</td>
                    <td>consulté</td>
                    <td>accordé</td>
                    
                </tr>  




         

            <?php

            //echo date('Y-m-d H:i:s').'<br>';
            while ( $conge_accorde=$conge_demandes->fetch()){ 
                // voir requete ligne 100 de comment_consulter_employe.inc.php?>

                <tr  class="<?php echo couleur_conge($conge_accorde['conge_demande'], $conge_accorde['conge_consulte'],$conge_accorde['conge_accorde'] ); ?>"> 


                    <td><?php   // si (date > date du jour) 
                                // on permet de selectionner pour modifier

                                //echo $conge_accorde['conge_id'];

                        if (date('Y-m-d ', strtotime($conge_accorde['conge_datedebut']) )
                            > date('Y-m-d ')) { 
                                ?>
                              <input type="radio" name="select_conge_pour_modif" value="<?php echo $conge_accorde['conge_id']; ?>">
                        <?php } 

                       
                         ?>


                    </td>

                      




                    <td><?php echo $conge_accorde['type_conge_nom'];?></td>
                    <td><?php echo formate_date($conge_accorde['conge_datedebut']);?></td>        
                    <td colspan="2"><?php echo $conge_accorde['conge_quantite'].' '. $conge_accorde['type_conge_unite'];?></td>
                    <td><?php echo $conge_accorde['conge_commentaire'];?></td>




                    <td><?php echo $conge_accorde['conge_demande'];?></td>
                    <td><?php echo $conge_accorde['conge_consulte'];?></td>
                    <td><?php echo $conge_accorde['conge_accorde'];?></td>
                   
                  

                </tr> <?php

                
            } ?>







            </table>

            <span>
                
                <input class= "bouton-submit" type="submit" name="valider" value="OK pour modifier"/>
                
                <p>Vous serez redirigés sur la page "Poser mes congés.</p>
            </span>

            <span class ="red">
                <input type="radio" name="effacer" value="false" checked="" />non
                <input type="radio" name="effacer" value="true" />OUI
                <p>EFFACER CE CONGE</p>

                <input type="submit" name="effacer_confirme" value="OK"/>
            </span>            


            </form>





     <?php
 } ?>
