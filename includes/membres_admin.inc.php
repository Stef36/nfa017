<section>
<H2> Gestion des membres du Back-Office </H2>
<br>

<!-- bouton de retour au choix d'administration -->
<p><a href="backoffice.php" class="liens-direct">Retour</a><p>

<br>
<?php

    $sqlmembre = "SELECT     mem_id, mem_login, mem_nom, mem_prenom,
                            mem_date_naiss,
                            mem_email, mem_actif, mem_lien_photo,
                            mem_persona, mem_description
                            
                    FROM         membre " ;
        
        $membres= $pdo->query($sqlmembre); ?>
        
        
        
        <form name="choix-membres" method="POST" action="./administration_membres_modif.php">
        
        <table id="tableau_messages">
            <tr>
                
                <th>id</th>
                <th>login</th>
                <th>Membre<br/>actif ?</th>
                <th>Prénom Nom</th>
                <th>Mail</th>
                <th>Date naissance</th>
                <th>Description</th>
            </tr>

        

        <?php 
        while ($membre = $membres->fetch()) {
                ?>     
                
                <tr>
                
                    
                    <td><input type="radio" name="choixMembre" id="choixMembre"  value = "<?php echo $membre['mem_id']; ?>" >
                        <?php echo $membre['mem_id']; 
                        if ($membre['mem_persona']=='Gestionnaire'){echo '*';}?>
                    </td>
                    <td><?php echo $membre['mem_login']?></td>
                    <td><?php if ($membre['mem_actif']){ echo ' X ';}?></td>
                    <td><?php echo $membre['mem_prenom'].' '.$membre['mem_nom']?></td>
                    <td><?php echo $membre['mem_email']?></td>
                    <td><?php echo $membre['mem_date_naiss']?></td>
                    <td><?php echo $membre['mem_description']?></td>
                
                
                </tr>
                <?php 
                }?> 
        
        
        </table>        
        <input type="submit" name="soumission" id="soumission" value="Selectionner pour modifier" />
        </form>

        <br>
        
</section>    
