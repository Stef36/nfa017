<!--================== LOG EMPLOYE====================-->

            

            <?php if (!isset ($_SESSION['ticket_employe'])) 
                { /* si pas encore connecté */?> 
            <span>
                
                <H2>Utilisateur,</br> connectez vous:</H2>
                    <form name="formConnect" method="POST" >
                    <table class="log_equipe">
                        <tr>
                            <th >login d'employé</th>
                            <td ><input type="text" size="20" name="login_employe" value="toto" id="login_employe"/></td>
                        </tr>

                        <tr>
                            <th >mot de passe</th>
                            <td ><input type="password" size="20" name="employe-passwd" id="employe-passwd" /></td>
                        </tr>
        
                        <tr>
                            <th  >Se connecter</th>
                            <td ><input type="submit" name="soumission" id="soumission" value="Soumettre" /></td>
                        </tr>
     
                    </table>
                </form>
            </span>
                <?php }

                if (isset($_SESSION['ticket_employe'])) {

                    // affichage si employe connecté
                     echo "<p>OK</p>"; ?>


                     <form name="deconnection_employe" method="POST">
                         <table>

                             <tr>
                                 <th>Se déconnecter ?</th>
                                <td><input type="hidden" name="deconnecter_employe" value="OK"/></td>
                                 <td><input type="submit" name="déconnection" id="déconnection" value="OUI" /></td>
                             </tr>
                         </table>
                     </form>



                 <?php } ?>




