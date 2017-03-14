<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Formulaire de Contact')?>


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

	<!-- Début du FORMULAIRE -->
		<form name="preInscription"  method="POST" action="contact.php" onsubmit="return valider()" >
	
	
		
	
	
		
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
	    
			  <INPUT TYPE="radio" NAME="CHOIX" VALUE="contact" checked>contact<BR> 
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
    </form>	

<!-- ============= Appels de scripts JS ================== -->
<script src='./javascripts/validationChamps.js' type = 'text/javascript' ></script>
<script src='./javascripts/date.js' type = 'text/javascript' ></script>
<script src='./javascripts/kapcha.js' type = 'text/javascript' ></script>

</body>
</html>