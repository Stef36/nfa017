<!--================== LOG EQUIPE====================-->

            

            <?php if (!isset ($_SESSION['ticket_equipe'])) 
                { /* si pas encore connecté */?> 
            <span>
                
                <H2>Responsable d'une équipe,</br> connectez vous:</H2>
                    <form name="formConnect" method="POST" >
                    <table class="log_equipe">
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
                <?php }

                if (isset($_SESSION['ticket_equipe'])) {

                    // affichage si équipe connectée
                     echo "<p>OK</p>"; ?>


                 	<form name="deconnection_equipe" method="POST">
                 		<table>

                 			<tr>
                 				<th>Se déconnecter ?</th>
                                <td><input type="hidden" name="deconnecter_equipe" value="OK"/></td>
                 				<td><input type="submit" name="déconnection" id="déconnection" value="OUI" /></td>
                 			</tr>
                 		</table>
                 	</form>



                 <?php } ?>




