<?php
$tId = htmlspecialchars($t->getId());
$tIdURL = rawurlencode($t->getId());
$tDepart = htmlspecialchars($t->getDepart());
$tArrivee = htmlspecialchars($t->getArrivee());
$tDate = htmlspecialchars($t->getDate());
$tPlaces = htmlspecialchars($t->getNbplaces());
$tPrix = htmlspecialchars($t->getPrix());
$tConducteur = htmlspecialchars($t->getConducteurLogin());
$tConducteurURL = rawurlencode($t->getConducteurLogin());
?>
<h2>Trajet n°<?php echo $tId; ?> : <?php echo $tDepart; ?> → <?php echo $tArrivee; ?></h2>
<p>Le <?php echo $tDate; ?>, <?php echo $tPlaces; ?> place(s), <?php echo $tPrix; ?> €</p>
<p>Conducteur : <a href="index.php?controller=utilisateur&action=read&login=<?php echo $tConducteurURL; ?>"><?php echo $tConducteur; ?></a></p>

<h3>Passagers :</h3>
<?php
if (empty($tab_p)) {
    echo "<p>Aucun passager pour l'instant.</p>";
}
foreach ($tab_p as $p) {
    echo '<p>' . htmlspecialchars($p->getPrenom() . ' ' . $p->getNom()) . ' (' . htmlspecialchars($p->getLogin()) . ')</p>';
}
?>
<p><a href="index.php?controller=trajet&action=update&id=<?php echo $tIdURL; ?>">Modifier ce trajet</a></p>
<p><a href="index.php?controller=trajet&action=delete&id=<?php echo $tIdURL; ?>">Supprimer ce trajet</a></p>
<a href="index.php?controller=trajet&action=readAll">Retour à la liste</a>
