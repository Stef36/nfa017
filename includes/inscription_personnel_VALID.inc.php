<?php  // mise en BD des modifications faites en "inscription_personnel.inc.php"


    //echo "<br>DANS inscription_personnel_VALID<br>";

        

    if ( isset($_POST['valid_modif_employe']) ) 
    {


        /*
        if (isset($_POST['id_selection_employe'])) {
                
            echo $_POST['id_selection_employe']."<br>";
            } */    

        

        

        $valid_modif_employe=$_POST['valid_modif_employe'];

        echo "modifications en préparation...<br/>";


        // recupe des POSTS
        $employe_login=htmlentities($_POST['employe_login']);
        $employe_mdp=htmlentities($_POST['employe_mdp']);
        $employe_nom=htmlentities($_POST['employe_nom']);
        $employe_prenom=htmlentities($_POST['employe_prenom']);

        if (isset($_POST['employe_mail'])) {
            // verifier mail par JS email-validatio.js 
            $employe_mail=htmlentities($_POST['employe_mail']);
        } else $employe_mail='';
        

        if (isset($_POST['employe_commentaire'])) {
            
            $employe_commentaire=htmlentities($_POST['employe_commentaire']);
        } else $employe_commentaire='';
            
        if (isset($_POST['employe_visible'])) {
            $employe_visible=$_POST['employe_visible'];
        } else $employe_visible=0;

        if (isset($_POST['employe_actif'])) {
            $employe_actif=$_POST['employe_actif'];
        } else $employe_actif=0;

        if (isset($_POST['employe_logo'])) {
            $employe_logo=htmlentities($_POST['employe_logo']);
        } else $employe_logo='';
        
        $equipe_id=$_SESSION['equipe_id'];

        // prepare le tableau des valeurs à updater ou inserer
        // $nouvelles_valeurs[10] correspond à l'employe_id
        $nouvelles_valeurs = array ($employe_login, $employe_mdp,$employe_nom, $employe_prenom, $employe_mail,$employe_commentaire, $employe_visible, $employe_actif,$employe_logo, $equipe_id, NULL );
        
        if (
            (isset($_POST['id_selection_employe']))
            AND
            ($_POST['id_selection_employe']!=''))
             {

            $employe_id=$_POST['id_selection_employe'];

            // actualise l'employe_id
            $nouvelles_valeurs[10]=$employe_id;

            $sql_modif_employe="    UPDATE    employe
                                    SET employe_login=?,employe_mdp=?,
                                    employe_nom=?, employe_prenom=?,
                                    employe_mail=?, employe_commentaire=?, employe_visible=?,
                                    employe_actif=?,employe_logo=?,
                                    equipe_id=?
                                    WHERE employe_id = ? ";
                                    

            applique_requete($sql_modif_employe, $pdo, $nouvelles_valeurs);

            echo "UPDATE en BD de ".$employe_prenom." ".$employe_nom."<br/>";
 
        }

        elseif (($_POST['id_selection_employe']==''
                    || $_POST['id_selection_employe']==NULL)
                    ) 
            {
              $employe_id='';



                  $sql_recherche_employe="SELECT employe_login
                                          FROM employe
                                          WHERE employe_login= '$employe_login';";
                  
                  $employes_deja_en_base= $pdo -> query($sql_recherche_employe);

                  if (!($employe_deja_en_base=$employes_deja_en_base->fetch()))
                       {
        
                    $sql_modif_employe="    INSERT INTO    employe
                                        SET employe_login=?,employe_mdp=?,
                                        employe_nom=?, employe_prenom=?,
                                        employe_mail=?, employe_commentaire=?, employe_visible=?,
                                        employe_actif=?,employe_logo=?,
                                        equipe_id=?, employe_id = ? ";



                    applique_requete($sql_modif_employe, $pdo,$nouvelles_valeurs );

                echo "INSERT en BD de ".$employe_prenom." ".$employe_nom."<br/>";
                } else echo "IMPOSSIBLE d'actualiser cet employé est déjà en base de données.<br>";

            };

    }
    
    else echo "<br/>-----  AUCUN CHANGEMENT sur FICHE EN BD  ------<br/>";
    $_POST['valid_modif_employe']=NULL;


 ?>