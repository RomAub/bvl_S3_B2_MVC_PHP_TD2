<h1>Mon panier :</h1>
<?php
if (empty($tab_panier)) {
    echo "<p>Votre panier est vide.</p>";
} else {
    foreach ($tab_panier as $ligne) {
        $t = $ligne["trajet"];
        echo '<p>Trajet n°' . htmlspecialchars($t->getId()) . ' : ' . htmlspecialchars($t->getDepart()) . ' → '
            . htmlspecialchars($t->getArrivee()) . ' | ' . $ligne["nb"] . ' place(s) x ' . htmlspecialchars($t->getPrix()) . ' €</p>';
    }
    echo '<p><b>Total : ' . $_SESSION['prix_panier'] . ' €</b></p>';
    echo '<p><a href="index.php?controller=panier&action=vider">Vider le panier</a></p>';
}
?>
<a href="index.php?controller=trajet&action=readAll">Voir les trajets</a>
