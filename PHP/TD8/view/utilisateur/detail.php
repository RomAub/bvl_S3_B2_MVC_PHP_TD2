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
<?php
if (Session::is_user($u->getLogin()) || Session::is_admin()) {
    echo '<p><a href="index.php?controller=utilisateur&action=update&login=' . $uLoginURL . '">Modifier cet utilisateur</a></p>';
    echo '<p><a href="index.php?controller=utilisateur&action=delete&login=' . $uLoginURL . '">Supprimer cet utilisateur</a></p>';
}
?>
<a href="index.php?controller=utilisateur&action=readAll">Retour à la liste</a>
