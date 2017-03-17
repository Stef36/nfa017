       
    
    <?php 

  		
  		if (!isset ($_SESSION['login'])) { /* si non connecté */?> 
    	<p>
        <a href="./connection_back_office.php">
        <img class="bouton" src="./images/boutons/connection.png" 
        alt="bouton de connection"></a>
      </p>
    	<?php }
    	
    	else { /* si connecte */ ?>
    	<p id="administration"> <?php echo $_SESSION['login']; ?>
        <a href="./connection_back_office.php">
         <img class="bouton" src="./images/boutons/deconnection.png" 
         alt="bouton de déconnection">
        </a>
      </p>
    	
    	<?php
    	}
    	?>
