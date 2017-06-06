<!-- ici se trouve le menu, que l'on retrouve sur chaque page du site-->
<div id = posMenu> <!-- permet de mettre en boite flex le menu -->

<nav id = "navigation"  class="menu">  

    <input type="checkbox" id="toggle-nav" aria-label="open/close navigation">
  <label for="toggle-nav" class="nav-button"></label>

    <div class="nav-inner">
        


            <ul class="container_menu"> <!-- liste non ordonnée -->
        
                    <li>
                    <a href="./index.php" >Accueil</a>
                    </li>
                    
                    <li>
                    <a href="./equipes-presentation.php">Les équipes</a>
                        <ul>
                            <li>
                            <a href="equipes-inscrire-modifier.php">Inscrire / Modifier</a>
                            </li>
                            <li>
                            <a href="equipes-gerer-conges.php">Gerer les congés</a>
                            </li>
                        </ul>        
                    </li>

                    
                    <li>
                    <a href="./mes-conges.php">Mes congés</a>
                        <ul>
                            <li>
                            <a href="mes-conges-consulter.php">Consulter</a>
                            </li>
                            <li>
                            <a href="mes-conges-poser.php">Poser</a>
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

<?php require_once "./includes/fonctions_utiles.php" ;
 // affiche_variables_session();?>

</div>


