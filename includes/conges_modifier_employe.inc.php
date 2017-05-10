<?php         

			$id_selection_employe=$_SESSION['employe_id'];



            // requete de selection des congés demandés par l'employé:
            $sql_conges_demandes="SELECT T.type_conge_id AS conge_type_id, T.type_conge_nom, C.conge_id, C.conge_datedebut, C.conge_quantite, C.conge_commentaire, C.conge_demande,C.conge_consulte, C.conge_accorde, T.type_conge_unite,
                C.employe_id
                                FROM type_conge AS T LEFT JOIN conge AS C 
                                ON T.type_conge_id = C.type_conge_id


                                WHERE employe_id = '$id_selection_employe'
                                ORDER BY conge_datedebut
                                ;";





            $conge_demandes = $pdo -> query($sql_conges_demandes); ?>


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

                    <td>NOM du congé</td>
                    <td>date</td>
                    <td>Qté </td>
                    <td></td>
                    <td>commentaire</td>
                    <td>demandé</td>
                    <td>consulté</td>
                    <td>accordé</td>
                    <td></td>
                </tr>  <?php





            while ( $conge_accorde=$conge_demandes->fetch()){ 
                // voir requete ligne 100 de comment_consulter_employe.inc.php?>

                <tr  class="<?php echo couleur_conge($conge_accorde['conge_demande'], $conge_accorde['conge_consulte'],$conge_accorde['conge_accorde'] ); ?>"> 
                    <td><?php echo $conge_accorde['type_conge_nom'];?></td>
                    <td><?php echo formate_date($conge_accorde['conge_datedebut']);?></td>        
                    <td><?php echo $conge_accorde['conge_quantite'];?></td>
                    <td><?php echo $conge_accorde['type_conge_unite'];?></td>
                    <td><?php echo $conge_accorde['conge_commentaire'];?></td>




                    <td><?php echo $conge_accorde['conge_demande'];?></td>
                    <td><?php echo $conge_accorde['conge_consulte'];?></td>
                    <td><?php echo $conge_accorde['conge_accorde'];?></td>
                   
                  

                </tr> <?php

                
            } ?>


            </table> 