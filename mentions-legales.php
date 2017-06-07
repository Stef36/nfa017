<?php session_start();
require ("./includes/fonctions_utiles.php");
$page='mentions_legales';
pose_cookie_bienvenue($page); 

require ("./includes/connection.php");?>


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
        
<!-- ===================== VIDE POUR MENU   ========================== -->
<!--============= (include en bas de page pour referencement)  ======= -->
<section id="vide_sideral"></section>
        
     
        <SECTION class="mentionslegales">
            <br>
            <h2>
                <div> Coordonnées de l'éditeur :</div>
            </h2>
            <br>
            <ul>
<!--========== Description des mentions légales ==============-->
                <section id="mentions">
                    <li>Dénomination : Site gratuit pédagogique CP09 du Cnam</li>

                    <!-- cherche en BD les co-auteurs -->


                    <?php  $sql_cherche_co_auteurs="SELECT mem_nom, mem_prenom 
                                                    FROM membre 
                                                    WHERE mem_prenom != 'Philippe'
                                                    AND mem_prenom != 'David';";

                        $co_auteurs=  $pdo->query($sql_cherche_co_auteurs);


                        while ($co_auteur =$co_auteurs->fetch()) { ?>

                            <li>Co-auteur : <?php echo $co_auteur['mem_prenom'].' '.$co_auteur['mem_nom']; ?></li> <?php
                            
                        }




                                                    ?>

                    
                    <br>
                    <li>Hébergeur :  1and1</li><br>

                    
                </section>
            </ul>
            <br>
            <br>
            <br>
            <h2> Commentaires : <br>
                Ce site a été développé avec l'aide de Notepad++, Sublime Text, Linux (Debian 8) GitHub & Gimp qui nous ont permis de développer de façon graphique ce site. <br><br><br>
            </h2>
            <p>Attention, ce site est encore en cours de développement, certaines fonctionalités ne sont pas implémentées.</p>
            <p>Merci de patienter notament pour la partie "Gérer les congés"</p>

        <footer>
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>

           
           
        </footer>
    </body>
</html>