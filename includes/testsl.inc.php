<h3>Test includes</H3>

<hr>
<h2>Choix de l'employé : </h2>
                <section id="selectionner_employe">
                    <?php include("includes/selection_employe.inc.php"); ?>
                </section>
            <br>
<!--==================================================-->
<!--===========================SQL====================-->
<!--==================================================-->
<?php
    if (isset($_session['id_selection_employe']))
    {
        
    }
?>
<!--==================================================-->
<!--==================================================-->
<!--==================================================-->
<<<<<<< HEAD
<hr>
  <?php echo 'Nom employe :' 
  
  ?><br><br>
  <?php echo 'Prénom employe :' 
  
  ?><br><br>
  <?php echo 'Equipe :' 
  
  ?>
=======

>>>>>>> tableau_conges
  
  
  <hr><hr><hr>
<!--==================================================-->
<<<<<<< HEAD
<!--=================affichage tableau conges - OK - =================================-->
<!--==================================================-->
  
=======
<!--=================affichage tableau conges - OK - ========================-->
<!--==================================================-->
  <p>Page testsl.inc.php</p>
>>>>>>> tableau_conges
  <?php         
            $id_selection_employe=$_SESSION['id_selection_employe'];
             // requete de selection des type de congés et des congés attribués à l'employé:
            $sql_employe_dispose_combiens_type_conges =
                                "   SELECT  type_conge_nom,
                                     T.type_conge_id AS id_type_conge,
                                        disposer_quantite, type_conge_unite
                                    FROM `type_conge` T 
<<<<<<< HEAD
                                    LEFT JOIN 
                                    (SELECT * FROM disposer WHERE disposer.employe_id='$id_selection_employe' )
=======
                                    
                                    LEFT JOIN 
                                    (SELECT * FROM disposer WHERE disposer.employe_id='$id_selection_employe' )
                                    
>>>>>>> tableau_conges
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

