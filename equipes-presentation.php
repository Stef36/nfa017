<?php include("./includes/gestion_connection_equipe.inc.php"); ?>


<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>

<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="poser consulter jours congés travail équipe ">

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
  
        <title>Mes Congés | Les équipes </title>
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
    </head>
<!-- ======================================================= -->


    <body>
<!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>

        <?php verif_cookie_bienvenue($page); ?>
        
<!-- ===================== TITRE ===================== -->
<?php require ("./includes/header.inc.php"); titre_header('LES EQUIPES DE TRAVAIL')?>
<!-- ===================== TITRE ===================== -->

<!-- ===================== TITRE =====================
        <header class="headera">
            <h1>LES EQUIPES DE TRAVAIL<H1>
        </header> -->


<!-- ===================== MENU ===================== -->
        
        <?php include("includes/menu.php"); ?>
 

 <p>Voici un récapitulatif de votre équipe de travail.</p>
 <p>Ici pour <a href="./equipes-inscrire-modifier.php" class="liens-direct">construire l'équipe</a>  et attribuer les congés, ou là pour<a href="./equipes-gerer-conges.php" class="liens-direct">gérer les congés</a> </p>  

<!--=======voir si possibilité===Menu de demande de validation================-->
        <article id="warm">

        <?php include("includes/warm_equipe.inc.php"); ?>
        </article>

<?php //affiche_variables_session(); ?>
<!--====================================================================-->
<!--=========================COMMENT CREER UNE EQUIPE===================-->
<!--====================================================================-->
<br>
                <hr>
                <br>
        <section id="creer_equipe" class="container">

            <?php include("includes/creer_equipe.inc.php"); ?>
            <br>
            <hr>
            <br>
            <section class="flex">
                <article class="flex1">
                <?php include("includes/equipe_presentation.inc.php"); ?>
                </article>
                <br>
                
                <br>
<!--====================login=============================-->

                <aside class="log_equipea">
                <?php include("includes/log_equipe.inc.php"); ?>

                </aside>
        
            </section>

        </section>

        <br>
                                
<!--====================================================================-->
<!--===========================DESCRIPTION EQUIPE=======================-->
<!--====================================================================-->
        <section id="description_equipe">

                <hr>
                <br>
<!--===========================EQUIPES=======================-->
            <article id="equipes">
        
            <?php include("includes/equipes.inc.php"); ?>
            </article>
        </section>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
    </body>

</html>
