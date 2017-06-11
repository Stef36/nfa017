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
         <link href="./css/style.css" rel="stylesheet" type="text/css" />
         <link href="./css/stylea.css" rel="stylesheet" type="text/css" />

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

                <section id="sources">

                    <H3>Sources des images</H3>
                    
                    <ul>
                        <li>valise:
                        
                        Lien: <a href="https://www.luxuryhalaltravel.com/voyager/wp-content/uploads/2016/01/luggage-1149289_1920-940x627.jpg">  luggage.jpg</a></li>

                        Lien: <a href="https://cdn.pixabay.com/photo/2013/07/13/12/19/suitcase-159615_960_720.png">Valise Pixabay</a>
                        

                        <li>soldat inconnu:
                        Lien: <a href="https://pixabay.com/en/art-male-man-military-roman-21122/">art-male-man-military-roman</a></li>

                        <li>machine à laver (logo équipe):
                        Lien: <a href="https://commons.wikimedia.org/wiki/File:LGwashingmachine.jpg">LGwashingmachine.jpg</a></li>

                        <li>femme dans jeans (logo équipe):
                        Lien: <a href="https://pixabay.com/en/belly-body-clothes-diet-female-2473/">belly-body-clothes-diet-female-2473</a></li> 

                    </ul>



                </section>
            </ul>
            


            <h3> Commentaires : </h3>
            <br>
            <p>
                Ce site a été développé avec l'aide de Notepad++, Sublime Text, Linux (Debian 8) GitHub & Gimp qui nous ont permis de développer de façon graphique ce site. 
            </p>


        <footer>
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>

           
           
        </footer>
    </body>
</html>