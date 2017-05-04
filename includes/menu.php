<!-- ici se trouve le menu, que l'on retrouve sur chaque page du site-->
<div id = posMenu> <!-- permet de mettre en boite flex le menu -->

<nav id = "navigation" role="navigation" >  

    <input type="checkbox" id="toggle-nav" aria-label="open/close navigation">
  <label for="toggle-nav" class="nav-button"></label>

  <div class="nav-inner">
    


      <ul> <!-- liste non ordonnée -->

            <li>
            <a href="./index.php">Accueil</a>
            </li>
            
            <li>
            <a href="./equipes_presentation.php">Les équipes</a>
                <ul>
                    <li>
                    <a href="equipes_inscrire_modifier.php">inscrire / modifier</a>
                    </li>
                    <li>
                    <a href="equipes_gerer_conges.php">gerer les congés</a>
                    </li>
                </ul>        
            </li>
            
            <li>
            <a href="./mes_conges.php">Mes congés</a>
                <ul>
                    <li>
                    <a href="mes_conges_consulter.php">consulter</a>
                    </li>
                    <li>
                    <a href="mes_conges_poser.php">poser</a>
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
<?php //affiche_variables_session(); ?>

</div>
