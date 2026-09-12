<?php
require_once 'Model.php';
require_once '../TD1/Voiture.php';

// appel nouvelle methode statiue
$tab_voit = Voiture::getAllVoitures();

// affichage
echo "<h1>Liste des voitures</h1>";

if (empty($tab_voit)) {
    echo "<p>Aucune voiture trouvée.</p>";
} else {
    foreach ($tab_voit as $voit) {
        $voit->afficher();
    }
}
?>
