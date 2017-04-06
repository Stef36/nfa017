<?php Session_start()?>

<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="poser consulter jours congés travail équipe ">

        <link rel="icon" href="mes-repos.ico" >
        <link rel="icon" type="image/x-icon" href="img/photos/favicon.ico">
        <title>Equipes de travail</title>
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
        <nav>
        <?php include("includes/menu.php"); ?>
    </nav>
<!--===================COMMENT CREER UNE EQUIPE==============-->
        <section id="creer_equipe">
            <?php include("includes/creer_equipe.inc.php"); ?>
        
            <section id="flex">
                <article id="equipe_presentation">
equipe-presentation
                <?php include("includes/equipe_presentation.inc.php"); ?>
                </article>
    
<!--====================login=============================-->
                <aside class="log_employe">
log_employe
                <?php include("includes/log_employe.inc.php"); ?>
                </aside>
        
            </section></section>
<!--===========================DESCRIPTION EQUIPE=======================-->
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
