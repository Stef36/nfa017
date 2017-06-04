<?php include("./includes/session_start_et_pose_cookie_bienvenue.inc.php"); ?>

<!DOCTYPE html>
<html lang="fr-fr" >

<!-- ======================================================= -->
    <head>



        <meta charset="UTF-8" lang="fr">

 
        <meta name="description" content="gerer et consulter gratuitement ses jours de congés, gestion par employeurs, consultation par employes">

        <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico" >
        
        <title>Poser, consulter, gerer mes repos et jours de conges en ligne</title>

        <!-- charger les feuiles de style  -->
        <link href="./css/style.css" rel="stylesheet" type="text/css" />
        <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
        <!-- animation du mode d'emploi via css dédié  -->
        <link href="./css/mode-emploi.css" rel="stylesheet" type="text/css" />

    </head>

<!-- ======================================================= -->


    <body>
<!--==============================logo========================-->
    <?php include("includes/logo.inc.php"); ?>

<!-- ===================== TITRE ===================== -->


    <?php require ("./includes/header.inc.php"); titre_header('POSER, CONSULTER ET GERER GRATUITEMENT SES JOURS DE CONGE EN LIGNE')?>



<!-- ===================== MENU ===================== -->
    <?php include("includes/menu.php"); ?>


<section id="provisoire">


<ol>

    <li>
        <h2>Le chef d'équipe interressé par le site demande son inscription via le menu "contact" </h2>

        <p>Vous avez entendu parler du site "mesrepos", et vous êtes interréssés par une centralisation claire de la gestion des congés de vos employés</p>

        <p>Vous aimeriez avoir gratuitement une vue des congés à un instant "t" de l'ensemble des travailleurs sous votre responsabilité.</p>
    </li>



    <li>
        <h2>Le responsable du site créé un login et un mot de passe, et lui communique une confirmation de création d'équipe par envoi personnalisé.</h2>

        <p>L'inscription se fait de manière personnalisée. Aucune information n'est traitée automatiquement lors de l'inscription. Vous êtes sûr de la fiabilité.</p>
        
    </li>



    <li>
        <h2>La construction de votre équipe peut commencer en ligne.
        </h2>

        <p>Le responsable peut se logger (via menu "Les équipes") et construire son équipe (via  menu "Les équipes" /"Inscrire-Modifier") , en créant une chaque employé, en remplissant les champs NOM, prénom, etc, y compris le mail de l'employé.</p>

    </li>



    <li>
        <h2>Les employés peuvent poser et consulter leurs congés et leurs jours de repos gratuitement .</h2>

        <p>Les employés reçoivent individuellement un mail avec leur loggin (créés par le chef d'équipe) et le mdp. Les employés peuvent se logger en menu "Mes congés"</p>

    </li>



</ol>

</section>

<section id="animation-mode-emploi">

    <p id="animation">

        <img src="./images/animation-accueuil/4.jpg" id="image4" alt="les employes peuvent consulter et poser leurs conges en ligne mesrepos.domduf.com">
        <img src="./images/animation-accueuil/3.jpg" id="image3" alt="le responsable drh construit son equipe et attribue conges mesrepos.domduf.com">    
        <img src="./images/animation-accueuil/2.jpg" id="image2" alt="le responsable site mesrepos donne gratuitement login responsable equipe mesrepos.domduf.com">
        <img src="./images/animation-accueuil/1.jpg" id="image1" alt="le responsable equipe drh contacte responsable site mesrepos mesrepos.domduf.com">



    

    </p>
    

</section>
  


<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
    </body>

</html>
