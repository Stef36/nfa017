<?php



if (isset($_SESSION['ticket_equipe'])){


    // mise à jour suivant choix du chef d'équipe d'accorder ou non le congé
    if (isset($_POST['select_conge_pour_accord'])) { ?>

        <H3><?php echo '<br>Congé n° '.$_POST['select_conge_pour_accord'].' réponse enregistrée: '.$_POST['accept'].'<br>'; ?> 
        </H3><?php
        

            if ($_POST['accept']=="Conge OK") {
                $reponse=array(1, 1);
            }
            elseif ($_POST['accept']=="En Attente") {
                $reponse=array(1, NULL);
            }
            elseif ($_POST['accept']=="Refus") {
                $reponse=array(1,0);
            }


            $reponse[]=$_POST['select_conge_pour_accord'];

            //print_r($reponse).'<br>';

        $sql_reponse_chef="UPDATE conge
                            SET  conge_consulte=?, conge_accorde=?
                            WHERE conge_id= ? ;";

        applique_requete($sql_reponse_chef, $pdo, $reponse);
    }




    $equipe_id=$_SESSION['equipe_id'];
    $id_selection_employe=$_SESSION['id_selection_employe'];

    $sql_warm_equipe="SELECT conge_id, conge_datedebut,conge_quantite,
                            conge_demande,conge_consulte,conge_accorde,
                            conge_commentaire, 
                            C.employe_id,
                            type_conge_nom, type_conge_unite, type_conge_valable  
                        FROM  conge AS C
                        JOIN type_conge AS T

                        ON T.type_conge_id= C.type_conge_id

                        
                        AND conge_demande !=0
                        AND C.employe_id='$id_selection_employe'
                        
                        ORDER BY C.employe_id, conge_datedebut ;";

    $warms_equipe=$pdo-> query($sql_warm_equipe); 

    $compteur=0; // compte les nouvelles demande de congé
    while ($warm_equipe = $warms_equipe->fetch() ){
        $compteur+=1;
        // echo $compteur.'<br>';
        }

        if ($compteur!=0) {
            // on affiche le formulaire si on a detecté des demande de congé
        
        ?>
        <H3 class="warm">ALERTE<br>NOUVELLE demande de congés.</H3>
        

        <form method="POST" name="formulaire_accepter_conge" >

<br>
        <table>  

                        <caption>DEMANDES DE CONGES<br>
                        <p> légende:
                        <span class="grey">Pas posé ou pas consulté</span>
                        <span class="yellow">Vu, en attente</span>
                        <span class="red">Refusé</span>
                        <span class="green">Accordé</span>

                        </p>

                        </caption>
                        <tr>
                            <td>-select-</td>
                            
                            <td>TYPE du congé</td>
                            <td>date</td>
                            <td>Qté </td>
                            
                            <td>commentaire</td>
                            <td>demandé</td>
                            <td>consulté</td>
                            <td>accordé</td>
                            
                        </tr> <?php
            $warms_equipe=$pdo-> query($sql_warm_equipe);
            while ($warm_equipe = $warms_equipe->fetch() ) { ?>

        <tr  class="<?php echo couleur_conge($warm_equipe['conge_demande'], $warm_equipe['conge_consulte'],$warm_equipe['conge_accorde'] ); ?>"> 


                            <td><?php   // si (date > date du jour) ET (conge !accordé)
                                        // on permet de selectionner pour modifier

                                        //echo $warm_equipe['conge_id'];

                                if ($warm_equipe['conge_accorde']!=1) { ?>
                                      <input type="radio" name="select_conge_pour_accord" value="<?php echo $warm_equipe['conge_id']; ?>">
                                <?php } 

                               
                                 ?>


                            </td>




                            <td><?php echo $warm_equipe['type_conge_nom'];?></td>
                            <td><?php echo formate_date($warm_equipe['conge_datedebut']);?></td>        
                            <td><?php echo $warm_equipe['conge_quantite'].' '.$warm_equipe['type_conge_unite'];?></td>
                            <td><?php echo $warm_equipe['conge_commentaire'];?></td>




                            <td><?php echo $warm_equipe['conge_demande'];?></td>
                            <td><?php echo $warm_equipe['conge_consulte'];?></td>
                            <td><?php echo $warm_equipe['conge_accorde'];?></td>
                           
                          

                        </tr> <?php


                

            } ?>

        </table> 

        <span>
            <input type="submit" name="accept" value="Conge OK">
            <input type="submit" name="accept" value="En Attente">
            <input type="submit" name="accept" value="Refus">

        </span>

        </form><?php


    } else {?>

        <H3 class="green">Aucune nouvelle demande de congés pour l'instant.</H3> <?php

        } 

    





}

?>