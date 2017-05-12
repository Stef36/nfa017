<!--==================COMMENT CREER UNE EQUIPE====================-->
<?php

// ---------   si aucun  employé n' est connectée-------------------------------
if (! isset($_SESSION['ticket_employe'])) { ?>



    <article>

    <h2>Formulaire pour poser vos congés</h2>

    <H2>
        Une fois connecté, vous pourrez ici selectionner et poser vos congés:
    </H2>

        <section class="formulaire_pose_conge">

        <form method="post" name="formulaire_pose_conge" >
             

            <div id="type_conge">                 <p>
                    <input type="radio" 
                            name="type_conge_id" 
                            value="1" >

                    CONGE PAYE en jour                <p>
                    <input type="radio" 
                            name="type_conge_id" 
                            value="2" >

                    ANCIENNETÉ en jour                <p>
                    <input type="radio" 
                            name="type_conge_id" 
                            value="4" >


                    SABBATIQUE en jour                <p>
                    <input type="radio" 
                            name="type_conge_id" 
                            value="8" >

                    RAISON FAMILIALE en jour                <p>
                    <input type="radio" 
                            name="type_conge_id" 
                            value="9" >

                    PARENTAL EDUCATION en jour                <p>
                    <input type="radio" 
                            name="type_conge_id" 
                            value="10" >

                    JRTT en jour                <p>
                    <input type="radio" 
                            name="type_conge_id" 
                            value="11" >

                    MALADIE en jour                <p>
                    <input type="radio" 
                            name="type_conge_id" 
                            value="12" >

                    ABSENCE NON AUTORISEE en heure 

                    </input>
                </p>
                
            </div>

            <div id="date_conge">

                <p> Date de début
                <input type="date" 
                name="conge_date" 
                value="2017-05-08" >
                </input>
                
                Heure éventuelle
                <input type="time" 
                name="conge_time" 
                value="00:00:00" >

                </input>
                </p>


            </div>

            <div id="quantite_conge">

            <p>De combien de congé avez-vous besoin ?</p>
            <input 
            type="number" 
            name="conge_quantite"
            min="0"
            step="0.5"
            >
                
            </div>

            <div id="valide">
            <p>Vous pouvez choisir de ne pas poser tout de suite</p>
            <input type="radio" 
            name="conge_demande" 
            value="1" checked=""> Je pose
            <input type="radio" 
            name="conge_demande" 
            value="0" > Je ne pose pas encore.          
            </input>

            <p>Vous pouvez entrer un commentaire:</p>
            <input type="text" name="conge_commentaire"/>

            </div>
            

            </form>
        </section>
        



    </article>

<p>Bons congés !</p>

<?php 
}


// ---------   si un employé est connectée-------------------------------

