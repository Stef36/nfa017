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

    <h2>Formulaire de demande de congés.</h2>

    <H3>
        Vous pouvez ici selectionner et poser vos congés.
    </H3>

    <section class="formulaire_pose_conge">

        <form method="post" name="formulaire_pose_conge" class="flex_employe" >
             

            <div id="type_conge"> <?php

            $sql_employe_dispose_type_conges =
                                "   SELECT  type_conge_id, type_conge_nom,
                                      type_conge_unite, type_conge_logo

                                    FROM `type_conge` T 
                

                                    WHERE type_conge_valable=1
                                        
                                    ;";



            $employe_dispose_type_conges = $pdo -> query($sql_employe_dispose_type_conges);

            while($employe_dispose_type_conge= $employe_dispose_type_conges->fetch()){ ?>
                <p>
                    <input type="radio" 
                            name="type_conge_id" 
                            value="<?php echo $employe_dispose_type_conge['type_conge_id']; ?>" >

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
            <input type="text" name="conge_commentaire"/>
            <p>Prêt ?</p>
            <input type="submit" name= "envoi" value= "Envoyer">
            <input type = "reset" name = "annule" value = "Annuler">    
            </div>
            

            </form>
        </section>
        



    </article>

 	


 	<?php
 } ?>
