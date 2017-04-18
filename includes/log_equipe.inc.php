<!--==================COMMENT CREER UNE EQUIPE====================-->

			

            <?php if (!isset ($_SESSION['ticket_equipe'])) 
            	{ /* si pas encore connecté */?> 
            <span>
                
                <H2>Responsable d'une équipe,</br> connectez vous:</H2>
                    <form name="formConnect" method="POST" >
                    <table>
                        <tr>
                            <th >login d'équipe</th>
                            <td ><input type="text" size="20" name="login_equipe" value="toto" id="login_equipe"/></td>
                        </tr>

                        <tr>
                            <th >mot de passe</th>
                            <td ><input type="password" size="20" name="equipe-passwd" id="equipe-passwd" /></td>
                        </tr>
        
                        <tr>
                            <th  >Se connecter</th>
                            <td ><input type="submit" name="soumission" id="soumission" value="Soumettre" /></td>
                        </tr>
     
                    </table>
                </form>
            </span>
                <?php } ?>

<p>log_equipe </p>

