<!--==================COMMENT CREER UNE EQUIPE====================-->


<?php

    // si la connection de l'équipe n'est pas active
    if ( !isset($_SESSION['ticket_equipe']) OR ($_SESSION['ticket_equipe'])==0)
    { ?>


    <H2>GESTION DES CONGES</H2>

    <ul>
        <li>NOM : </li><br>
        <li>PRENOM : </li><br>
        <li>EQUIPE : </li><br>
    </ul>

    <div class ="photo">

        <img src="logos/Minion.jpg" alt="Photo employé">

    </div> <?php
    
    }


    // si l'equipe est loggée
    elseif ($_SESSION['ticket_equipe']==1)
         {




            $employe_id= $_SESSION['employe_id'];
             //echo "Employe-id: ".$employe_id;

             ?><h2>Les COORDONNEES de l'EMPLOYE:</h2> <?php

             


             $sqlDecritEmploye = "SELECT employe_id, employe_login, employe_mdp,                                     employe_nom, employe_prenom, employe_mail, employe_commentaire, employe_visible, employe_actif,  employe_logo, equipe_id
                            FROM         employe
                            WHERE  employe_id='$employe_id';";





             $fichesEmploye = $pdo -> query($sqlDecritEmploye);

             while ($ficheEmploye = $fichesEmploye->fetch()) { ?>

                 <H3> <?php

                 echo $ficheEmploye['employe_prenom'].' '.$ficheEmploye['employe_nom']; ?>
                 </H3> 

                 <H4>Réferencement sur le site: <?php echo "employe_id -".$employe_id."-";?>
                     
                 </H4>

                 <section class="flex_employe" >

                 


                 <span>


                     <p>
                         <!-- insertion avatar employé -->

                         <?php

                             # affiche le logo de l'équipe
                        if ($ficheEmploye['employe_logo']!=''){ 

                              //affiche le logo via la fonction afficher_suivant_mime() 
                                
                              afficher_suivant_mime($ficheEmploye['employe_logo'],NULL,NULL , NULL,  NULL );

                        } else afficher_suivant_mime("./logos/question-423604_960_720.png","MesRepos" , NULL, 'logo_equipe', NULL ); ?>

                     </p>
                 </span>

                 <span>

                     <p>Votre login:<br>"<?php
                     echo $ficheEmploye['employe_login']; ?>"</p>

                     <p>Votre mail:<br>"<?php
                     echo $ficheEmploye['employe_mail']; ?>"</p>


                     <p>    Le commentaire de votre responsable:<br/>"<?php
                     echo $ficheEmploye['employe_commentaire']; ?>"
                     </p>
                 </span> 


                 

                 </section>

                <?php


             }


             }?>

