<?php  // mise en BD des modifications faites en "attribution_conges.inc.php"


	//echo "<br>DANS attribution_conges_VALID<br>";

		

	if ( isset($_POST['valid_attribution_conges']) ) 
	{

		//echo $_POST['valid_attribution_conges'];

		
		if (isset($_POST['id_selection_employe'])) {

			$employe_id=$_POST['id_selection_employe'];

			//echo $employe_id."<br>";
			} 	



		     /* requete selection des types congés */

            $sql_types_conges = "SELECT type_conge_id 
                                FROM type_conge ;";

            $types_conges = $pdo-> query($sql_types_conges);

            // parcourt la liste des type_conge
            while ( $type_conge=$types_conges->fetch()) {

            	//echo "<br/>".$type_conge['type_conge_id']."<br/>";


            	// recupere id du congé
            	$index=$type_conge['type_conge_id'];
            	//echo $index."<br/>";


            	// recupere l'attribution du congé
            	$value = $_POST[$index];
            	//echo "index congé =>".$index." valeur=".$value." <br/>";
            	

            	$sql_recherche_si_employe_dispose_conges_definit=
            				"SELECT disposer_quantite, type_conge_id
            				FROM disposer
            				WHERE employe_id='$employe_id'
            				AND type_conge_id= '$index';";

				$employe_dispose_conges_definit=$pdo-> query($sql_recherche_si_employe_dispose_conges_definit);


				$sql_update_disposer=
							"UPDATE disposer
							SET disposer_quantite = ? 
							WHERE employe_id= ? AND type_conge_id= ?;";

				$sql_insert_disposer=
							"INSERT INTO disposer
							SET disposer_quantite = ?, employe_id= ?, type_conge_id= ?; ";


				// si une valeur d'un congé a déjà été attribuée
				if ( $employe_dispose_conge_definit=$employe_dispose_conges_definit->fetch()) { 

					$quantite=$employe_dispose_conge_definit['disposer_quantite'];
					//echo "l'employé dispose dejà de ".$quantite."<br/>";

					if ($quantite != $value) { // si la quantité change
						//echo "<br>DANS update disposer<br/>";
						$nouvelles_valeurs= array ($value, $employe_id, $index );

						// update de l'enregistrement
						applique_requete($sql_update_disposer, $pdo, $nouvelles_valeurs);

						//echo "UPDATE en BD  <br/>";
						}

						// sinon ne fait rien

	
				}

				// si une valeur d'un congé n'a pas déjà été attribuée

				elseif ($value!=NULL) {
					
					//echo "<br>DANS insert disposer<br/>";
					$nouvelles_valeurs= array ($value, $employe_id, $index );
					// insertion du congé et de sa valeur

					applique_requete($sql_insert_disposer, $pdo, $nouvelles_valeurs);					

				}

            	


         

            }



		

		

		echo "modifications en préparation...<br/>";


		// recupe des POSTS
		
		$equipe_id=$_SESSION['equipe_id'];

		// prepare le tableau des valeurs à updater ou inserer
		// $nouvelles_valeurs[10] correspond à l'employe_id
		//$nouvelles_valeurs = array ();
		

			
	}
	
	else echo "<br/>-----  AUCUN CHANGEMENT sur ATTRIBUTION EN BD  ------<br/>";
	$_POST['valid_attribution_conges']=NULL;


 ?>