<?php Session_start()?>

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
<!--===================COMMENT CREER UNE EQUIPE==============-->
        <section id="creer_personnel">
            <?php include("includes/inscription_personnel.inc.php"); ?>
         </section>
            <section id="flex">
                
    
<!--====================login=============================-->
                <aside class="log_employe">
log_employe
                <?php include("includes/log_employe.inc.php"); ?>
                </aside>
        
       
        </section>
<!--===========================DESCRIPTION EQUIPE=======================-->
        <section id="attribution_conges">
        
        <h2>ATTRIBUTION DES CONGES</h2>
    <form class="attribution_form" action="inscription_personnel.php" Method="post" name="formulaire"  >
        <ul>
            <li><label for="number">Congés payés :</label>
                <input type="text" id="conges_payes" name="conges_payes" size="3"  onblur="" > jours</li>
            <BR>
            <li><label for="number">Ancienneté :</label>
                <input size="3" type="text" name="anciennete" id="anciennete"> jours</li>
            <BR>
            <li><label for="number">RTT :</label>
                <input size="3" type="text" name="rtt" id="rtt"> jours</li>
            <br>
            <li><label for="number">Maladie :</label>
                <input size="3" type="text" name="maladie" id="maladie"> jours</li>
            <br>
            <li><label for="number">Abscence non autorisée :</label>
                <input size="3" type="text" name="abscence" id="abscence">
            jours</li>
            <br>
            <li><label for="number">Formation :</label>
                <input size="3" type="text" name="formation" id="formation"> jours
            </li>
            <br>
        </ul>
        <fieldset>
            <center>
                <legend>Commentaires :</legend>
            </center>
            <center><br>
                <textarea name="message" rows="8" cols="100" placeholder="Tapez votre commentaires" onblur="valid_message()" ></textarea>
                <br>
            </center>
            <br>
        </fieldset>
        
        
<!--==========Boutons de réinitialisation et de validation===============-->
            <center>
            <input type="Reset" value="Réinitialiser" />
                <input type="submit" value="Envoyer" onclick="alert(ValidBotBoot());">
            </center>
    </form>
        
        
        </section>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
    </body>

</html>
