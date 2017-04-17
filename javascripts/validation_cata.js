
//Validation de l'adresse email
function valid_mail()
{
    var $saisie = String(document.formulaire.mail.value);
    var $mail = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

    if (!$mail.test($saisie))
    {
        alert("Une adresse email doit avoir le format suivant : name@hostname.xx");
    }
}