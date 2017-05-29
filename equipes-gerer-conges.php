<?php include("./includes/gestion_connection_equipe.inc.php"); ?>
<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="fr" >

<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">

        <meta name="description" content="poser et consulter gratuitement ses jours de congés -> gestion par employeurs gestion conges des membres de travail">
        

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
  

        <title>Mes Congés | Gérer congés employés</title>
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />

        <!--<link href="./css/calendar.css" rel="stylesheet" type="text/css" />-->
    </head>
<!-- ======================================================= -->

    <body>
<!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>




<!-- ===================== TITRE ===================== -->
<?php require ("./includes/header.inc.php"); titre_header('GESTION DES CONGES')?>
<!-- ===================== TITRE ===================== -->



<!-- ===================== MENU ===================== -->

        <?php include("includes/menu.php"); ?>


<!-- ============= IMAGE ARTICLE et SOUS-TITRE ======= -->
    <section id="image-article">

        <img src="./images/Le-chef-equipe-gere-les-conges-de-chaque-employe.jpg" alt="Le chef equipe gere les conges de chaque employe">

        <H2>Sur cette page, vous pourrez, en tant que responsable de votre équipe, consulter et confirmer les congés posés par les employés.</H2>

        <br>

        <p>Ici pour <a href="./equipes-inscrire-modifier.php">construire</a> l'équipe et attribuer les congés, ou <a href="./equipes-gerer-conges.php">là</a> pour gérer les congés</p>

    </section>       



<br>
<hr>


<!--==================== LOG EQUIPE    ============================-->
        <aside class="log_equipea">
        <?php include("includes/log_equipe.inc.php"); ?>
        </aside>

        <br>
        <hr>
        <br>




<!--===========liste déroulante pour la selection de l'employé==========-->

            <section id="choix_employe">

                <p>Choisissez un employé avec la liste déroulante pour avoir les informations le concernant</p>


                <section id="selectionner_employe">
                        <?php include("includes/selection_employe.inc.php"); ?>
                </section>
                
            </section>

            <br>
            <hr>
                


<!--=================  CARTE IDENTITE EMPLOYE ================-->

    <section  >

    <?php include("includes/employes_vu_par_employeur.inc.php"); ?>
      
    </section>

    <br>
    <hr>
                
                        


<!--======================================================-->

    <?php include("includes/equipe_formulaire_voir_et_valider_conges.inc.php"); ?>
                       
<section id="container">
                    <section class="flex1">
<article id="conges_restants">
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