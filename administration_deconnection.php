<!DOCTYPE html>
<html lang="fr-fr">


<!-- ======================================================= -->
<head>

<meta charset="UTF-8" lang="fr"/>
<meta name="description"  content="Mes repos deconnection"/>

<link rel="icon" href="soullat2.ico" />

<title>Mesrepos | deconnection </title>
<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>
<!-- ======================================================= -->


<body>


  		<?php  	session_start();
  				$_SESSION = array();
  				session_destroy(); ?>
<!-- ===================== TITRE ===================== -->

<?php require ("./includes/header.inc.php"); titre_header('Déconnection </br>back-office')?>

<!-- ===================== VISUEL ===================== -->

<section id="centre">
<!-- ===================== MENU ===================== -->
	<?php include("includes/menu.php"); ?>

	<span>
  		<H2 >Vous êtes déconnecté.</H2>
  	</span>


</section>

<!-- ===================== BAS DE PAGE  ===================== -->
<?php include("includes/basDePage.php"); ?>
</body>

</html>
