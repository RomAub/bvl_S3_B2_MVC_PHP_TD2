<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Voitures </title>
    </head>
   
    <body>
	<?php
		$voitures = array();
		
		echo "<h2>Liste des voitures :</h2>";

        if (empty($voitures)) {
            echo "<p>Il n'y a aucune voiture.</p>";
        } else {
            echo "<ul>";
            
            foreach ($voitures as $voitureCourante) {
                echo "<li>Voiture " . $voitureCourante['immatriculation'] . " de la marque " . 
				$voitureCourante['marque'] . " (couleur " . $voitureCourante['couleur'] . ")</li>";
            }
            echo "</ul>";
        }
        ?>
    </body>
</html> 

