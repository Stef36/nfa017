
<?php

    $sql_requete_noms = "SELECT employe_id, employe_nom,
                        employe_prenom
                        FROM employe
                        WHERE employe_id=1 OR employe_id=5
                ;";
            
        $noms_prenoms = $pdo -> query($sql_requete_noms);
       
        
        while ($nom_prenom = $noms_prenoms -> fetch()){ ?>
            
                    
                    <p><?php echo $nom_prenom['employe_nom'];?>&nbsp; <?php echo $nom_prenom['employe_prenom'];?></p>
                    
                     <?php
            }
           ?>
            
<!--=========================================================-->
