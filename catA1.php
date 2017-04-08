<?php Session_start()?>

<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="poser consulter jours congés travail équipe ">

        <link rel="icon" href="mes-repos.ico" >
        <link rel="icon" type="image/x-icon" href="img/photos/favicon.ico">
        <title>Information du personnel</title>
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
    </head>
<!-- ======================================================= -->


    <body>





<!-- ===================== TITRE ===================== -->
        <header class="headera">
            <h1>INFORMATIONS DU PERSONNEL<H1>
            <h3>INSCRIRE / MODIFIER UNE EQUIPE</h3>
        </header>

<!-- ===================== MENU ===================== -->
        <nav>
        <?php include("includes/menu.php"); ?>
    </nav>
<!--===================COMMENT CREER UNE EQUIPE==============-->
        <section id="creer_equipe">
            <?php include("includes/inscription_personnel.inc.php"); ?>
        
            <section id="flex">
                
    
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
