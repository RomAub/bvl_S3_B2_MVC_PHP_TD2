<?php
require_once 'Model.php';
require_once 'Utilisateur.php';
require_once 'Trajet.php';

if (isset($_GET['login'])) {
    $login = $_GET['login'];
    $trajets = Utilisateur::findTrajets($login);

    echo "<h1>Trajets du passager : " . htmlspecialchars($login) . "</h1>";

    if (empty($trajets)) {
        echo "<p>Cet utilisateur n'est inscrit à aucun trajet.</p>";
    } else {
        foreach ($trajets as $trajet) {
            $trajet->afficher();
        }
    }
} else {
    echo "<p>Veuillez passer par le formulaire pour chercher un utilisateur.</p>";
}
?>