<!--==================COMMENT CREER UNE EQUIPE====================-->
<head>
<link href="./css/stylea.css" rel="stylesheet" type="text/css" />
</head>

<h2>FICHE D'INSCRIPTION</h2>
    <form class="contact_form" action="inscription_personnel.php" Method="post" name="formulaire"  >
        <ul>
            <li><label for="noms">Nom Prénom :</label>
                <input type="text" id="nom" name="nom" size="40" placeholder="Dupond Bernard" onblur="" required></li>
            <BR>
            <li><label for="number">Age :</label>
                <input size="3" type="text" name="age" id="age" placeholder="24"> </li>
            <BR>
            <li><label for="adresse">Adresse :</label>
                <input size="50" type="text" name="adresse" id="adresse" placeholder="24, rue des spectateurs - 36000 Chateauroux"></li>
            <BR>
            <li><label for="text">Fonction :</label>
                <input size="50" type="text" name="fonction" id="fonction" placeholder="Electricien"></li>
            <BR>
            <li><label for="adresse_mail">Adresse mail :</label>
                <input type="email" id="adresse_mail" name="mail" size="30" placeholder="bdupond@lecnam.net" onblur="valid_mail()"></li>
            <BR>
            <li><label for="equipe">Equipe :</label>
                <input size="50" type="text" name="equipe" id="equipe" placeholder="equipe A"></li>
            <BR>
        </ul>
        <fieldset>
            <center>
                <legend>Commentaires :</legend>
            </center>
            <center><br>
                <textarea name="message" rows="8" cols="100" placeholder="Tapez votre message" onblur="valid_message()" required></textarea>
                <br>
            </center>
            <br>
        </fieldset>
        
        
        
        
    </form>