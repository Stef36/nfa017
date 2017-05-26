<!--==================COMMENT CREER UNE EQUIPE====================-->


<?php  


// ---------   si une équipe est connectée-------------------------------
if (isset($_SESSION['ticket_equipe'])) { ?>
    <!-- affiche le login de l'équipe -->
    <p>login: <?php echo  $_SESSION['equipe_login']?></p> 


    <!-- affiche l'entreprise et le nom de l'équipe -->
    <H2> Entreprise ou Organisation:</H2> 
    <H3><?php echo  $_SESSION['equipe_entreprise']?></H3>
    <p>Equipe: <?php echo  $_SESSION['equipe_nom']?></p> 

    <!-- affiche le nom et l'email du responsable de l'équipe -->
    <H4> Responsable:<br/> M. ou Mme <?php echo  $_SESSION['equipe_responsable']?></H4> 
    <p>email: <?php echo  $_SESSION['equipe_mail']?></p> 



    <?php

    # affiche le logo de l'équipe
        if ($_SESSION['equipe_logo']!=''){ ?>
                                <!-- affiche le logo via la fonction afficher_suivant_mime() -->
                            <?php
                                afficher_suivant_mime($_SESSION['equipe_logo'],$_SESSION['equipe_entreprise'] , NULL, 'logo_equipe', NULL );

        } else afficher_suivant_mime("./logos/Dom.jpg","MesRepos" , NULL, 'logo_equipe', NULL );

    }



// ----------    si aucune équipe n'est connectée-------------------------------

else {


}


?>




