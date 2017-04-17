<?php Session_start()?>
<!DOCTYPE html>
<html lang="fr-fr" >




<!-- ======================================================= -->
<head>

<meta charset="UTF-8" lang="fr"/>
<meta name="description"  content="back-office ">

<link rel="icon" href="soullat2.ico" />

<title>Connection au Back-Office</title>
<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<!-- ======================================================= -->


<body>



<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Connection </br>back-office')?>

<!-- ===================== MENU ===================== -->
<?php include("includes/menu.php"); ?>
<!-- ===================== VISUEL ===================== -->

<section id="">



  		<?php 

  		
  		if (!isset ($_SESSION['login'])) { /* si pas encore connecté */?> 
  		<span>
  		
  		<H2>Administrateur du site, connectez vous:</H2>
  		<form name="formConnect" method="POST" action="./backoffice.php">
  			<table>
  	     		<tr>
        			<th >login</th>
        			<td ><input type="text" size="25" name="user-name" value="toto" id="user-name"/></td>
      			</tr>

      			<tr>
        			<th >mot de passe</th>
        			<td ><input type="password" size="10" name="user-passwd" id="user-passwd" /></td>
      			</tr>	      
      			
      			<tr>
        			<th  >Se connecter</th>
        			<td ><input type="submit" name="soumission" id="soumission" value="Soumettre" /></td>
      			</tr>	
 
  			</table>
  		</form>
  		</span>
  		<?php }
  		
  		else { /* si déjà connecté */ ?>
  		<span id="administration">
      
      
  			<H2 ><?php echo $_SESSION['login'];?>, vous êtes connecté,</br> que voulez vous faire ?</H2>

 
  			<table> 
            <tr>
      				
      				<td><a href="backoffice.php"><img src="./images/boutons/retour.png"></a></td>
      			</tr>
            
            <tr>
      				
      				<td><a href="administration_deconnection.php"><img src="./images/boutons/deconnection.png"></a></td>
      			</tr>
	
  			</table>

  			
  		</span>
  		<?php
  		
  		}
  		 
  		 ?>

	


</section>



</body>

</html>
