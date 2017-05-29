<!--================  PRESENTATION DE L'EMPLOYE ====================-->

   <H2> L'EMPLOYE</H2>


<?php

    // si la connection de l'équipe n'est pas active
    if ( !isset($_SESSION['ticket_equipe']) 
        OR ($_SESSION['ticket_equipe'])==0
        OR !isset($_SESSION['id_selection_employe']))
    { ?>


 

    <div class="flex_employe">
        <div>
            <ul>
                <li>NOM : </li><br>
                <li>PRENOM : </li><br>
                <li>EQUIPE : </li><br>
            </ul>
        </div>

        <div>Commentaires</div>

        <div class ="photo">

            <img src="logos/Minion.jpg" alt="Photo employé">

        </div> 
    </div>


    <?php
    
    }


    // si l'equipe est loggée
    elseif ($_SESSION['ticket_equipe']==1)
         {



            $equipe_id = $_SESSION['equipe_id'];
            $employe_id= $_SESSION['id_selection_employe'];
             //echo "Employe-id: ".$employe_id;


             $sqlDecritEmploye = "SELECT employe_id, employe_login, employe_mdp, employe_nom, employe_prenom, employe_mail, employe_commentaire, employe_visible, employe_actif,  employe_logo, equipe_id
                            FROM         employe
                            WHERE  employe_id='$employe_id'
                            AND equipe_id='$equipe_id';";


             $fichesEmploye = $pdo -> query($sqlDecritEmploye);


             while ($ficheEmploye = $fichesEmploye->fetch()) { ?>
               
            <div class="flex_employe">
                <div>

                     <H3> <?php

                     echo $ficheEmploye['employe_prenom'].' '.$ficheEmploye['employe_nom']; ?>
                     </H3> 

                     <H4>Réferencement: <?php 
                        echo "employe_id -".$employe_id."-";?>
                     </H4>

                </div>

                <div>

                         <p>login:<br>"<?php
                         echo $ficheEmploye['employe_login']; ?>"</p>

                         <p>Adresse mail:<br>"<?php
                         echo $ficheEmploye['employe_mail']; ?>"</p>


                         <p>Votre commentaire (visible par l'employé):<br/>"<?php
                         echo $ficheEmploye['employe_commentaire']; ?>"
                         </p>
                </div>                

     
                <div>


                         <p>
                             <!-- insertion avatar employé -->

                             <?php

                                 # affiche le logo de l'équipe
                            if ($ficheEmploye['employe_logo']!=''){ 

                                  //affiche le logo via la fonction afficher_suivant_mime() 
                                    
                                  afficher_suivant_mime($ficheEmploye['employe_logo'],NULL,NULL , NULL,  NULL );

                            } else afficher_suivant_mime("./logos/question-423604_960_720.png","MesRepos" , NULL, 'logo_equipe', NULL ); ?>

                         </p>

                </div>


            </div>

                 

           

                <?php


             }


             }?>

