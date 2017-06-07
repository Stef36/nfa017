<?php 
require ("./includes/fonctions_utiles.php");
$page='mes_conges_poser';
pose_cookie_bienvenue($page);

include("./includes/gestion_connection_employe.inc.php");
//affiche_variables_session() ?>


<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>

<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="poser jours congés travail côté employe ">

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
  
        <title>Mes congés | Poser mes Congés</title>
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
    </head>
<!-- ======================================================= -->


    <body>
<!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>

        <?php verif_cookie_bienvenue($page); ?>


<!-- ===================== TITRE ===================== -->
<?php require ("./includes/header.inc.php"); titre_header('POSER MES CONGES')?>
<!-- ===================== TITRE ===================== -->




<!-- ===================== VIDE POUR MENU   ========================== -->
<!--============= (include en bas de page pour referencement)  ======= -->
<section id="vide_sideral"></section>



<!--====================================================================-->
<!--=======================   COMMENT UTILISER du côté employé  ========-->
<!--====================================================================-->

        <section  class="flex_employe" >

            <section id="employe_presentation">
                <?php include("includes/comment_consulter_employe.inc.php"); ?>
            </section>

        
            <aside id="log-employe">

                <!--====== login            ===============-->
                <?php include("includes/log_employe.inc.php"); ?>
     
            </aside>

        </section>

<!--====================================================================-->
<!--======================== FORMULAIRE  POSER  CONGES =================-->
<!--====================================================================-->


    <section id="conges_poser" class="flex_employe">

    <?php 

    if (isset($_POST['effacer_confirme']) 
        & isset($_POST['effacer'])
        & isset($_POST['select_conge_pour_modif'])) {

            if ($_POST['effacer']=="true") {
                include("includes/efface_conge.inc.php");
            }
            elseif ($_POST['effacer']=="false") {?>

            <p class = "yellow"> Vous n'avez pas effectué une bonne démarche de suppression de votre congé...'
            </p> 
        </p> 
        <p>
        <a href="./mes-conges-consulter.php">retour</a>
        </p>
        
        <?php
        }
        
        } 

    else {

    include("includes/conges_poser_employe.inc.php"); 

    }

    
    ?>
        


    </section>


<!--====================================================================-->
<!--===========================DESCRIPTION EMPLOYE=======================-->
<!--====================================================================-->
        <section id="description_employe">
        
          
            
            <!--===========================EMPLOYES=======================-->
            <article id="employe">
            <?php include("includes/employes.inc.php"); ?>
            </article>
        
        </section>
        
     
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
    </body>

</html>
