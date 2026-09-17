<?php
require_once 'Model.php';
require_once 'Trajet.php';

if (isset($_POST['trajet_id']) && isset($_POST['utilisateur_login'])) {
    
    $data = array(
        'trajet_id' => $_POST['trajet_id'],
        'utilisateur_login' => $_POST['utilisateur_login']
    );

    Trajet::deletePassager($data);

    echo "<p>L'utilisateur " . htmlspecialchars($data['utilisateur_login']) . " a été désinscrit du trajet n°" . htmlspecialchars($data['trajet_id']) . " avec succès.</p>";
    
} else {
    echo "<p>Erreur : Veuillez renseigner le formulaire de désinscription.</p>";
}
?>