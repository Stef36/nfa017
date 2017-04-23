<?php  // mise en BD des modifications faites en "inscription_personnel.inc.php"


	echo "<br>DANS VALID<br>";

	echo $_SESSION['id_selection_employe']."<br>";	

	if (isset($_POST['valid_modif_employe'])) {
		$valid_modif_employe=$_POST['valid_modif_employe'];
		echo $_SESSION['id_selection_employe'];
		echo "modif FAITES";
	}

	else echo "-----RAS------<br>";







 ?>