<?php



if (isset($_SESSION['ticket_equipe'])){


	$equipe_id=$_SESSION['equipe_id'];
	echo 'ALERTE demande de congé équipe '.$equipe_id;

	$sql_warm_equipe="SELECT *
						FROM employe AS E 

						JOIN conge AS C
						ON E.employe_id= C.employe_id

						JOIN type_conge AS T ON T.type_conge_id= C.type_conge_id

						WHERE equipe_id='$equipe_id' 
						AND conge_consulte IS NULL
						AND (conge_accorde IS NULL OR conge_accorde = 0)

						ORDER BY C.employe_id, conge_datedebut ;";

	$warms_equipe=$pdo-> query($sql_warm_equipe); ?>

<table>  

                <caption>NOUVELLES DEMANDES DE CONGES<br>
                <p> légende:
                <span class="grey">Pas posé ou pas consulté</span>
                <span class="yellow">Vu, en attente</span>
                <span class="red">Refusé</span>
                <span class="green">Accordé</span>

                </p>

                </caption>
                <tr>
                    <td>-select-</td>
                    <td>NOM demandeur</td>
                    <td>TYPE du congé</td>
                    <td>date</td>
                    <td>Qté </td>
                    
                    <td>commentaire</td>
                    <td>demandé</td>
                    <td>consulté</td>
                    <td>accordé</td>
                    <td></td>
                </tr> <?php

	while ($warm_equipe = $warms_equipe->fetch() ) { ?>

<tr  class="<?php echo couleur_conge($warm_equipe['conge_demande'], $warm_equipe['conge_consulte'],$warm_equipe['conge_accorde'] ); ?>"> 


                    <td><?php   // si (date > date du jour) ET (conge !accordé)
                                // on permet de selectionner pour modifier

                                //echo $warm_equipe['conge_id'];

                        if ($warm_equipe['conge_accorde']!=1) { ?>
                              <input type="radio" name="select_conge_pour_modif" value="<?php echo $warm_equipe['conge_id']; ?>">
                        <?php } 

                       
                         ?>


                    </td>

                      


                    <td><?php echo $warm_equipe['employe_prenom'].' '.$warm_equipe['employe_nom'];?></td>


                    <td><?php echo $warm_equipe['type_conge_nom'];?></td>
                    <td><?php echo formate_date($warm_equipe['conge_datedebut']);?></td>        
                    <td><?php echo $warm_equipe['conge_quantite'].' '.$warm_equipe['type_conge_unite'];?></td>
                    <td><?php echo $warm_equipe['conge_commentaire'];?></td>




                    <td><?php echo $warm_equipe['conge_demande'];?></td>
                    <td><?php echo $warm_equipe['conge_consulte'];?></td>
                    <td><?php echo $warm_equipe['conge_accorde'];?></td>
                   
                  

                </tr> <?php


		

	} ?>

</table> <?php





}

?>