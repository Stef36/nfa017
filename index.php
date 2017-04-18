<?php Session_start()?>

<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
    <head>

        <meta charset="UTF-8" lang="fr">
        <meta name="Mes Repos"  content="poser consulter jours congés travail équipe ">

 
        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
        <title>Poser mes repos en ligne</title>

        <!-- charger les feuiles de style  -->
        <link href="./css/style.css" rel="stylesheet" type="text/css" />

            <!-- animation du mode d'emploi via css dédié  -->
        <link href="./css/mode-emploi.css" rel="stylesheet" type="text/css" />

    </head>

<!-- ======================================================= -->


    <body>


<!-- ===================== TITRE ===================== -->


<?php require ("./includes/header.inc.php"); titre_header('Bientôt un site gratuit pour poser ses jours de congé en ligne')?>





<!-- ===================== MENU ===================== -->
        <?php include("includes/menu.php"); ?>


<section id="provisoire">


<ol>
    <li>Le chef d'équipe interréssé par le site envoie un mail par le biais du menu "contact" </li>

    <li>Le webmaster (en BO (Back-Office) reçoit ce mail et créé un login et un mdp à ce chef d'équipe, et lui envoie par mail (fictif)</li>

    <li>Le chef d'équipe peut se logger (en menu "Les équipes") et construire son équipe en menu "Les équipes" /"Inscrire-Modifier" , en créant chaque employé, en remplissant les champs NOM, prénom, etc, y compris le mail de l'employé.</li>

    <li>Les employés reçoivent individuellement un mail avec leur loggin (créés par le chef d'équipe) et le mdp (créé aléatoirement sur 4 caractères en PHP 5) les employés peuvent se logger en menu "Mes congés" </li>

</ol>

</section>

<section id="animation-mode-emploi">

    <p id="animation">

        <img src="./images/animation-accueuil/4.jpg" id="image4">
        <img src="./images/animation-accueuil/3.jpg" id="image3">    
        <img src="./images/animation-accueuil/2.jpg" id="image2">
        <img src="./images/animation-accueuil/1.jpg" id="image1">



    

    </p>
    

</section>
  


<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
    </body>

</html>
