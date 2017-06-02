
<?php

    $sql_requete_noms = "SELECT employe_nom,
                        employe_prenom
                        FROM employe
                        WHERE employe_nom='LARUELLE' 
                ;";
        
        $noms_prenoms = $pdo -> query($sql_requete_noms);
         while ($nom_prenom = $noms_prenoms -> fetch()){ ?>
        


                    <p><?php echo $nom_prenom['employe_nom'];?></p>
                    <br>
                    <p><?php echo $nom_prenom['employe_prenom'];?></p>
                    
                     <?php
            }
              
            
            ?>