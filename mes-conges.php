<?php 
require ("./includes/fonctions_utiles.php");
$page='mes_conges';
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
        <meta name="Mes Repos"  content="poser consulter jours congés travail côté employe ">

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
  
        <title>Mes congés | Mes coordonées</title>
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
    </head>
<!-- ======================================================= -->


    <body>
<!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>

         <?php verif_cookie_bienvenue($page); ?>


<!-- ===================== TITRE ===================== -->
<?php require ("./includes/header.inc.php"); titre_header('MES CONGES')?>
<!-- ===================== TITRE ===================== -->



<!-- ===================== VIDE POUR MENU   ========================== -->
<!--============= (include en bas de page pour referencement)  ======= -->
<section id="vide_sideral"></section>



<?php //affiche_variables_session(); ?>
<!--====================================================================-->
<!--=======================   COMMENT UTILISER du côté employé  ========-->
<!--====================================================================-->

        <section class="flex_employe" >

            <section id="employe_presentation">
                <?php include("includes/comment_utiliser_employe.inc.php"); ?>
            </section>

        
            <aside id="log-employe">

                <!--====== login            ===============-->

                
                <?php include("includes/log_employe.inc.php"); ?>
     
            </aside>

        </section>
<!--====================================================================-->
<!--===========================DESCRIPTION EMPLOYE=======================-->
<!--====================================================================-->
        <section id="description_employe">
        
        <!-- 
            description_employe -->
            <?php //include("includes/description_employe.inc.php"); ?>


            
            
            <!--===========================EMPLOYESS=======================-->
            <article id="employe">
            <!-- employes -->
            <?php include("includes/employes.inc.php"); ?>
            </article>
        
        </section>
        
     
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
    </body>

</html>
