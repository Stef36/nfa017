<?php session_start();
require ("./includes/fonctions_utiles.php");
$page='mentions_legales';
pose_cookie_bienvenue($page); ?>

<!DOCTYPE html>
<html lang="fr" >
<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="mentions légales gerer consulter jours congés travail équipe ">
        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico" >
 
        <title>gerer et consulter gratuitement ses jours de congés, gestion par employeurs, consultation par employes</title>
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <header>
    <!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>

        <?php verif_cookie_bienvenue($page); ?>

    <!-- ===================== TITRE ===================== -->


    <?php require ("./includes/header.inc.php"); titre_header('MENTIONS LEGALES')?>

        </header>
        
<!-- ===================== MENU ===================== -->
        <?php include("includes/menu.php"); ?>
        
     
        <SECTION class="mentionslegales">
            <br>
            <h2>
                <div> Coordonnées de l'éditeur :</div>
            </h2>
            <br>
            <ul>
<!--========================= Description des mentions légales =================================-->
                <section id="mentions">
                    <li>Dénomination : Site gratuit pédagogique CP09 du Cnam</li>
                    <li>Email de contact 1 : dominique.dufour.auditeur@lecnam.net</li>
                    <li>Email de contact 2 : stephane.laruelle.auditeur@lecnam.net</li>
                    <li>Co-auteurs : Dominique DUFOUR et Stéphane LARUELLE</li>
                    
                    <br>
                    Hébergeur :  1and1<br>
                    Développeurs Web : <br>
                    DUFOUR Dominique <br>
                    LARUELLE Stéphane <br>
                    
                </section>
            </ul>
            <br>
            <br>
            <br>
            <h2> Commentaires : <br>
                Ce site a été développé avec l'aide de Notepad++, Sublime Text,Linux (Debian) GitHub & Gimp qui nous a permis de développer de façon graphique ce site. <br><br><br>
            </h2>
            <p>Attention, ce site est encore en cours de développement, certaines fonctionalités ne sont pas implémentées.</p>
            <p>Merci de patienter notament pour la partie "Gérer les congés"</p>

        <footer>
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>

           
           
        </footer>
    </body>
</html>