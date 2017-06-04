       
    
    <?php 



  		
  		if (!isset ($_SESSION['login'])) { /* si non connecté */?> 

    	<p id="administration_connection">
        <a href="./connection-back-office.php" title="bouton de connection au backoffice">Connection backoffice
       </a>
      </p>
    	<?php }
    	
    	else { /* si connecte */ ?>
    	<p id="administration_deconnection"> <?php echo $_SESSION['login']; ?>
        <a href="./connection-back-office.php" title="bouton de deconnection du backoffice">déconnection backoffice
        </a>
      </p>
    	
    	<?php
    	}
    	?>
