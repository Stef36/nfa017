<!--==================COMMENT CREER UNE EQUIPE====================-->


<h2>FICHE D'INSCRIPTION</h2>

<?php if (isset($_SESSION['ticket_equipe'])) {
    # code...

    // affiche l'employe_id
    // echo 'employe_id -'.$id_selection_employe.'-<br/>'; 

    

    $sql_employe ="SELECT employe_id, employe_login, employe_mdp, employe_nom, employe_prenom, employe_mail, employe_commentaire, employe_visible, employe_actif, employe_logo
                    FROM  employe
                    WHERE employe_id = '$id_selection_employe';";

    $employes= $pdo->query($sql_employe);

    while ( $employe=$employes->fetch()){





    // on recupère les champs et la description de la table employe
    $sql_decrit_employe="DESCRIBE employe;";

    $resultats_description= $pdo->query($sql_decrit_employe); ?>



<!-- -----------------------debut formulaire -------------------------- -->


    <form class="contact_form" action="inscription_personnel.php" Method="post" name="formulaire_modif_employe"  > 

    <ul>

    <?php 

    // boucle sur tous les champs (sauf contenant '_id')
    while($resultat_description=$resultats_description->fetch())
    {
        $resultat=$resultat_description['Field'];


        // ne selectionne que les champs sans "_id"
        if (!preg_match('/_id/',  $resultat))
        {
            
            // echo $resultat_description['Field'].'<br/>';
            // echo $resultat_description['Type'].'<br/>'; ?>



            <li><label for="<?php echo $resultat_description['Field']; ?>"> <?php echo $resultat_description['Field']; ?></label>
                <input 
                type="text" 
                id="<?php echo $resultat_description['Field']; ?>" 
                name="<?php echo $resultat_description['Field']; ?>" 
                size="40" 
                placeholder="<?php echo $employe[$resultat_description['Field']] ; ?>"

                value="<?php echo $employe[$resultat_description['Field']] ; ?>" 
                onblur="" 
                required>
            </li>
            <BR>

            <?php
        }

    }


    ?>

    </ul>

    </form>
     

    <?php };
}

else { ?>

        <form class="contact_form" action="inscription_personnel.php" Method="post" name="formulaire_modif_employe"  > 

     <ul>



            <li><label for="noms">Nom Prénom :</label>
                <input type="text" id="nom" name="nom" size="40" placeholder="Dupond Bernard" onblur="" required></li>
            <BR>


            <li><label for="number">Age :</label>
                <input size="3" type="text" name="age" id="age" placeholder="24"> </li>
            <BR>
            <li><label for="adresse">Adresse :</label>
                <input size="50" type="text" name="adresse" id="adresse" placeholder="24, rue des spectateurs - 36000 Chateauroux"></li>
            <BR>
            <li><label for="text">Fonction :</label>
                <input size="50" type="text" name="fonction" id="fonction" placeholder="Electricien"></li>
            <BR>
            <li><label for="adresse_mail">Adresse mail :</label>
                <input type="email" id="adresse_mail" name="mail" size="30" placeholder="bdupond@lecnam.net" onblur="valid_mail()"></li>
            <BR>
            <li><label for="equipe">Equipe :</label>
                <input size="50" type="text" name="equipe" id="equipe" placeholder="equipe A"></li>
            <BR>





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
        
        
      
        
    </form> <?php

}



