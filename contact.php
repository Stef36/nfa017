<?php session_start();
require ("./includes/fonctions_utiles.php");
$page='contact';
pose_cookie_bienvenue($page); ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" lang="fr">
    <meta name="Mes Repos"  content="poser consulter jours congés travail équipe ">
     <title>Contact | Poser mes repos en ligne</title>


  <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
  <link href="./css/stylea.css" rel="stylesheet" type="text/css" />
  <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--==============================logo========================-->
        <?php include("./includes/logo.inc.php"); ?>

         <?php verif_cookie_bienvenue($page); ?>

<!-- ======================== TITRE ========================== -->

  <?php require ("./includes/header.inc.php"); titre_header('Formulaire de Contact')?>


  <!-- ========================= MENU ======================== -->
  <?php include("includes/menu.php"); ?>

  <section id="">
  
      <H3>Vous souhaitez pouvoir utiliser "mesrepos.com"</H3>
      <p>Merci de bien vouloir remplir ce formulaire, et nous vous envoyons votre code au plus vite. </p>

      <p><?php
        //va chercher la fonction get_ip()
        require "./includes/adresse_IP.php"; 
     
        // Afficher l'adresse IP
        echo 'Votre adresse IP : '.get_ip();
        ?></p>

  </section>   

  <?php  /*mise à 0 de l'indicateur de remplissage formulaire */
    $_SESSION['formulaire_entreeBD']="0"; ?>

  <!-- Début du FORMULAIRE -->
    <form name="preInscription"  method="POST" action="contact-enregistrement.php"  id="preInscription" onsubmit="return valider()" >
  
    
  <div>
        <fieldset id="Champscoordonnee" class="Champscoordonnee" ><legend>Vos coordonnées</legend>

      
        <label for="nom">NOM*<span id="errNom"></span> :</label>
        <input  onblur="nomFunc()"  maxlength="50"  type="text" name="nom" id="nom"/><br/>
      
        <label for="prenom">Prénom*<span id="errPrenom"></span>:</label>
        <input onblur="prenomFunc()" maxlength="50" type="text" name="prenom" id="prenom"/><br/>
      
        <label for="monMail">Email*<span id="errMail"></span>:</label>
        <input onblur="emailFunc()"  type="email" name="monMail" id="monMail"/><br/>
    
        <label for="monTel">N° de tel portable*:<span id="errTel"></span></label>
        <input onblur="telFunc()" type="tel" name="monTel" id="monTel" /><br/>
    
        <div> * Champ obligatoires.</div>
      </fieldset>
      
      <fieldset ><legend>Votre message a pour objet:</legend>
      
        <INPUT TYPE="radio" NAME="CHOIX" VALUE="contact" checked>Merci de créer une équipe, je renseigne ci-dessous le loggin souhaité.<BR>


        <!-- TODO fonction js de verif de format de login souhaité -->
        <input type="text" name="login_souhait" size="50" placeholder="nomEquipe-ENTREPRISE" onblur="logFunc()"><br/>

        <INPUT TYPE="radio" NAME="CHOIX" VALUE="information">information<BR> 
        <INPUT TYPE="radio" NAME="CHOIX" VALUE="amelioration">suggestion d'amélioration<BR> 
       
        <label for="Remarques"><span id="errRem"></span></label><br/> 
        <textarea onblur="remFunc()" placeholder="(merci d'éviter les caractères spéciaux)" name="rem" id="rem"></textarea>
 <br/>
      </fieldset> 
    </div>
    
      <input type="hidden" name="ip" id="ip" value= "<?php echo get_ip() ?>" />
        
    <br/>

 
    <p>Avant d'envoyer,additionnez ces deux nombres:<br/>  
      <label for="kapcharep"><span id="n1"></span> + <span id="n2"> </span> =</label>
      <input onblur="kapcharepFunc()" type="text"  name="kapcharep" id="kapcharep"  />
      <span id="errKapcha"></span>
      <div> * Champ obligatoires.</div>
  
     
     <br/>
    <p><input type="submit" value="Envoyer à notre secretaire" /> ou alors...<input type="reset" value="J'annule tout, désolé." />
    </p>
    </form><br>

    <?php if ( !isset($_SESSION['login'])) { 
    // ne charge pas la map si connecté comme administrateur ?>

<!--==============================GOOGLE MAP================================-->
    <div >
                <a>Où sommes nous ?</a><br><br>
                <a href="" onmouseover="javascript:map('id_div_1'); return false;">
               <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241425.24280187566!2d1.9475511813183024!3d48.04466644576435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e5aacf14d343fb%3A0x1c0dc8da45484380!2s45170+Neuville-aux-Bois!5e0!3m2!1sfr!2sfr!4v1493323796756" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></a> <br>
                
            </div><br> 
    <?php } ?>               


  <!-- ===================AFFICHE MESSAGES RECUS      ======= -->
  <!-- =================  si connecté administrateur  ======= -->
  <!-- =================  POUR csv                    ======= -->

  <?php if ( isset($_SESSION['login']) )

    {

    // connection BD
    include ("./includes/connection.php");



    // requete de selection de tous les messages
    $sqlmessage = "SELECT     contact_id, contact_login_souhait, contact_prenom, contact_nom,  contact_email, contact_telephone, contact_objet,  contact_message, contact_dateTime, contact_adresseIP
                  FROM    contact ;" ;
    
    $messages= $pdo -> query($sqlmessage); 

    $fichier_csv=array();  // declaration d'un tableau à ecrire dans fichier csv 

    // première ligne du tableau à ecrire dans fichier csv (en-tête)
    $fichier_csv[]=array("date",
                          "id",
                          "login_souhait",
                          "prénom",
                          "nom",
                          "email",
                          "telephone",
                          "objet",
                          "message",
                          "adresse_IP");
    ?>

  

    <table id="tableau_messages">
      <tr>
        <th>id</th>
        <th>Login<br>souhaité</th>
        <th>Prénom<br>Nom</th>
        <th>mail</th>
        <th>tel</th>
        <th>Objet</th>

        <th>Message</th>
        <th>Date Time</th>
        <th>IP visiteur</th>
      </tr>

          <?php 
        while ($message = $messages->fetch()) {
        ?> <tr>
          <td><?php echo $message['contact_id'];?></td>
          <td><?php echo $message['contact_login_souhait'];?></td>    
          <td><?php echo $message['contact_prenom'].'<br> '.$message['contact_nom'];?></td>
          <td><?php echo $message['contact_email'];?></td>
          <td><?php echo $message['contact_telephone'];?></td>
          <td><?php echo $message['contact_objet'];?></td>
          <td><?php echo $message['contact_message'];?></td>
          <td><?php echo $message['contact_dateTime'];?></td>
          <td><?php echo $message['contact_adresseIP'];?></td>
          </tr> 


        <?php 

        // actualise le tableau fichier csv en ajoutant une ligne (elle même array)
        $fichier_csv[] = array( $message['contact_dateTime'],
                                $message['contact_id'],
                                $message['contact_login_souhait'],
                                $message['contact_prenom'],
                                $message['contact_nom'],
                                $message['contact_email'],
                                $message['contact_telephone'],
                                $message['contact_objet'],
                                $message['contact_message'],
                                $message['contact_adresseIP']);


        /* fin de la boucle d'affichage */
        } ?>

        </table> 


        <?php



        // source ouverture, création ecriture de fichier via PHP
        // Sources:
        //  https://www.coursinformatique.net/php/ecrire-dans-un-fichier-texte-avec-des-retours-a-la-ligne.html


        // parametres de l'ecriture du fichier csv
        $chemin="./docs/csv/messages_recus.csv";
        $delimiteur=','; // delimiteur 

        // ecriture du fichier csv sur le disque du serveur
        $messages_recu_csv=fopen($chemin, 'w+');

        // Si votre fichier a vocation a être importé dans Excel,
        // vous devez impérativement utiliser la ligne ci-dessous pour corriger
        // les problèmes d'affichage des caractères internationaux (les accents par exemple)
        fprintf($messages_recu_csv, chr(0xEF).chr(0xBB).chr(0xBF));


        // boucle foreach d'écriture des lignes de $fichier_csv
        foreach ($fichier_csv as $ligne) {
          fputcsv($messages_recu_csv, $ligne, $delimiteur);
        }

        // on ferme le fichier 
        fclose($messages_recu_csv);



        ?>

        <!-- ====== BOUTON DE TELECHARGEMENT du fichier csv ============-->
        <span id="bouton_telechargement">
        <a href="./docs/csv/messages_recus.csv">Téléchargez le fichier des messages reçus</a>
        </span>
        

    <!--  affichage du tableau $fichier_csv ==================
    <pre> <?php 
    print_r($fichier_csv); ?>
    </pre> =================================================-->



    <?php  

    }  ?>

  <!-- ===================== BAS DE PAGE  ===================== -->

  <?php include("includes/basDePage.php"); ?>


  <!-- ============= Appels de scripts JS ================== -->
  <script src='./javascripts/validationChamps.js' type = 'text/javascript' ></script>
  <script src='./javascripts/date.js' type = 'text/javascript' ></script>
  <script src='./javascripts/kapcha.js' type = 'text/javascript' ></script>
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
