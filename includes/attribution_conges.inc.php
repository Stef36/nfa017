<!--==================COMMENT CREER UNE EQUIPE====================-->


<h2>ATTRIBUTION DES CONGES</h2>
    <form class="attribution_form"  Method="post" name="formulaire"  >

    <?php /* requete selection des types congés */

            $sql_types_conges = "SELECT type_conge_id, type_conge_nom, type_conge_commentaire, type_conge_unite, type_conge_valable, type_conge_logo
                                FROM type_conge
                                 ;";

            $types_conges = $pdo-> query($sql_types_conges);

            while ($type_conge=$types_conges->fetch()) {



                echo "congé: ".$type_conge['type_conge_nom']."<br/>";
                echo "congé: ".$type_conge['type_conge_unite']."<br/>";


            }

     ?>


        <ul>
            <li><label for="number">Congés payés :</label>
                <input type="text" id="conges_payes" name="conges_payes" size="3"  onblur=""> jours</li>
            <BR>
            <li><label for="number">Ancienneté :</label>
                <input size="3" type="text" name="anciennete" id="anciennete"> jours</li>
            <BR>
            <li><label for="number">RTT :</label>
                <input size="3" type="text" name="rtt" id="rtt"> jours</li>
            <br>
            <li><label for="number">Maladie :</label>
                <input size="3" type="text" name="maladie" id="maladie"> jours</li>
            <br>
            <li><label for="number">Abscence non autorisée :</label>
                <input size="3" type="text" name="abscence" id="abscence">
            jours</li>
            <br>
            <li><label for="number">Formation :</label>
                <input size="3" type="text" name="formation" id="formation"> jours
            </li>
            <br>
        </ul>
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
            <input type="Reset" value="Réinitialiser" />
                <input type="submit" value="Envoyer" onclick="alert();"/>
            
            </center>
        <br><br><br><br><br>
        
    </form>