<?php

/* fonction d'affichage suivant le type MIME  */

	function afficher_suivant_mime($fichier, $credit, $id, $class, $alt) {

		$typeMime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $fichier) ;

	if ( $typeMime == 'image/jpeg' OR $typeMime =='image/png'OR $typeMime =='image/gif') 

		{?>
		<p>
		<img id = "<?php echo $id; ?>" class= "<?php echo $class;?>" src="<?php echo $fichier ;?>" alt="<?php echo $alt; ?> www.mesrepos.domduf.com"/>
		</p>

		<p><?php echo $typeMime ; ?></p>
			<?php 
			if ($credit){ ?>
			<p>logo &copy <?php echo $credit ;?></p>
			<?php }?>
		<?php 
		}
	
	elseif ( $typeMime == 'video/webm' OR $typeMime == 'video/mp4' OR $typeMime == 'video/3gpp') /*'video/x-flv'*/
		
		{?>
		<video src="<?php echo $fichier ; ?>" controls poster="./images/Video-Icon-crop-1.png" preload="none" alt ="<?php echo $alt ; ?> www.soullatitude.com" >  <?php echo $alt ; ?> www.soullatitude.com </video>
		<p>vidéo de type: <?php echo $typeMime ; ?></p>

			<?php 
			if ($credit){ ?>
			<p>Vidéo &copy <?php echo $credit ;?></p>
			<?php }?>

		<?php 
		}

	}
		
?>