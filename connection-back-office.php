<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr-fr" >




<!-- ======================================================= -->
<head>

<meta charset="UTF-8" lang="fr"/>
<meta name="description"  content="back-office ">

<link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">

<title>Connection au Back-Office |  Poser mes repos en ligne </title>
<link href="./css/style.css" rel="stylesheet" type="text/css" />
<link href="./css/stylea.css" rel="stylesheet" type="text/css" />

</head>
<!-- ======================================================= -->


<body>
<!--==============================logo========================-->
        <?php include("includes/logo.inc.php"); ?>


<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Connection </br>back-office')?>

<!-- ===================== VIDE POUR MENU   ========================== -->
<!--============= (include en bas de page pour referencement)  ======= -->
<section id="vide_sideral"></section>



<!-- ===================== VISUEL ===================== -->

<section id="">



          <?php 

          
          if (!isset ($_SESSION['login'])) { /* si pas encore connecté */?> 
          <span>
          
          <H2>Administrateur du site, connectez vous:</H2>
          <form name="formConnect" method="POST" action="./backoffice.php">
              <table>
                   <tr>
                    <th >login</th>
                    <td ><input type="text" size="25" name="user-name" value="toto" id="user-name"/></td>
                  </tr>

                  <tr>
                    <th >mot de passe</th>
                    <td ><input type="password" size="10" name="user-passwd" id="user-passwd" /></td>
                  </tr>          
                  
                  <tr>
                    <th  >Se connecter</th>
                    <td ><input type="submit" name="soumission" id="soumission" value="Soumettre" /></td>
                  </tr>    
 
              </table>
          </form>
          </span>
          <?php }
          
          else { /* si déjà connecté */ ?>
          <span id="administration">
      
      
              <H2 ><?php echo $_SESSION['login'];?>, vous êtes connecté,</br> que voulez vous faire ?</H2>

 

                      
                      <a href="backoffice.php" class="liens-direct">Retour</a>

                      
                     <a href="administration_deconnection.php"  class="deconnection">Se déconnecter, bye !</a></td>


              
          </span>
          <?php
          
          }
           
           ?>

    


</section>


<!-- ===================== BAS DE PAGE  ===================== -->
        <?php include("includes/basDePage.php"); ?>
</body>

</html>
