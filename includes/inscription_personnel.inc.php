<!--==================COMMENT CREER UNE EQUIPE====================-->


<h2>FICHE D'INSCRIPTION</h2>

<?php 

// si une équipe est connectée
if (isset($_SESSION['ticket_equipe'])) {
    # code...

    // affiche l'employe_id
    //echo 'employe_id -'.$id_selection_employe.'-<br/>'; 

    

    $sql_employe ="SELECT employe_id, employe_login, employe_mdp, employe_nom, employe_prenom, employe_mail, employe_commentaire, employe_visible, employe_actif, employe_logo
                    FROM  employe
                    WHERE employe_id = '$id_selection_employe';";

    $employes= $pdo->query($sql_employe);

    while ( $employe=$employes->fetch()){





    // on recupère les champs et la description de la table employe
    $sql_decrit_employe="DESCRIBE employe;";

    $resultats_description= $pdo->query($sql_decrit_employe); ?>



<!-- ====================== debut formulaire ============================-->


    <form class="contact_form"  Method="post" name="formulaire_modif_employe"  > 

 

    <ul>
    <input type="number" name="id_selection_employe" value="<?php echo $id_selection_employe; ?>" hidden ></input>


    <?php 



    // boucle sur tous les champs (sauf contenant '_id')
    while($resultat_description=$resultats_description->fetch())
    {
        $resultat=$resultat_description['Field'];


        // ne selectionne que les champs sans "_id"
        if (!preg_match('/_id/',  $resultat))
        {
            
            // echo $resultat_description['Field'].'<br/>';
            // echo $resultat_description['Type'].'<br/>'; 
             $typeChampHTML=converti_type_input_SQL_vers_HTML($resultat_description['Type']);?>


            <li>
                
            <?php 
            
            // construction des input text
            if ($typeChampHTML=="text") 
                { ?>
              
                <label for="<?php echo $resultat_description['Field']; ?>"> <?php echo $resultat_description['Field']; ?></label>


                <?php 
                        $longueur_champ = extrait_nombre_entre_parentheses($resultat_description['Type']);
                        echo "longueur maxi: ".$longueur_champ." caractères<br>";

                ?>



                <input 
                type="text" 
                id="<?php echo $resultat_description['Field']; ?>" 
                name="<?php echo $resultat_description['Field']; ?>" 
                size="<?php echo "100";?>" 
                placeholder="<?php echo $employe[$resultat_description['Field']] ; ?>"

                value="<?php echo $employe[$resultat_description['Field']] ; ?>" 
                onblur="" 
               
                > <?php
                }


                // construction des input radio
                elseif ($typeChampHTML=="radio") { ?>

                    <label for="<?php echo $resultat_description['Field']; ?>"> <?php echo $resultat_description['Field']; ?></label>
                    <input 
                    type="radio"
                    id="<?php echo $resultat_description['Field']; ?>" 
                    name="<?php echo $resultat_description['Field']; ?>"
                    value="1" 
                        <?php if ($employe[$resultat_description['Field']]==1) {
                            echo "checked";
                        } ?>
                    >oui<br>
                     <input 
                    type="radio"
                    id="<?php echo $resultat_description['Field']; ?>" 
                    name="<?php echo $resultat_description['Field']; ?>"
                    value="0"
                        <?php if ($employe[$resultat_description['Field']]==0) {
                            echo "checked";
                        } ?>
                    >non<br>
                   

                <?php   
                }// fin construction des input radio ?> 

             
            </li>
            <BR>

            <?php
        }// fin de test sans "_id"

    }

    ?>

    </ul>

    <ul>
        <label for="">mettre à jour</label>
        <input type="submit" name="valid_modif_employe" value="Mettre à jour" >

    </ul>  
    
    </form>
     

    <?php
    };// fin boucle selection employé


    // si aucun employé selectionné
    if ($id_selection_employe=='') {
        // création d'un employe
        //echo " ici CREER <br>";

        //affiche_variables_session();
        


        $equipe_nom= $_SESSION['equipe_login'];
        $login_aleatoire= generer_login(3, $equipe_nom) ;
        $alibaba_employe= generer_mot_de_passe(3);?>

        <form class="contact_form"  Method="post" name="formulaire_modif_employe">



            <ul>
                 <input type="number" name="id_selection_employe" value=NULL hidden>

                <li>
                    <label for="login ">login :</label>
                    <input type="text" id="employe_login" name="employe_login" size="30" placeholder=""  value="<?php echo $login_aleatoire ;?>" required > 
                    
                </li><br/>

                <li>
                    <label for="login ">mot de passe :</label>
                    <input type="text" id="employe_mdp" name="employe_mdp" size="30" placeholder=""  value="<?php echo $alibaba_employe ;?>" required > 
                    
                </li><br/> 
                               
                <li>
                    <label for="nom ">Nom :</label>
                    <input type="text" id="employe_nom" name="employe_nom" size="50" placeholder="DUPOND"  required >
                    
                </li><br/>

                <li>
                    <label for="nom ">Prénom :</label>
                    <input type="text" id="employe_nom" name="employe_prenom" size="50" placeholder="Jean"  required >
                    
                </li><br/>
                

            </ul>
            <ul>
                <label for="">Créér une fiche</label>
                <input type="submit" name="valid_modif_employe" value="Mettre à jour" >

            </ul>

            
        </form>



        <?php

    }


}// fin partie équipe connectée

else { // __________________________partie equipe  non connectée_________________ ?>

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



