<?php session_start();?>
<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="fr" >
<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="poser consulter jours congés travail équipe ">

        <link rel="icon" href="mes-repos.ico" >
        <link rel="icon" type="image/x-icon" href="img/photos/favicon.ico">
        <title>Information du personnel</title>
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <header>
    <!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>
        <title>Poser mes repos en ligne</title>

            <h1>Mentions légales - mes repos.com</h1>
            <br><br>
        </header>
        <hr/>
<!-- ===================== MENU ===================== -->
        <?php include("includes/menu.php"); ?>
        
        <hr/>
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
                Ce site a été développé avec l'aide de Notepad++, Sublime Text, GitHub & Gimp qui nous a permis de développer de façon graphique ce site. <br><br><br>
            </h2>

        <footer>
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>

           
           
        </footer>
    </body>
</html>