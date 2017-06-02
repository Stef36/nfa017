
<?php

    $sql_name = "SELECT employe_nom, employe_prenom
                FROM employe
                WHERE employe_nom='DUFOUR', employe_prenom='Dominique', employe_nom='LARUELLE', employe_prenom='Stéphane';
                
                ";
        
        $names = $pdo -> query($sql_name);?>
        