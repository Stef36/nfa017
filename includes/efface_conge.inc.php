<?php

        $conge_a_effacer=$_POST['select_conge_pour_modif'];
        $valeur = array($conge_a_effacer);

        $sql_EFFACE_conge=" DELETE FROM conge
                            WHERE conge_id = ?;
                            ";
        // suppression effective du conge
        applique_requete($sql_EFFACE_conge, $pdo, $valeur);

        ?>

        <p class="red"><?php 
        echo 'Vous avez effacé le congé (id => '.$_POST['select_conge_pour_modif'].')'; ?>
        </p> 
        <p>
        <a href="./mes-conges-consulter.php">retour</a>
        </p>
        
        <?php
