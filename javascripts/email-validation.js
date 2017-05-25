//================validation de l'email============================
function emailFunc(){

		//alert('hello');

      $email= document.formulaire_modif_employe.employe_mail.value;
  var $erreur = document.getElementById('errMail');
  
  function estUnEmail(myVar){  // trouvé sur http://www.analyste-programmeur.com
       // La 1ère étape consiste à définir l'expression régulière d'une adresse email
       var $regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');

       return $regEmail.test(myVar);
     }


    if ( ! estUnEmail($email)) { // si pas de la forme email
    $erreur.style.color= "red";
    $erreur.innerHTML= ('le format n\'est pas bon !');
    document.formulaire_modif_employe.employe_mail.value="";
    }
    
    else {
    $erreur.style.color= "green";
    $erreur.innerHTML= (' ok !');

    }
  }