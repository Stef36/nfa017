<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" lang="fr">
    <meta name="Mes Repos"  content="poser consulter jours congés travail équipe ">
	 <title>Contact | Poser mes repos en ligne</title>


  <link rel="icon" type="image/x-icon" href="./images/photos/favicon.ico">
  
  <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

  <!-- ===================== TITRE ===================== -->

  <?php require ("./includes/header.inc.php"); titre_header('Formulaire de Contact')?>


  <!-- ===================== MENU ===================== -->
  <?php include("includes/menu.php"); ?>

  <section id="">
  
      <H3>Vous souhaitez pouvoir utiliser "mesrepos.domduf.com"</H3>
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
    <form name="preInscription"  method="POST" action="contact_enregistrement.php" onsubmit="return valider()" >
  
    
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
        <input type="text" name="login_souhait" size="50"placeholder="nomEquipe-ENTREPRISE" onblur="logFunc()">Le login souhaité.<br/>

        <INPUT TYPE="radio" NAME="CHOIX" VALUE="information">information<BR> 
        <INPUT TYPE="radio" NAME="CHOIX" VALUE="amelioration">suggestion d'amélioration<BR> 
       
        <label for="Remarques"><span id="errRem"></span></label><br/> 
        <textarea onblur="remFunc()" placeholder="(merci d'éviter les caractères spéciaux)" name="rem" id="rem"></textarea>

      </fieldset> 
    </div>
    
      <input type="hidden" name="ip" id="ip" value= "<?php echo get_ip() ?>" />
        
    <br/>
    
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
<!--==============================GOOGLE MAP================================-->
    <div id="map" >
                <a>Où sommes nous ?</a><br><br>
                <a href="" onmouseover="javascript:map('id_div_1'); return false;">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241425.24280187566!2d1.9475511813183024!3d48.04466644576435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e5aacf14d343fb%3A0x1c0dc8da45484380!2s45170+Neuville-aux-Bois!5e0!3m2!1sfr!2sfr!4v1493323796756" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></a> <br>
                
            </div><br>                


  <!-- ===================AFFICHE MESSAGES RECUS      ======= -->
  <!-- =================  si connecté administrateur  ======= -->
  <!-- =================  POUR csv                    ======= -->

  <?php if ( isset($_SESSION['login']) )

    {

    // connection BD
    include ("./includes/connection.php");



    // requete de selection de tous les messages
    $sqlmessage = "SELECT     *
                  FROM    contact ;" ;
    
    $messages= $pdo -> query($sqlmessage); 

    $fichier_csv=array();  // declaration d'un tableau csv 
    $fichier_csv[]=array("date",
                          "id",
                          "login_souhait",
                          "prenom",
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

        // actualise le fichier csv en ajoutant une ligne (elle même array)
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
        } 



        ?>

  

    </table>

    <pre> <?php 
    //print_r($fichier_csv); ?>
      
    </pre>

    <?php  

    }  ?>

  <!-- ===================== BAS DE PAGE  ===================== -->

  <?php include("includes/basDePage.php"); ?>


  <!-- ============= Appels de scripts JS ================== -->
  <script src='./javascripts/validationChamps.js' type = 'text/javascript' ></script>
  <script src='./javascripts/date.js' type = 'text/javascript' ></script>
  <script src='./javascripts/kapcha.js' type = 'text/javascript' ></script>

</body>
</html>
