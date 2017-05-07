<!--==================COMMENT CREER UNE EQUIPE====================-->
<?php

// ---------   si une équipe est connectée-------------------------------
if (! isset($_SESSION['ticket_employe'])) { ?>

<h2>POUR CONSULTER VOS CONGES EN ETANT EMPLOYE<br>d'une entreprise ou membre d'une équipe.</h2>


<p>Une fois inscrit par votre responsable, vous pourrez consulter ici le solde de vos congés.</p>

<p>La section ci-dessous vous permettra de récapituler en un coup d'oeil:<br> les congés que vous avez posés, qui ont été accordés... ou refusés.</p>


<p>Bons congés !</p>

<?php 
}
else { ?>
 	<h2>------       Bienvenue sur le site Mes Repos!      ------</h2>

 	<p>Vous avez été inscrit par votre responsable ou par le chargé de votre équipe de travail. </p>
 	<p>Vous allez maintenant pouvoir profiter à fond des fonctionnalités du site.</p>
 	<p>N'hésitez pas à utiliser le formulaire de contact pour toute question.</p>
 	<p>De même pour nous signaler un disfonctionnement, ou si vous avez une idée d'amélioration du site.</p>
 	<p>Bon repos !</p>

 	<!--  =================== SOLDE DES CONGES ==========================-->


 	<H2>Voici le solde de vos congés:</H2>

 	<?php         

			$id_selection_employe=$_SESSION['employe_id'];

 			// requete de selection des type de congés et des congés attribués à l'employé:
            $sql_employe_dispose_combiens_type_conges =
                                "   SELECT  type_conge_nom,
                                     T.type_conge_id AS id_type_conge,
                                        disposer_quantite, type_conge_unite

                                    FROM `type_conge` T 
                                    LEFT JOIN 
                                    (SELECT * FROM disposer WHERE disposer.employe_id='$id_selection_employe' )
                                    AS D 

                                    ON T.type_conge_id = D.type_conge_id

                                    WHERE T.type_conge_valable=1
                                    	AND disposer_quantite != ''

                                    ;";


            $employe_dispose_type_conges = $pdo -> query($sql_employe_dispose_combiens_type_conges);


            // tableaux des congés attribués
            $tab_id=array();
            $tab_NOM=array();
            $tab_qt_attribuee = array();
            $tab_inite = array();



            // tableau des congés accordés à l'employé
            $tab_conges_accordes=array(); 

 			while($employe_dispose_type_conge= $employe_dispose_type_conges->fetch()){

                //echo $employe_dispose_type_conge['id_type_conge'];
                $tab_id[]= $employe_dispose_type_conge['id_type_conge'];
                            

                //echo $employe_dispose_type_conge['type_conge_nom'];
                $tab_NOM[]=$employe_dispose_type_conge['type_conge_nom'];   
                    
                //echo $employe_dispose_type_conge['disposer_quantite'];
                $tab_qt_attribuee[]= $employe_dispose_type_conge['disposer_quantite'];
                     
                //echo $employe_dispose_type_conge['type_conge_unite']."(s)";
                $tab_inite[]=$employe_dispose_type_conge['type_conge_unite'];
                       

                // définition de l'index du tableau des congés accordés
                // utile plus bas
     			$id_type_conge = $employe_dispose_type_conge['id_type_conge'];
                    $tab_conges_accordes[$id_type_conge]=$employe_dispose_type_conge['disposer_quantite'];
                    

 			} ?>


            <br> <?php


                
            // requete de selection des congés accordés à l'employé:
            $sql_conges_employe="SELECT T.type_conge_id AS conge_type_id, T.type_conge_nom, C.conge_id, C.conge_datedebut, C.conge_quantite, C.conge_commentaire, C.conge_demande,C.conge_consulte, C.conge_accorde, T.type_conge_unite,
                C.employe_id
                                FROM type_conge AS T LEFT JOIN conge AS C 
                                ON T.type_conge_id = C.type_conge_id


                                WHERE (employe_id = '$id_selection_employe'
                                AND conge_accorde IS TRUE)
                                ORDER BY conge_datedebut
                                ;";

            $conge_accordes = $pdo -> query($sql_conges_employe);

            
            // Le tableau PHP $tab_conges_accordes montre pour chaque id type_congé
            // le solde des congés, ici on calcul en soustrayant 
            // pour chaque congé pris
            while ( $conge_accorde=$conge_accordes->fetch()) {

                //echo $conge_accorde['conge_type_id']."->".$conge_accorde['conge_quantite']."<br>";

                // on soustrait à chaque congé accordé
                $tab_conges_accordes[$conge_accorde['conge_type_id']]-=$conge_accorde['conge_quantite'];
                //echo $tab_conges_accordes[$conge_accorde['conge_type_id']]."<br>";

            }


                //print_r($tab_conges_accordes);?>


            <!-- TABLEAU HTML des attributions 
            et du solde de chaque type de congé-->

           <table summary="solde des congés">

                <caption>SOLDE DES CONGES</caption>

                <tr>
                    <td>-id-</td>
                    <td>NOM du congé</td>
                    <td>Qté Attribuée<br>pour l'année</td>
                    <td></td>
                    <td>SOLDE</td>
                    <td></td>
                </tr>

                <?php

                // boucle sur toutes les valeurs de congé attribuées
                for ($i=0; $i < (count($tab_id)); $i++) 
                    {  ?>
                    <tr>
                        <td><?php echo $tab_id[$i]; ?></td>
                        <td><?php echo $tab_NOM[$i]; ?></td>
                        <td><?php echo $tab_qt_attribuee[$i]; ?></td>
                        <td><?php echo $tab_inite[$i]."(s)"; ?></td>
                        <td><?php echo $tab_conges_accordes[$tab_id[$i]]; ?></td>
                        <td><?php echo $tab_inite[$i]."(s)"; ?></td>
                        <td></td>
                    </tr> 
                   <?php 
                    }  ?>

            </table>

            <br><?php

 		?>






 	<?php
 } ?>
