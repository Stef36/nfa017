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
        
     
        <SECTION class="mentions">
          
         
            <!--========== Description des mentions légales ==============-->
                <section>

                    <h2>Coordonnées de l'éditeur :</h2>

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

                    
                    
                    <li>Hébergeur :  1and1</li>

                    <li> Commentaires : 
                        <br>
                        <p>
                            Ce site a été développé avec l'aide de Notepad++, Sublime Text, Linux (Debian 8) GitHub & Gimp qui nous ont permis de développer de façon graphique ce site. 
                        </p>
                    </li>
                </section>

                <section>

                    <H2>Sources des images libres de droits:</H2>
                    
                    <ul>
                        <li>valise:
                        Lien: <a href="https://pixabay.com/">Valise Pixabay suitcase-159615_960_720.png</a>
                        

                        <li>soldat inconnu (logo équipe):
                        Lien: <a href="https://pixabay.com/en/art-male-man-military-roman-21122/">art-male-man-military-roman</a></li>

                        <li>machine à laver (logo équipe):
                        Lien: <a href="https://commons.wikimedia.org/wiki/File:LGwashingmachine.jpg">LGwashingmachine.jpg</a></li>

                        <li>Toutes les autres images de ce site sont sous la responsabilité des utilisateurs. Merci de <a href="./contact.php" class="liens-direct">laisser un message</a>  si vous constatez des abus.</li>

 

                    </ul>
                </section>

                <section>
                    <H2>Remerciements:</H2>
                    <ul>
                        <li>Merci à M. Philippe Bouquet</li>

                        <p>Qui nous a aider à tester, essayer, triturer le code source.</p>
                        <p>Qui nous a poussé au bout de nos limites neuronales en termes de compréhension de réferencement et de manipulations des formules magique d' .htaccess :-\)</p>
                        <a href="http://netpresta-formation.fr" target="_blank"><img src="./images/photos/netpresta-formation-logo-20160428.jpg" alt="netpresta-formation formation web netpresta.fr" ></a>

                        <li>Merci à M. David Bost</li>
                        <p>également formateur au Cnam... et qui va bientôt nous évaluer ;-()</p>

                        <li>Pour les curieux</li>
                        <p> qui voudraient avoir une idée des compétences à acquérir pour la construction de ce site, vous pouvez télecharger la liste <a href="./docs/CNAM-CP09-competences.pdf" target="_blank" class="liens-direct">ici</a> .</p>


                        <li>Merci à tous les gens du <a href="http://www.cnam.fr/" target="_blank">Centre National des Arts et Métiers <img src="./images/Logo/Logo_cnam.gif" class= "logoCnam" alt=" le CNAM logo"></a> qui ont déjà permis à beaucoup de salariés un changement de vie professionnelle positive.</li>

                    </ul>

                    
                </section>
           

        </section>
            
            


            


        <footer>
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>

           
           
        </footer>
    </body>
</html>