else { ?>
 	


    <!--  =============== insertion en BD du congé================-->
    <!--  ===============     le cas échéant      ================-->
    
        <?php if(isset($_POST['type_conge_id'])) {


            //echo 'type_conge_id->'.$_POST['type_conge_id'].' <br>';
            $type_conge_id=$_POST['type_conge_id'];

            //echo 'conge_date->'.$_POST['conge_date'].' '.$_POST['conge_time'].' <br>';
            $conge_datedebut=$_POST['conge_date'].' '.$_POST['conge_time'];
            
            //echo 'conge_quantite-> '.$_POST['conge_quantite'].' <br>';
            $conge_quantite=$_POST['conge_quantite'];

            //echo 'conge_commentaire-> '.$_POST['conge_commentaire'].' <br>';
            $conge_commentaire=$_POST['conge_commentaire'];

            //echo 'conge_demande-> '.$_POST['conge_demande'].' <br>';
            $conge_demande=$_POST['conge_demande'];

            $employe_id=$_SESSION['employe_id'];





            // requete d'insertion en BD
            $sql_insert_conge= "INSERT INTO conge
                                SET conge_datedebut=?, conge_quantite=?, conge_commentaire=?, conge_demande=?, employe_id=?, type_conge_id=? ; ";

            $nouvelles_valeurs= array($conge_datedebut, $conge_quantite,$conge_commentaire, $conge_demande, $employe_id, $type_conge_id );

            // insert de l'enregistrement
            applique_requete($sql_insert_conge, $pdo, $nouvelles_valeurs);

            } ?>
    

 	<!--  =================== article  ==========================-->

    <article>

    

    <?php 

        if (isset($_POST['select_conge_pour_modif'])){ ?>
        <H2>Modifier un congé déjà posé:</H2>
        <H3>Vous pouvez ici changer une ou des caracteristiques de votre congé.</H3>

        

        

    <?php } 
        else { ?>

         <h2>Formulaire de demande de congés.</h2>
         <H3>Vous pouvez ici selectionner et poser vos congés.</H3>
       <?php }?>

    

    <?php //include("./includes/conges_modifier_employe.inc.php"); ?>

    

    <section class="formulaire_pose_conge">

        <form method="post" name="formulaire_pose_conge"  >
             

            <div id="type_conge"> <?php


            // requete de recherche des différents type de congés proposés //

            $sql_employe_dispose_type_conges =
                                "   SELECT  type_conge_id, type_conge_nom,
                                      type_conge_unite, type_conge_logo

                                    FROM `type_conge` T 
                

                                    WHERE type_conge_valable=1
                                        
                                    ;";

            $employe_dispose_type_conges = $pdo -> query($sql_employe_dispose_type_conges);


            // si on veut modifier un congé, en venant de mes_conges_consulter.php
            if (isset($_POST['select_conge_pour_modif'])){

                // requete de recherche des caracteristique du congé
                $conge_id=$_POST['select_conge_pour_modif'];

                $sql_donnees_du_conge =
                                "SELECT conge_id, type_conge_id, conge_datedebut,conge_quantite,conge_commentaire 
                                FROM conge 
                                WHERE conge_id='$conge_id';";


                // on applique la requête à l'objet
                $donnees_du_conge=$pdo->query($sql_donnees_du_conge);

                // on recupère les variables
                while ( $donnee_du_conge=$donnees_du_conge->fetch()) {
                    # code...
                    echo "id_conge à modifier => ".$donnee_du_conge['conge_id'];
                    $type_conge_a_modif=$donnee_du_conge['type_conge_id'];
                    $date_debut_conge_a_modif=$donnee_du_conge['conge_datedebut'];
                    $quantite_conge_a_modif=$donnee_du_conge['conge_quantite'];
                    $commentaire_conge_a_modif=
                    htmlentities($donnee_du_conge['conge_commentaire'],ENT_QUOTES, "UTF-8");

                }

            }







            while($employe_dispose_type_conge= $employe_dispose_type_conges->fetch()){ ?>
                <p>
                    <input type="radio" 
                            name="type_conge_id" 
                            value="<?php echo $employe_dispose_type_conge['type_conge_id']; ?>"

                            <?php 

                            // si on veut modifier le congé
                            if (isset($_POST['select_conge_pour_modif']))
                                {
                                    if ($type_conge_a_modif==$employe_dispose_type_conge['type_conge_id']) {
                                        # code...
                                        echo "checked='checked'";
                                    }
                                
                            } ?>


                             >

                    <?php
                    echo $employe_dispose_type_conge['type_conge_nom'].' en '.$employe_dispose_type_conge['type_conge_unite'];

                    } ?> 

                    </input>
                </p>
                
            </div>

            <div>
            <div id="date_conge">

                <p> Date de début
                <input type="date" 
                name="conge_date" 
                value="<?php echo date('Y-m-d')?>" >
                </input>
                </p>
                
                <p>Heure éventuelle
                <input type="time" 
                name="conge_time" 
                value="<?php echo "00:00:00"?>" >

                </input>
                </p>


            </div>

            <div id="quantite_conge">

            <p>De combien de congé avez-vous besoin ?</p>
            <input 
            type="number" 
            name="conge_quantite"
            min="0"
            step="0.5"

                <?php
                // si on veut modifier le congé
                if (isset($_POST['select_conge_pour_modif']))
                {
                // on préselectionne la valeur déjà demandée
                echo "value='$quantite_conge_a_modif'";                 
                }
                ?>

            >
                
            </div>
            </div>

            <div id="valide">




            <p>Vous pouvez choisir de ne pas poser tout de suite</p>
            <input type="radio" 
            name="conge_demande" 
            value="1" checked=""> Je pose
            <input type="radio" 
            name="conge_demande" 
            value="NULL" > Je ne pose pas encore.          
            </input>

            <p>Vous pouvez entrer un commentaire:</p>
            <input 
            type="text" 
            name="conge_commentaire"
                <?php
                // si on veut modifier le congé
                if (isset($_POST['select_conge_pour_modif']))
                {
                // on préselectionne la valeur déjà demandée
                echo "value='$commentaire_conge_a_modif'";                 
                }
                ?>

            />



            <p>Prêt ?</p>
            <input type="submit" name= "envoi" value= "Envoyer">
            <input type = "reset" name = "annule" value = "Annuler">    
            </div>
            

            </form>
        </section>
        



    </article>

 	


 	<?php
 } ?>
