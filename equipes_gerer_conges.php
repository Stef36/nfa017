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
        <link href="./css/calendar.css" rel="stylesheet" type="text/css" />
    </head>
<!-- ======================================================= -->

    <body>

<!-- ===================== TITRE ===================== -->
        <header class="headera">
            <h1>INFORMATIONS DU PERSONNEL<H1>
            <h3>GESTION DES CONGES</h3>
        </header>

<!-- ===================== MENU ===================== -->
        <nav>
        <?php include("includes/menu.php"); ?>
    </nav>
    
<!--==========s==========login=============================-->
                <aside class="log_equipea">
                <?php include("includes/log_equipe.inc.php"); ?>
                </aside>
                
<!--===========liste déroulante pour la selection de l'employé==========-->
            <section id="choix_employe">
            <span>Choisissez un employé avec la liste déroulante pour avoir les informations le concernant</span>

<!--================a connecter à la BD===================-->
                <h2>Choix de l'employé : </h2>
                <select name="employe">
                    <option value "">Choisir un employé</option>
                </select>
            </section>
<!--==========================GESTION DES CONGES==================-->
                <section id="container">
                    <?php include("includes/gestion_conges.inc.php"); ?>
                    <div class="flex">
                        <div class ="photo"><img src="" alt="">PHOTO</div>
                    </div> 
                </section>
                <section id="container">
                    <section class="flex1">
                        <article id="conges_restants">
                            <?php include("includes/equipe_conges_restants.inc.php"); ?>
                        </article>
                    </section>
                    <section class="flex2">
                        <article id="calendrier">
                            <?php include("calendar/calendrier_bo.php"); ?>
                        CALENDRIER
                        </article>
                    </section>
                </section>
                
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
        
        <script language="JavaScript" type="text/javascript" src="scripts.js"></script>
    </body>
</html>