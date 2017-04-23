   


   <?php

    if (isset($_SESSION['ticket_equipe'])) 
    {
    	
  
                // entrée en BD des modifications faites en "inscription_personnel.inc.php"
                include("includes/inscription_personnel_VALID.inc.php");


        $equipe_id = $_SESSION['equipe_id'];

        // requete de selection des champs des employés de l'équipe
        $sql_employes_de_l_equipe="  SELECT employe_id, employe_login, employe_mdp, employe_nom, employe_prenom, employe_mail, employe_commentaire, employe_visible, employe_actif, employe_logo
                                FROM  employe
                                WHERE equipe_id = '$equipe_id';";

        $employes_de_l_equipe= $pdo -> query($sql_employes_de_l_equipe);

        echo 'equipe_id -> '.$equipe_id; ?>



     <H2>Selectionnez ou incrire un nouvel employé:</H2>


     <!-- formulaire de selection de l'employé -->
     <form method="post" name="selection_employe">


				<?php
     			// si un choix a déjà été effectué, recupere l'employe_id
     			// de ce choix:
				 if (isset($_POST['select_employe'])) {

				 	// met la selection dans une variable
     				$selection_post=$_POST['select_employe'];
     				//echo $selection_post;

     				// on cherche où commence "->"
     				$findme   = '-';
     				$pos = strpos($selection_post, $findme);
     				//echo $pos;

     				// on coupe la chaine jusqu'au début de "  ->"
     				// pour extraire id_employe
     				$id_selection_employe= substr($selection_post, 0, ($pos-1));

     				if ($id_selection_employe=='nouvel employ') {
				 		$id_selection_employe=NULL;
				 	}

     				echo 'employe_id -'.$id_selection_employe.'-';
                    $_SESSION['id_selection_employe']=$id_selection_employe;

     			};




                ?>



     		<select name="select_employe" size="1">

     			<option    <?php if (!isset($_POST['select_employe'])) 
     								{
     								$id_selection_employe=NULL;
     								echo "selected"; 
     								}; ?>  >nouvel employe
     			</option>
     			
     			<?php 
     				// boucle d'affichage pour ajouter chaque employé
     				// à la liste déroulante
     				while ( $employe_de_l_equipe=$employes_de_l_equipe->fetch()) {?>

		     			<option  <?php if ( 
		     				(isset($_POST['select_employe']))
		     				 &
		     				($id_selection_employe==$employe_de_l_equipe['employe_id'])) 
		     				{
		     				echo "selected"; // choix par défaut
		     				}; ?> >
		     			<?php echo $employe_de_l_equipe['employe_id'].' -> '. $employe_de_l_equipe['employe_nom'].' '.$employe_de_l_equipe['employe_prenom']; 

		     			?>
		     				
		     			</option> 


		     		<?php 
     				} 
     			?>

     			
     		</select>

     		<input type="submit" name="submit" value="OK">
     	

     </form> 

     <p> --------------------------</p><?php
 
  }

  ?>
   