   

    <h2>Les équipes qui nous font confiance :</h2> <?php

        $sqlequipe = "SELECT    equipe_id, equipe_visible,
                                equipe_login, equipe_nom, equipe_entreprise,
                                equipe_responsable,
                                equipe_mail, equipe_logo
                            
                    FROM        equipe
                    WHERE       equipe_visible=1
                    ORDER BY    equipe_nom  ;" ;
        
        $equipes= $pdo->query($sqlequipe); ?>


        <span class="flex_logo"> <?php 


        while ($equipe = $equipes->fetch()) {
                // affichage des logos des équipes ?>
            
                    <span class="nom_equipe">

            
                        <!-- affiche le nom de l'équipe -->
                        <p><?php echo $equipe['equipe_nom']; ?></p>
                        <?php

                        if ($equipe['equipe_logo']!=''){ ?>
                            <!-- affiche le logo via la fonction afficher_suivant_mime() -->
                        <?php
                        afficher_suivant_mime($equipe['equipe_logo'],$equipe['equipe_entreprise'] , NULL, 'logo_equipe', NULL );

                        }


                         else afficher_suivant_mime("./logos/question-423604_960_720.png","MesRepos" , NULL, 'logo_equipe', NULL ); ?>
                        
                    </span> <?php

                } ?>



        </span> 