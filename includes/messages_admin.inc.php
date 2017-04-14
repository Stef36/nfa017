
<?php

	$_SESSION['vientDeAdminContenu']=0;
	$tri=$_SESSION ['ordre_messages'];?>

<H2> Affichage des messages reçus</H2>

<!-- ==================================================================  -->		
		<form name="form_tri" method="POST" action="./administration_page.php">
  			
  			<table>	
  		      	<tr>
        			<th>Vous pouvez trier par: </th>
        				<td><input type="radio" name="tri_messages" id="ids"  value="contact_id" />id<br/>
							<input type="radio" name="tri_messages" id="prenoms" value="contact_prenom" />Prenoms<br/>
             				<input type="radio" name="tri_messages" id="noms" value="contact_nom" />Noms<br/>
							<input type="radio" name="tri_messages" id="objets" value="contact_objet" />objet du message<br/>
             				<input type="radio" name="tri_messages"  id="dateTimes"  value="contact_dateTime" />Dates Times<br/>
             			</td>
					<th>ordre: </th>
						<td><select  name="tri_ordre" id="tri_ordre"   />
								<option value=" ASC"  >ascendant</option>
								<option value=" DESC" selected="selected">descendant</option>
							</select>
						</td>
      			</tr>	
      			<tr>
        			<th>Tri actuel: <?php echo $_SESSION ['ordre_messages']; ?></th>
        			<td><input type="submit" name="soumission" id="soumission" value="Trier" /></td>
      			</tr>
				
				
  			</table>
  		</form>
  		
<!-- ==================================================================  -->
<p><a href="backoffice.php"><img src="./images/boutons/retour.png"></a><p>
<!-- ==================================================================  -->


<?php

	$sqlmessage = "SELECT 		*
		FROM 		contact 
		ORDER BY $tri ;" ;
		
		$messages= $pdo->query($sqlmessage); ?>
		
		<table id="tableau_messages">
		<tr>
			<th>id</th>
			<th>sel</th>
			<th>Login souhaité</th>

			<th>Prénom Nom</th>
			<th>mail</th>
			<th>tel</th>
			<th>Objet</th>

			<th>Message</th>
			<th>Date Time</th>
			<th>IP visiteur</th>
		</tr>



		<!-- formulaire à vocation double: montrer les messages, et 
			permettre de selectionner un message pour inscription de l'équipe -->
		<form name="select_message_inscription" method="POST" action="./administration_inscription_equipe.php">
		
			<?php 
			while ($message = $messages->fetch()) {
			?> <tr>
				<td><?php echo $message['contact_id']?></td>
				<td>
				<?php if ($message['contact_objet']=='contact'
							& $message['contact_login_souhait']!='' ){?>

					<input type="radio" name="selection_id" id="selection_id" 
				 value="<?php  echo $message['contact_id']; ?> " />				

					<?php } ?>

				</td>

				<td><?php echo $message['contact_login_souhait']?></td>		 

				<td><?php echo $message['contact_prenom'].' '.$message['contact_nom']?></td>
				<td><?php echo $message['contact_email']?></td>
				<td><?php echo $message['contact_telephone']?></td>
				<td><?php echo $message['contact_objet']?></td>
				<td><?php echo $message['contact_message']?></td>
				<td><?php echo $message['contact_dateTime']?></td>
				<td><?php echo $message['contact_adresseIP']?></td>
				</tr>
				<?php /* fin de la boucle d'affichage */
				}
				$_SESSION ['flag_requete_ajout_equipe']=0; ?>
				<td><input type="submit" name="soumission" id="soumission" value="Inscrire" /></td>
		</form>

		</table>
		
<H2> Création du fichier CSV de la liste des messages.</H2>


		

			
