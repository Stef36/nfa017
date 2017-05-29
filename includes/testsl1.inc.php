<h3>testsl1.inc.php</H3>

<hr>
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
<h2>INFOS EMPLOYE</h2>
  <p>Page testsl1.inc.php****</p>
  <p>Nom employé : <?php echo 'employe_nom' ?></p>
  
  <br><br>
  <p>Prénom employé : <?php echo 'employe_prenom' ?></p>
  
  <br><br>
  <p>Equipe : <?php echo 'equipe_nom'?></p>  
  
  <hr><hr><hr>
<!--==================================================-->
<!--==================================================-->
<!--==================================================-->
  <p>fggggggggggggggggggPage testsl1.inc.php</p>
  <?php         
            $id_selection_employe=$_SESSION['id_selection_employe'];
             // requete de selection des type de congés et des congés attribués à l'employé:
// reprendre la requetes ci_dessous avec celle de testsl.inc.php
            $sql_employe =
                                "   SELECT  employe_nom, employe_prenom, E.employe_id AS 
                                    FROM employe 
                                    LEFT JOIN 
                                    (SELECT * FROM equipe WHERE equipe.equipe_id='$id_selection_employe' )
                                    AS D 
                                    ON 
                                ;";
            $employe_info = $pdo -> query($sql_employe_info);
            // tableaux des congés attribués
            $tab_NOM=array();
            $tab_PRENOM = array();
            $tab_EQUIPE = array();
            // tableau des congés accordés à l'employé
            // $tab_conges_accordes=array(); 
             while($employe_info= $employe_info->fetch()){
                //echo $employe_dispose_type_conge['id_type_conge'];
                // $tab_id[]= $employe_info['employe_nom'];
                            
                //echo $employe_dispose_type_conge['type_conge_nom'];
                $tab_NOM[]= $employe_info['employe_nom'];   
                    
                //echo $employe_dispose_type_conge['disposer_quantite'];
                $tab_PRENOM[]= $employe_info['employe_prenom'];
                     
                //echo $employe_dispose_type_conge['type_conge_unite']."(s)";
                $tab_EQUIPE[]= $employe_info['equipe_nom'];
                       
                // définition de l'index du tableau des congés accordés
                // utile plus bas
                 // $id_type_conge = $employe_dispose_type_conge['id_type_conge'];
                    // $tab_conges_accordes[$id_type_conge]=$employe_dispose_type_conge['disposer_quantite'];
                    
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
                        <td>id<?php echo $tab_id[$i]; ?></td>
                        <td>nom<?php echo $tab_NOM[$i]; ?></td>
                        <td>attribue<?php echo $tab_qt_attribuee[$i].' '.$tab_inite[$i]."(s)"; ?></td>
                        <td>solde<?php echo $tab_conges_accordes[$tab_id[$i]].' '.$tab_inite[$i]."(s)"; ?></td>
                        
                    </tr> 
                   <?php 
                    }  ?>

            </table>

            <br><?php
         ?>

