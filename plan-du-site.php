<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
    <head>



        <meta charset="UTF-8" lang="fr">

 
        <meta name="description" content="mesrepos.domduf.com plan du site">

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico" alt="favicon site mesrepos.domduf.com">
        
        <title>Plan du site mesrepos.domduf.com</title>

        <!-- charger les feuiles de style  -->
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
        <!-- animation du mode d'emploi via css dédié  -->
        <link href="./css/mode-emploi.css" rel="stylesheet" type="text/css" />

    </head>

<!-- ======================================================= -->


    <body>
<!--==============================logo========================-->
    <?php include("includes/logo.inc.php"); ?>

<!-- ===================== TITRE ===================== -->


    <?php require ("./includes/header.inc.php"); titre_header('PLAN DU SITE')?>





<!-- ===================== MENU ===================== -->
    <?php include("includes/menu.php"); ?>


<section id="plan-site">



    <li>
      <a a href="http://mesrepos.domduf.com/index.php">Index</a>
    </li>
    <li>
      <a a href="http://mesrepos.domduf.com/equipes-presentation.php">Presentation  équipe</a>
    </li>
    <li>
      <a a href="http://mesrepos.domduf.com/equipes-inscrire-modifier.php">equipes-inscrire-modifier</a>
    </li>
    <li>
      <a a href="http://mesrepos.domduf.com/equipes-gerer-conges.php">equipes-gerer-conges</a>
    </li>
    <li>
      <a a href="http://mesrepos.domduf.com/mes-conges.php">mes-conges</a>
    </li>
    <li>
      <a a href="http://mesrepos.domduf.com/mes-conges-consulter.php">mes-conges-consulter</a>
    </li>
    <li>
      <a a href="http://mesrepos.domduf.com/mes-conges-poser.php">mes-conges-poser</a>
    </li>
    <li>
      <a a href="http://mesrepos.domduf.com/contact.php">contact</a>
    </li>
    <li>
      <a a href="http://mesrepos.domduf.com/mentions-legales.php">mentions-legales</a>
    </li>


</section>


  


<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
    </body>

</html>
