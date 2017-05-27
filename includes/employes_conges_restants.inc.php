<h2>CONGES RESTANTS</h2>

<!--==================COMMENT CREER UNE EQUIPE====================-->
<?php

// ---------   si un employé est connectée-------------------------------
if (! isset($_SESSION['ticket_employe'])) { ?>

<h2>L'employé n'a pas encore pris de congés</h2>



<?php 
}
else { ?>
 	<h2>Voici le détails des congés posés.</h2>




 	<!--  =================== SOLDE DES CONGES ==========================-->


 <?php         

            $id_selection_employe=$_SESSION['id_selection_employe'];

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
                    <td>SOLDE</td>
                </tr>

                <?php

                // boucle sur toutes les valeurs de congé attribuées
                for ($i=0; $i < (count($tab_id)); $i++) 
                    {  ?>
                    <tr>
                        <td><?php echo $tab_id[$i]; ?></td>
                        <td><?php echo $tab_NOM[$i]; ?></td>
                        <td><?php echo $tab_qt_attribuee[$i].' '.$tab_inite[$i]."(s)"; ?></td>
                        <td><?php echo $tab_conges_accordes[$tab_id[$i]].' '.$tab_inite[$i]."(s)"; ?></td>
                        
                    </tr> 
                   <?php 
                    }  ?>

            </table>

            <br><?php

         ?>
 	<?php
 } ?>










<!--

<hr><hr><hr><hr><hr><hr>
<form method="POST">
    <ul class="form_radio">
        <li><input type="radio" name="conges" value="conges_payes" checked>
        <label for="rd1">CONGES PAYES : </label></li><br>
        <li><input type="radio" name="conges" value="anciennete"> <label for="rd2">ANCIENNETE : </label></li><br>
        <li><input type="radio" name="conges" value="rtt"><label for="rd3">RTT : </label></li><br>
        <li><input type="radio" name="conges" value="maladie" ><label for="rd4">MALADIE : </label></li><br>
        <li><input type="radio" name="conges" value="absence_na"><label for="rd5">ABSENCE NON AUTORISEE : </label></li><br>
        <li><input type="radio" name="conges" value="formation"><label for="rd6">FORMATION :</label></li><br>
    </ul>
-->
<!--===============bouton de refus des conges=================-->
    <!-- <input id="conges_valides" type="submit" value="CONGES REFUSES"/><br>

<!--===============bouton de validation des conges=================-->
    <!-- <input id="conges_valides" type="submit" value="CONGES VALIDES"/>
</form>-->

