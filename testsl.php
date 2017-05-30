<?php include("./includes/gestion_connection_equipe.inc.php"); ?>
<!-- ================ Connection bdd via PDO ================ -->
<?php include("./includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="fr" >
<head>

        <meta charset="UTF-8" lang="fr">

        <meta name="description" content="test php & sql">
        
        </head>
<!-- ======================================================= -->

    <body>
    <h1>TEST PHP & SQL</H1>
    <?php affiche_variables_session(); ?>
<p>**************************CODES VALIDES**********************************</p>
        <?php include("includes/testsl.inc.php"); ?>
        
        <hr><hr><hr>
        
<p>**************************NOUVEAUX TESTS*********************************</p>
     
        <?php include("includes/testsl1.inc.php"); ?>
        
        
<p>**************************TESTS JOINTURE*********************************</p>
     
        <?php include("includes/testsl2.inc.php"); ?>
        
        
        
        ****************************************
        <p>Page tests3.inc.php</p>
        <?php include("includes/testsl3.inc.php"); ?>
        
        
        
        
        
    </body>
</html>