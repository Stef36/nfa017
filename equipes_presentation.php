<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/gestion_connection_equipe.inc.php");
//affiche_variables_session() ?>


<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>

<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="poser consulter jours congés travail équipe ">

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
  
        <title>Equipes de travail</title>
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
    </head>
<!-- ======================================================= -->


    <body>





<!-- ===================== TITRE ===================== -->
        <header class="headera">
            <h1>LES EQUIPES DE TRAVAIL<H1>
        </header>

<!--=======voir si possibilité===Menu de demande de validation================-->
        <article id="warm">
warm
        
        </article>
<!-- ===================== MENU ===================== -->
        <nav class="menu">
        <?php include("includes/menu.php"); ?>
    </nav>


<?php //affiche_variables_session(); ?>
<!--====================================================================-->
<!--=========================COMMENT CREER UNE EQUIPE===================-->
<!--====================================================================-->

        <section id="creer_equipe" class="container">

            <?php include("includes/creer_equipe.inc.php"); ?>
        
            <section class="flex">
                <article class="flex1">
equipe-presentation
                <?php include("includes/equipe_presentation.inc.php"); ?>
                </article>
    
<!--====================login=============================-->

                <aside class="log_equipea">
log_equipe
                <?php include("includes/log_equipe.inc.php"); ?>

                </aside>
        
            </section></section>
<!--====================================================================-->
<!--===========================DESCRIPTION EQUIPE=======================-->
<!--====================================================================-->
        <section id="description_equipe">
        
description_equipe
        <?php include("includes/description_equipe.inc.php"); ?>
        
        
<!--===========================EQUIPES=======================-->
        <article id="equipes">
equipes
        <?php include("includes/equipes.inc.php"); ?>
        </article>
        
        </section>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
    </body>

</html>
