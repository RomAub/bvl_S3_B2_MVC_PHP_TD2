<?php
require_once 'Model.php';
require_once 'Voiture.php';

$voiture = Voiture::getVoitureByImmat('AA-000-AA');

echo "<h1>Recherche de voiture</h1>";

$nouvelleVoiture = new Voiture("Peugeot", "Rouge", "XX-999-YY");
$nouvelleVoiture->save();

if ($voiture === false) {
    echo "<p>Aucune voiture trouvée avec cette immatriculation.</p>";
} else {
    $voiture->afficher();
}
?>