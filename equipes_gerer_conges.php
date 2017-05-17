<?php include("./includes/gestion_connection_equipe.inc.php"); ?>

<!DOCTYPE html>
<html lang="fr" >

<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="poser consulter jours congés travail équipe ">

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
  

        <title>Information du personnel</title>
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
                <link href="./css/stylea.css" rel="stylesheet" type="text/css" />

        <!--<link href="./css/calendar.css" rel="stylesheet" type="text/css" />-->
    </head>
<!-- ======================================================= -->

    <body>
<!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>
<!-- ===================== TITRE ===================== -->
        <header class="headera">
            <h1>INFORMATIONS DU PERSONNEL<H1>
            <h3>GESTION DES CONGES</h3>
        </header>

<!-- ===================== MENU ===================== -->
        <nav>
        <?php include("includes/menu.php"); ?>
        </nav>

<!--=======voir si possibilité===Menu de demande de validation================-->
        <article id="warm">

        <?php include("includes/warm_equipe.inc.php"); ?>
        </article>

<br>
<hr>
<!--==========s==========login=============================-->
                <aside class="log_equipea">
                <?php include("includes/log_equipe.inc.php"); ?>
                </aside>
                <br>
                <hr>
                <br>
<!--===========liste déroulante pour la selection de l'employé==========-->
            <section id="choix_employe">
            <span>Choisissez un employé avec la liste déroulante pour avoir les informations le concernant</span>

<!--================a connecter à la BD===================-->
                <h2>Choix de l'employé : </h2>
                <select name="employe">
                    <option value "">Choisir un employé</option>
                </select>
            </section>
            <br>
                <hr>
<!--==========================GESTION DES CONGES==================-->
                <section id="container">
                    <?php include("includes/gestion_conges.inc.php"); ?>
                    <div class="flex">
                        <div class ="photo"><img src="logos/Minion.jpg" alt="Photo employé"></div>
                    </div> 
                </section><br>
                <hr>
                <section id="container">
                    <section class="flex1">
                        <article id="conges_restants">
                            <?php include("includes/equipe_conges_restants.inc.php"); ?>
                        </article>
                    </section>
                    <section class="flex2">
                        <article id="calendrier">
                        CALENDRIER
                        </article>
                    </section>
                </section>

<br>



<!-- ===================== BAS DE PAGE  ===================== -->

        <?php include("includes/basDePage.php"); ?>
<!--**********************************************************************************************************-->
<!--****************************** AFFICHAGE INFORMATION DE LA LARGEUR DE LA PAGE ****************************-->
                <script type="text/javascript">
                    {
                        var $largeur = document.body.clientWidth;

                        document.write('Largeur de la page : ' + $largeur + ' px');
                    }
                </script>
    </body>
</html>