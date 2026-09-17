<?php
require_once 'Model.php';
require_once 'Utilisateur.php';
require_once 'Trajet.php';

if (isset($_GET['id_trajet'])) {
    $id = $_GET['id_trajet'];
    $passagers = Trajet::findPassagers($id);

    echo "<h1>Passagers du trajet n°" . htmlspecialchars($id) . "</h1>";

    if (empty($passagers)) {
        echo "<p>Aucun passager inscrit pour ce trajet.</p>";
    } else {
        foreach ($passagers as $passager) {
            $passager->afficher();
        }
    }
} else {
    echo "<p>Veuillez passer par le formulaire pour chercher un trajet.</p>";
}
?>