<?php session_start();
require ("./includes/fonctions_utiles.php");
 ?>


<!DOCTYPE html>
<html lang="fr" >
<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="erreur 404 Mesrepos.com">
        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico" >
 
        <title>erreure 404 page d'excuses</title>
         <link href="./css/style.css" rel="stylesheet" type="text/css" />
         <link href="./css/stylea.css" rel="stylesheet" type="text/css" />

    </head>
    <header>
    <!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>

        

    <!-- ===================== TITRE ===================== -->


    <?php require ("./includes/header.inc.php"); titre_header('Erreur 404 !!! Désolé, cette page n\'est pas sur le serveur')?>

        </header>
        
        <!-- ===================== VIDE POUR MENU   ========================== -->
        <!--============= (include en bas de page pour referencement)  ======= -->
        <section id="vide_sideral"></section>
        
     
        <SECTION class="mentions">
          
         
            <!--========== Description des mentions légales ==============-->
                <section>

                    <h2>Ce lien ne fonctionne pas... mauvais referencement ..?</h2>
                    <p>Désolé pour le dérangement, mais visitez donc le site, c'est le fruit d'un travail long et acharné durant le second semestre 2017.</p>
                    <p>Et puis... posez donc vos congés.</p>
                </section>
           

        </section>
            
   

        <footer>
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>

           
           
        </footer>
    </body>
</html>