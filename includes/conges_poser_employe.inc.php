<!--==================COMMENT CREER UNE EQUIPE====================-->
<?php

// ---------   si aucun  employé n' est connectée-------------------------------
if (! isset($_SESSION['ticket_employe'])) { ?>

<h2>ICI bientôt un formulaire pour poser vos congés</h2>



<p>Bons congés !</p>

<?php 
}


// ---------   si un employé est connectée-------------------------------

else { ?>
 	<h2>Formulaire de demande de congés.</h2>


    <!--  =============== insertion en BD du congé================-->
    <!--  ===============     le cas échéant      ================-->
    <p>
        <?php if(isset($_POST['type_conge_id'])) {
            echo 'conge_id->'.$_POST['type_conge_id'].' <br>';
            echo 'conge_date->'.$_POST['conge_date'].' '.$_POST['conge_time'].' <br>';
            echo 'conge_quantite-> '.$_POST['conge_quantite'].' <br>';
            echo 'conge_commentaire-> '.$_POST['conge_commentaire'].' <br>';

            } ?>
    </p>

 	<!--  =================== article  ==========================-->

    <article>

    <p>
        Vous pouvez ici selectionner et poser vos congés.
    </p>

        <section class="formulaire_pose_conge">

        <form method="post" name="formulaire_pose_conge" >
             

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

            <div id="date_conge">

                <p> Date de début
                <input type="date" 
                name="conge_date" 
                value="<?php echo date('Y-m-d')?>" >
                </input>
                
                Heure éventuelle
                <input type="time" 
                name="conge_time" 
                value="<?php echo "08:00:00"?>" >

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
