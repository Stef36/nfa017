
<H2> Gestion des équipes de travailleurs </H2>

<!-- bouton de retour au choix d'administration -->
<p><a href="backoffice.php"><img src="./images/boutons/retour.png"></a><p>


<?php

	$sqlequipe = "SELECT 	equipe_id, equipe_visible,
							equipe_login, equipe_nom, equipe_entreprise,
							equipe_responsable,
							equipe_mail, equipe_logo
							
					FROM 	equipe " ;
		
		$equipes= $pdo->query($sqlequipe); ?>
		
		
		
		<form name="choix-equipes" method="POST" action="./administration_equipes_modif.php">
		
		<table id="tableau_messages">
			<tr>
				
				<th>id <br/>(* visible)</th>
				
				<th>login</th>
				<th>Nom</th>
				<th>Entreprise</th>
				<th>Mail</th>
				
			</tr>

		

		<?php 
		while ($equipe = $equipes->fetch()) {
				?> 	
				
				<tr>
				
					
					<td><input type="radio" name="choixEquipe" id="choixEquipe"  value = "<?php echo $equipe['equipe_id']; ?>" >
						<?php echo $equipe['equipe_id']; 
						if ($equipe['equipe_visible']){echo '*';}?>
					</td>
					<td><?php echo $equipe['equipe_login']?></td>
					<td><?php echo $equipe['equipe_nom'].' '.$equipe['equipe_nom']?>
					<td><?php echo $equipe['equipe_entreprise']?></td>
					<td><?php echo $equipe['equipe_mail']?></td>

					</td>
					
				
				
				</tr>
				<?php 
				}?> 
		
		
		</table>		
		<input type="submit" name="soumission" id="soumission" value="Selectionner pour modifier" />
		</form>
		

			
