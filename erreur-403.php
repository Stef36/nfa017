<?php session_start();
require ("./includes/fonctions_utiles.php");
 ?>


<!DOCTYPE html>
<html lang="fr" >
<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="erreur 403 Mesrepos.com">
        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico" >
 
        <title>erreure 403 page d'explications</title>
         <link href="./css/style.css" rel="stylesheet" type="text/css" />
         <link href="./css/stylea.css" rel="stylesheet" type="text/css" />

    </head>
    <header>
    <!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>

        

    <!-- ===================== TITRE ===================== -->


    <?php require ("./includes/header.inc.php"); titre_header('Erreur 403 !!! Désolé, vous n\'avez pas accès au dossier sur le serveur')?>

        </header>
        
        <!-- ===================== VIDE POUR MENU   ========================== -->
        <!--============= (include en bas de page pour referencement)  ======= -->
        <section id="vide_sideral"></section>
        
     
        <SECTION class="mentions">
          
         
            <!--========== Description des mentions légales ==============-->
                <section>

                    <h2>Vous n'avez pas accès à ce dossier.</h2>
                    <p>Désolé</p>
                    <p>Mais visitez donc le site, c'est le fruit d'un travail long et acharné durant le second semestre 2017.</p>
                    <p>Et puis... posez donc vos congés.</p>
                    <p>
                        <img src="./images/photos/microscope-1027874_960_720.png" alt="la curiosité est un vialain défaut mesrepos.com" id="erreur403">
                    </p>
                </section>
           

        </section>
            
   

        <footer>
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>

           
           
        </footer>
    </body>
</html>