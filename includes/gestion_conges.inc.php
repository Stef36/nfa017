<section class="flex">
    <H2>INFORMATION EMPLOYE</H2>
    <?php
    $id_selection_employe=$_SESSION['id_selection_employe'];
    
        $sql_requete_noms = "SELECT employe_id, employe_nom,
                        employe_prenom
                        FROM employe
                        
                       LEFT JOIN
                         equipe ON employe_id = equipe.equipe_id
                        
                        
                        WHERE (employe_id = '$id_selection_employe' IS TRUE);";
                        
            $noms_prenoms = $pdo -> query($sql_requete_noms);
            
            while ($nom_prenom = $noms_prenoms -> fetch()){ ?>
                
               
<?php
        $sql_requete_equipe = "SELECT equipe_id, equipe_nom
                            FROM equipe
                            WHERE (equipe_id = '$id_selection_employe' IS TRUE);";
            $equipes = $pdo -> query($sql_requete_equipe);
            while ($equipe = $equipes -> fetch()){ ?>
                
                    <br>
                    <p>Nom : <?php echo $nom_prenom['employe_nom'];?></p>
                    <br>
                    <p>Prénom : <?php echo $nom_prenom['employe_prenom']; ?></p>
                    <br>
                    <p>Equipe : <?php echo $equipe['equipe_nom'];?></p>
               
                
                <?php
            }}
              
            
            ?>
  
</section>