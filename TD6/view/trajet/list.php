<h1>Liste des trajets :</h1>
<?php
foreach ($tab_t as $t) {
    $tId = htmlspecialchars($t->getId());
    $tIdURL = rawurlencode($t->getId());
    $tDepart = htmlspecialchars($t->getDepart());
    $tArrivee = htmlspecialchars($t->getArrivee());
    echo '<p> <a href="index.php?controller=trajet&action=read&id=' . $tIdURL . '">Trajet n°' . $tId . '</a> : '
        . $tDepart . ' → ' . $tArrivee
        . ' <a href="index.php?controller=trajet&action=delete&id=' . $tIdURL . '">(supprimer)</a></p>';
}
?>
<p><a href="index.php?controller=trajet&action=create">Ajouter un trajet</a></p>
