<?php
$uLogin = htmlspecialchars($u->getLogin());
$uNom = htmlspecialchars($u->getNom());
$uPrenom = htmlspecialchars($u->getPrenom());
$uLoginURL = rawurlencode($u->getLogin());

echo "<p>Utilisateur " . $uLogin . " : " . $uPrenom . " " . $uNom . "</p>";
?>
<h3>Trajets en tant que passager :</h3>
<?php
if (empty($tab_t)) {
    echo "<p>Aucun trajet.</p>";
}
foreach ($tab_t as $t) {
    echo '<p><a href="index.php?controller=trajet&action=read&id=' . rawurlencode($t->getId()) . '">Trajet n°' . htmlspecialchars($t->getId()) . '</a> : '
        . htmlspecialchars($t->getDepart()) . ' → ' . htmlspecialchars($t->getArrivee()) . '</p>';
}
?>
<p><a href="index.php?controller=utilisateur&action=update&login=<?php echo $uLoginURL; ?>">Modifier cet utilisateur</a></p>
<a href="index.php?controller=utilisateur&action=readAll">Retour à la liste</a>
