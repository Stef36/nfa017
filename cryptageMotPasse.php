<?php

if (isset($_POST['login']) AND isset($_POST['pass']))

{

    $login = $_POST['login'];

    $pass_crypte = crypt($_POST['pass']); // On crypte le mot de passe
	$pass_crypteP= password_hash($_POST['pass'], PASSWORD_DEFAULT);  // Crypté PHP

    //echo '<p>Ligne à copier dans le .htpasswd :<br />' . $login . ':' . $pass_crypte . '</p>';
	echo '<p>Plus sécurisé, à copier dans le .htpasswd :<br />' .$login . ':' . $pass_crypteP .'</p>';   

}


else // On n'a pas encore rempli le formulaire

{

?>


<p>Entrez votre login et votre mot de passe pour le crypter.</p>


<form method="post">

    <p>

        Login : <input type="text" name="login"><br />

        Mot de passe : <input type="text" name="pass"><br /><br />

    

        <input type="submit" value="Crypter !">

    </p>

</form>


<?php

}

?>
