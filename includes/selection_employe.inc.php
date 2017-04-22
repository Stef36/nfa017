   


   <?php

    if (isset($_SESSION['ticket_equipe'])) 
    {
    	
  



        $equipe_id = $_SESSION['equipe_id'];

        $sql_employes_de_l_equipe="  SELECT employe_id, employe_login, employe_mdp, employe_nom, employe_prenom, employe_mail, employe_commentaire, employe_visible, employe_actif, employe_logo
                                FROM  employe
                                WHERE equipe_id = '$equipe_id';";

        $employes_de_l_equipe= $pdo -> query($sql_employes_de_l_equipe);

                                echo $equipe_id; ?>



     <H2>Selectionnez ou incrire un nouvel employé:</H2>

     <form method="post" name="selection_employe">


				<?php
     			// si un choix a déjà été effectué
				 if (isset($_POST['select_employe'])) {
     				$selection_post=$_POST['select_employe'];

     				// on cherche où se trouve "  ->"
     				$findme   = ' ->';
     				$pos = strpos($selection_post, $findme);
     				echo $pos;

     				$id_selection_employe= substr($selection_post, 0, $pos);

     				echo $id_selection_employe;


     			};?>



     		<select name="select_employe" size="1">

     			<option    <?php if (!isset($_POST['select_employe'])) {
     				echo "selected";
     			}; ?>                           >nouvel employe</option>
     			
     			<?php 

     				while ( $employe_de_l_equipe=$employes_de_l_equipe->fetch()) {?>

		     			<option>
		     			<?php echo $employe_de_l_equipe['employe_id'].' -> '. $employe_de_l_equipe['employe_nom'].' '.$employe_de_l_equipe['employe_prenom'];  ?>
		     				
		     			</option> 


		     		<?php 
     				} 
     			?>

     			
     		</select>

     		<input type="submit" name="submit" value="OK">
     	

     </form> <?php
 
  }

  ?>
   