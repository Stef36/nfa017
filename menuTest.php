<?php session_start();
require ("./includes/fonctions_utiles.php");
$page='accueuil';
pose_cookie_bienvenue($page);
require ("./includes/connection.php"); ?>



<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
    <head>



        <meta charset="UTF-8" lang="fr">

 
        <meta name="description" content="gerer et consulter gratuitement ses jours de congés, gestion par employeurs, consultation par employes">

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico" >
        
        <title>Poser, consulter, gerer mes repos et jours de conges en ligne</title>

        <!-- charger les feuiles de style  -->
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
        <!-- animation du mode d'emploi via css dédié  -->
        <link href="./css/mode-emploi.css" rel="stylesheet" type="text/css" />

    </head>

<!-- ======================================================= -->


    <body>

    <!-- ===================== MENU ===================== -->
    <?php include("includes/menu.php"); ?>

    </body>