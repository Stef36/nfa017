<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/gestion_connection_employe.inc.php");
//affiche_variables_session() ?>


<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>

<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="consulter jours congés travail côté employe ">

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
  
        <title>Mes congés | Consulter mes Congés</title>
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
    </head>
<!-- ======================================================= -->


    <body>
<!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>




<!-- ===================== TITRE ===================== -->
<?php require ("./includes/header.inc.php"); titre_header('CONSULTER MES CONGES')?>
<!-- ===================== TITRE ===================== -->




<!--=======voir si possibilité===Menu de demande de validation================-->
        <article id="warm">
            <!-- warm -->
        
        </article>
<!-- ===================== MENU ===================== -->
        <nav>
        <?php include("includes/menu.php"); ?>
        </nav>


<!--====================================================================-->
<!--=======================   COMMENT UTILISER du côté employé  ========-->
<!--====================================================================-->

        <section class="flex_employe" >

            <section id="employe_presentation">
                <?php include("includes/comment_consulter_employe.inc.php"); ?>
            </section>

        
            <aside id="log-employe">

                <!--====== login            ===============-->

                log_employe
                <?php include("includes/log_employe.inc.php"); ?>
     
            </aside>

        </section>

<!--====================================================================-->
<!--==========================  VISU DES JOURS POSES =====================-->
<!--====================================================================-->


    <section id="conges_details" class="flex_employe">

    <?php  include("includes/conges_details_employe.inc.php"); ?>
        


    </section>


<!--====================================================================-->
<!--===========================DESCRIPTION EMPLOYE=======================-->
<!--====================================================================-->
        <section id="description_employe">
        
        <!-- description_employe -->
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
