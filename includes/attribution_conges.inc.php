<!--==================COMMENT CREER UNE EQUIPE====================-->


<h2>ATTRIBUTION DES CONGES</h2>
    <form class="attribution_form"  Method="post" name="formulaire"  >



    <ul>
        
    <?php  if (isset($_SESSION['ticket_equipe']) ) {
        
   
        // équipe connectée -----------------------------------


     /* requete selection des types congés */

            $sql_types_conges = "SELECT type_conge_id, type_conge_nom, type_conge_commentaire, type_conge_unite, type_conge_valable, type_conge_logo
                                FROM type_conge 
                                WHERE type_conge_valable=1
                                 ;";

            $types_conges = $pdo-> query($sql_types_conges);


            // TODO requete fausse....
            $sql_employe_dispose_combiens_type_conges =
                                "   SELECT * 
                                    FROM `type_conge` T 
                                    LEFT JOIN 
                                    (SELECT * FROM disposer WHERE disposer.employe_id='$id_selection_employe' )
                                    AS D 
                                    ON T.type_conge_id = D.type_conge_id
                                    WHERE T.type_conge_valable=1
                                    ORDER BY type_conge_nom;";


            $employe_dispose_type_conges = $pdo -> query($sql_employe_dispose_combiens_type_conges); ?>

            <H3>N° id_employé: <?php echo " ".$id_selection_employe; ?> </H3>

            <?php

            if ($id_selection_employe!=NULL | $id_selection_employe!='') { 

                // employé connu selectionné

                ?>

                <form class="contact_form"  Method="post" name="formulaire_attribution_conges"  > <?

                while ($employe_dispose_combien_type_conges=$employe_dispose_type_conges -> fetch() ) 
                { 

                //echo $sql_employe_dispose_combien_type_conges['type_conge_nom'];
                    ?>

                <li>
                    <label for="number"><?php echo $employe_dispose_combien_type_conges['type_conge_nom'];?></label>

                    <input type="number" 
                        id="<?php echo $employe_dispose_combien_type_conges['type_conge_nom'];?>" 
                        name="<?php echo $employe_dispose_combien_type_conges['type_conge_nom'];?>"   
                        onblur="" 
                        value ="<?php echo $employe_dispose_combien_type_conges['disposer_quantite'];?>"
                        min="0">
                    <?php echo " ".$employe_dispose_combien_type_conges['type_conge_unite']."(s)"; ?> 
                </li>

                <BR> <?php


                } ?>

                <label for="">mettre à jour</label>
                <input type="submit" name="valid_attribution_conges" value="Mettre à jour" >

                </form> <?php
            } 

            else {

                ?>

                <p>
                Merci de créer d'abord une fiche de  nouvel employé avant de pouvoir lui attibuer ses congés.
                </p>
                 <?php

            }

 



            // fin section équipe connectée ---------------------

     ?>

        </ul> <?php
    } else {

        // équipe non connectée---------------------------------------?> 


            <li><label for="number">Congés payés :</label>
                <input type="text" id="conges_payes" name="conges_payes" maxlength="3"  onblur=""> jours</li>
            <BR>
            <li><label for="number">Ancienneté :</label>
                <input maxlength="3" type="text" name="anciennete" id="anciennete"> jours</li>
            <BR>
            <li><label for="number">RTT :</label>
                <input maxlength="3" type="text" name="rtt" id="rtt"> jours</li>
            <br>
            <li><label for="number">Maladie :</label>
                <input maxlength="3" type="text" name="maladie" id="maladie"> jours</li>
            <br>
            <li><label for="number">Abscence non autorisée :</label>
                <input maxlength="3" type="text" name="abscence" id="abscence">
            jours</li>
            <br>
            <li><label for="number">Formation :</label>
                <input maxlength="3" type="text" name="formation" id="formation"> jours
            </li>
            <br>


            </ul><?php

            } ?>





                   



        <fieldset>
            <center>
                <legend>Commentaires :</legend>
            </center>
            <center><br>
                <textarea name="message" rows="8" cols="100" placeholder="Tapez votre message" ></textarea>
                <br>
            </center>
            <br>
        </fieldset>
        
<!--==========Boutons de réinitialisation et de validation===============-->
            <center class="bouton">
<!--=========================UTILITER D'UN BOUTON RESET ?????=============-->
            <!--<input type="Reset" value="Réinitialiser" />-->
<!--======================================================================-->
                <input type="submit" value="Valider" onclick="alert();"/>
            
            </center>
        <br><br><br><br><br>
        
    </form>
    
    
   