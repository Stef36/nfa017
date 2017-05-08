<!-- ici se trouve le menu, que l'on retrouve sur chaque page du site-->
<div id = posMenu> <!-- permet de mettre en boite flex le menu -->

<nav id = "navigation"  role="navigation" >  

    <input type="checkbox" id="toggle-nav" aria-label="open/close navigation">
  <label for="toggle-nav" class="nav-button"></label>

    <div class="nav-inner">
        


            <ul class="container_menu"> <!-- liste non ordonnée -->
        
                    <li id="flex_menu">
                    <a href="./index.php" >Accueil</a>
                    </li>
                    
                    <li id="flex_menu">
                    <a href="./equipes_presentation.php">Les équipes</a>
                        <ul>
                            <li id="flex_menu">
                            <a href="equipes_inscrire_modifier.php">Inscrire / Modifier</a>
                            </li><hr/>
                            <li id="flex_menu">
                            <a href="equipes_gerer_conges.php">Gerer les congés</a>
                            </li>
                        </ul>        
                    </li>

                    
                    <li id="flex_menu">
                    <a href="./mes_conges.php">Mes congés</a>
                        <ul>
                            <li>
                            <a href="mes_conges_consulter.php">Consulter</a>
                            </li><hr/>
                            <li>
                            <a href="mes_conges_poser.php">Poser</a>
                            </li>
        
                        </ul>
                    </li>
                    
                    <li>
                    <a href="./contact.php">Contact</a>
                    </li>
        
                    <?php if ( !isset ($_SESSION['ticket'])) { 
        
                        // la variable $_SESSION['ticket'] 
                        // est mise à true lors de la connection au BO
        
                        // n'affiche rien
                    }
        
        
                    elseif ($_SESSION['ticket']==true) {
                    
                        // on va afficher un lien vers la liste de gestion
                        ?>
        
                    <li>
                    <a href="./backoffice.php">Admin.</a>
                    </li>    <?php 
        
        
                    } ?>
                    
                </ul>



    </div>



</nav>
<?php affiche_variables_session(); ?>

</div>
