<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
    <head>



        <meta charset="UTF-8" lang="fr">

 
        <meta name="description" content="poser et consulter ses jours de congés gestion par employeurs  consultation par employes">

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
        
        <title>Poser mes repos en ligne</title>

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


    <?php require ("./includes/header.inc.php"); titre_header('POSER ET CONSUTER SES JOURS DE CONGE EN LIGNE')?>





<!-- ===================== MENU ===================== -->
    <?php include("includes/menu.php"); ?>


<section id="provisoire">


<ol>
    <li>Le chef d'équipe interressé par le site envoie un mail par le biais du menu "contact" </li>

    <li>Le webmaster, en BO (Back-Office) reçoit ce mail et créé un login et un mdp à ce chef d'équipe, et lui envoie par mail.</li>

    <li>Le chef d'équipe peut se logger (via menu "Les équipes") et construire son équipe (via  menu "Les équipes" /"Inscrire-Modifier") , en créant chaque employé, en remplissant les champs NOM, prénom, etc, y compris le mail de l'employé.</li>

    <li>Les employés reçoivent individuellement un mail avec leur loggin (créés par le chef d'équipe) et le mdp. Les employés peuvent se logger en menu "Mes congés" </li>

</ol>

</section>

<section id="animation-mode-emploi">

    <p id="animation">

        <img src="./images/animation-accueuil/4.jpg" id="image4">
        <img src="./images/animation-accueuil/3.jpg" id="image3">    
        <img src="./images/animation-accueuil/2.jpg" id="image2">
        <img src="./images/animation-accueuil/1.jpg" id="image1">



    

    </p>
    

</section>
  


<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
    </body>

</html>
