       
    
    <?php 

            if (isset($_COOKIE['bienvenue'])) {
              // n'affiche rien si le cookie est sur l'ordi client
              $timestamp_date_connection=$_COOKIE['bienvenue'];
              $date_connection= date('j/m/Y à G:i:s',$timestamp_date_connection);

              ?><p>dernier rafraississement de la page le <?php echo $date_connection ;?></p><?php
              }else 
              {// sinon affiche bienvenue ?> 
              <p id="cookie_bienvenue"><?php echo "Bienvenue sur le site !"; ?></p><?php
              }

  		
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
