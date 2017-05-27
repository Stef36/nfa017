<?php include("./includes/gestion_connection_equipe.inc.php"); ?>
<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="fr" >

<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">

        <meta name="description" content="poser et consulter gratuitement ses jours de congés -> gestion par employeurs inscription des membres de travail">

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
  

        <title>Mes Congés | Inscrire son équipe</title>
 
         <link href="./css/style.css" rel="stylesheet" type="text/css" />      
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
    </head>
<!-- ======================================================= -->


    <body>
<!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>

<!-- ===================== TITRE ===================== -->
<?php require ("./includes/header.inc.php"); titre_header('INSCRIRE DES MEMBRES <br>/<br>MODIFIER UNE EQUIPE de TRAVAIL')?>
<!-- ===================== TITRE ===================== -->


<!-- ===================== TITRE ===================== 
        <header class="headera">
            <h1>INFORMATIONS DU PERSONNEL</h1>
            <h3>INSCRIRE / MODIFIER UNE EQUIPE</h3>
        </header>-->

<!-- ===================== MENU ===================== -->

        <?php include("includes/menu.php"); ?>

<!-- ======== SECTION illustration de l'article ======= -->
    <section id="image-article">
        <img src="./images/Le-chef-equipe-se-connecte-et-cree-son-equipe.jpg" alt="Le chef d'équipe peut se connecter et construire son équipe">


        <H2>Sur cette page, vous <?php if (!isset($_SESSION['ticket_equipe'])) 
                                        {echo "pourrez";} else echo "pouvez"; ?>
            inscrire et/ou modifier les fiches des membres de votre équipe.</H2>
     <p>Vous <?php if (!isset($_SESSION['ticket_equipe'])) 
                                        {echo "pourrez";} else echo "pouvez"; ?> ensuite vous connecter sur cette page (en tant que responsable d'équipe) pour saisir les noms et les congés alloués à chaque employés dont vous êtes en charge.</p>

     <p>Ici pour <a href="./equipes-inscrire-modifier.php">construire</a> l'équipe et attribuer les congés, ou <a href="./equipes-gerer-conges.php">là</a> pour gérer les congés</p>
    </section>
    
<?php //affiche_variables_session(); ?>

<!--=======voir si possibilité===Menu de demande de validation================-->
        <article id="warm">

        <?php include("includes/warm_equipe.inc.php"); ?>
        </article>

<!--====================login=============================-->
                <aside class="log_equipea">
                <?php include("includes/log_equipe.inc.php"); ?>
                </aside>
                <br>
               
                <br>
<!--================== SELECTIONNER EMPLOYE ===================-->

        <section id="selectionner_employe">
            <?php include("includes/selection_employe.inc.php"); ?>
         </section>



<!--===================COMMENT CREER UNE EQUIPE==============-->
<hr>
        <section id="creer_personnel">
            <?php include("includes/inscription_personnel.inc.php"); ?>
         </section>
        <br>
                <br><hr><br>
<!--=========================DESCRIPTION EQUIPE====================-->
        <section id="attribution_conges">
        
        <?php include("includes/attribution_conges.inc.php"); ?>
        
        
        </section>
        
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
        
        <script language="JavaScript" type="text/javascript" src="scripts.js"></script>
        <script language="JavaScript" type="text/javascript" src="./javascripts/email-validation.js"></script>


        
<!--**********************************************************-->
<!--***** AFFICHAGE INFORMATION DE LA LARGEUR DE LA PAGE *****-->
    <script type="text/javascript">
                    {
                        var $largeur = document.body.clientWidth;

                        document.write('Largeur de la page : ' + $largeur + ' px');
                    }
                </script>
        
        
    </body>

</html>
