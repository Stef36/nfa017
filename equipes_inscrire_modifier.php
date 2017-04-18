<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/gestion_connection_equipe.inc.php"); ?>

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
    </head>
<!-- ======================================================= -->


    <body>





<!-- ===================== TITRE ===================== -->
        <header class="headera">
            <h1>INFORMATIONS DU PERSONNEL<H1>
            <h3>INSCRIRE / MODIFIER UNE EQUIPE</h3>
        </header>

<!-- ===================== MENU ===================== -->
        <nav>
        <?php include("includes/menu.php"); ?>
    </nav>
    
<!--====================login=============================-->
                <aside class="log_equipea">
                <?php include("includes/log_equipe.inc.php"); ?>
                </aside>
                
<!--===================COMMENT CREER UNE EQUIPE==============-->
        <section id="creer_personnel">
            <?php include("includes/inscription_personnel.inc.php"); ?>
         </section>
            <section id="flex">
        
       
        </section>
<!--===========================DESCRIPTION EQUIPE=======================-->
        <section id="attribution_conges">
        
        <?php include("includes/attribution_conges.inc.php"); ?>
        
        
        </section>
        
        
        

        
        
        
        
        
        
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
        
        <script language="JavaScript" type="text/javascript" src="scripts.js"></script>
    </body>

</html>
