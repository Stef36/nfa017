
<H2> Gestion des équipes de travailleurs </H2>

<br>

<!-- bouton de retour au choix d'administration -->
<p><a href="backoffice.php" class="liens-direct">Retour</a><p>
<br>

<?php

	require('./includes/fonctions_utiles.php');//pour affichage des logos


	$sqlequipe = "SELECT 		equipe_id, equipe_mdp, equipe_visible,
								equipe_login, equipe_nom, equipe_entreprise,
								equipe_responsable,
								equipe_mail, equipe_logo
							
					FROM 		equipe 
					ORDER BY    equipe_visible DESC ;" ;
		
		$equipes= $pdo->query($sqlequipe); ?>
		
		
		
		<form name="choix-equipes" method="POST" action="./administration_equipes_modif.php">
		
		<table id="tableau_messages">
			<tr>
				
				<th>id <br/>(*visible)</th>
				
				<th>login<br/>(*mdp-actif)</th>
				
				<th>logo</th>				
				<th>Nom de l'équipe</th>
				<th>Nom du responsable</th>
				<th>Entreprise</th>
				<th>Mail</th>
				
			</tr>

		
		<?php 
		while ($equipe = $equipes->fetch()) {
				?> 	
				
				<tr>
				
					
					<td><input type="radio" name="choixEquipe" id="choixEquipe"  value = "<?php echo $equipe['equipe_id']; ?>" >
						<?php echo $equipe['equipe_id']; 
						if ($equipe['equipe_visible']){echo '*';};

						?>
					</td>

					<td><?php echo $equipe['equipe_login'];
							if ($equipe['equipe_mdp']) {
								echo '<br/>***mdp***';
								};?>
									
					</td>

					<!-- insertion du logo -->
					<td> 

					<?php if ($equipe['equipe_logo']) {
						# code...
						afficher_suivant_mime($equipe['equipe_logo'],$equipe['equipe_entreprise'] , NULL, 'logo_equipe', NULL );
					}

					 ?>

					<!--
					<img src="<?php echo $equipe['equipe_logo']?>"
							class="logo_equipe" ></img> -->

					</td>

					<td><?php echo $equipe['equipe_nom']?>
					<td><?php echo $equipe['equipe_responsable']?>				
					<td><?php echo $equipe['equipe_entreprise']?></td>
					<td><?php echo $equipe['equipe_mail']?></td>

					</td>
							
				
				</tr>
				<?php 
				}?> 
		
		
		</table>		
		<input type="submit" name="soumission" id="soumission" value="Selectionner pour modifier" />
		</form>
		<br>
