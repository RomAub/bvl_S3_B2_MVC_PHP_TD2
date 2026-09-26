<?php
$vImmatriculation = htmlspecialchars($v->getImmatriculation());
$vMarque = htmlspecialchars($v->getMarque());
$vCouleur = htmlspecialchars($v->getCouleur());

echo "<p>Voiture " . $vImmatriculation . " de la marque " . $vMarque . " (couleur " . $vCouleur . ")</p>";
?>
<a href="index.php?action=readAll">Retour à la liste</a>
