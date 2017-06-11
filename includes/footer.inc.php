
<?php

    $sql_requete_noms = "SELECT mem_nom, mem_prenom 
                        FROM membre 
                        WHERE mem_prenom != 'Philippe'
                        AND mem_prenom != 'David';";
            
        $noms_prenoms = $pdo -> query($sql_requete_noms); ?>

        <p>Site conçu par : <br><?php
        
        while ($nom_prenom = $noms_prenoms -> fetch()){ ?>
            
                    
                    <?php echo $nom_prenom['mem_prenom'];?>&nbsp; <?php echo $nom_prenom['mem_nom'];?><br>
                    
                     <?php
            } ?></p>

           ?>