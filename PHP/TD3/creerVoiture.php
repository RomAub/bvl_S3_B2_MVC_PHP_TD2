<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> testVoiture </title>
    </head>
    <body>
	<?php
	if (isset($_POST['marque']) && isset($_POST['couleur']) && isset($_POST['immatriculation'])) {
		
    $marque = $_POST['marque'];
    $couleur = $_POST['couleur'];
    $immatriculation = $_POST['immatriculation'];
	
	echo "<li>" . htmlspecialchars($marque) . "</li>";
	echo "<li>" . htmlspecialchars($couleur) . "</li>";
	echo "<li>" . htmlspecialchars($immatriculation) . "</li>";
	require_once('Voiture.php');
	
		// New
	require_once('Model.php');
	try {
		$voiture = new Voiture($marque, $couleur, $immatriculation);
		$voiture->save();
	} catch (PDOException $e) {
		echo "Erreur : " . $e->getMessage();
	}
			
}
        ?>
    </body>
</html> 

