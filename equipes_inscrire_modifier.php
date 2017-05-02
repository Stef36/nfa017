<!-- ================ Connection bdd via PDO ================ -->
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
    </head>
<!-- ======================================================= -->


    <body>





<!-- ===================== TITRE ===================== -->
        <header class="headera">
            <h1>INFORMATIONS DU PERSONNEL</h1>
            <h3>INSCRIRE / MODIFIER UNE EQUIPE</h3>
        </header>

<!-- ===================== MENU ===================== -->
        <nav>
        <?php include("includes/menu.php"); ?>
    </nav>
    
<?php //affiche_variables_session(); ?>



<!--====================login=============================-->
                <aside class="log_equipea">
                <?php include("includes/log_equipe.inc.php"); ?>
                </aside>
 
<!--================== SELECTIONNER EMPLOYE ===================-->

        <section id="selectionner_employe">
            <?php include("includes/selection_employe.inc.php"); ?>
         </section>



<!--===================COMMENT CREER UNE EQUIPE==============-->

        <section id="creer_personnel">
            <?php include("includes/inscription_personnel.inc.php"); ?>
         </section>

<!--===========================DESCRIPTION EQUIPE=======================-->
        <section id="attribution_conges">
        
        <?php include("includes/attribution_conges.inc.php"); ?>
        
        
        </section>
        
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
        
        <script language="JavaScript" type="text/javascript" src="scripts.js"></script>
        
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
