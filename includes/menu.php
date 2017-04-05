<!-- ici se trouve le menu, que l'on retrouve sur chaque page du site-->
<div id = posMenu> <!-- permet de mettre en boite flex le menu -->

<nav id = "navigation" role="navigation" >  

    <input type="checkbox" id="toggle-nav" aria-label="open/close navigation">
  <label for="toggle-nav" class="nav-button"></label>
MENU
  <div class="nav-inner">
    
      <ul> <!-- liste non ordonnée -->

            <li>
            <a href="./index.php">Accueil</a>
            </li>
            
            <li>
            <a href="./inscrire-equipe.php">Les équipes de travail</a>
                <ul>
                    <li>
                    <a href="">inscrire / modifier</a>
                    </li>
                    <li>
                    <a href="">gerer les congés</a>
                    </li>
                </ul>        
            </li>
            
            <li>
            <a href="./cusulter.php">Mes congés</a>
                <ul>
                    <li>
                    <a href="">consulter</a>
                    </li>
                    <li>
                    <a href="">poser</a>
                    </li>

                </ul>
            </li>
            
            <li>
            <a href="./formulaire-contact.php">Contact</a>
            </li>
            
        </ul>

    
  </div>

</nav>

</div>
