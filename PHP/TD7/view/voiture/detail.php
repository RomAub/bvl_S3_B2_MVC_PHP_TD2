<?php
$vImmatriculation = htmlspecialchars($v->getImmatriculation());
$vMarque = htmlspecialchars($v->getMarque());
$vCouleur = htmlspecialchars($v->getCouleur());
$vImmatriculationURL = rawurlencode($v->getImmatriculation());

echo "<p>Voiture " . $vImmatriculation . " de la marque " . $vMarque . " (couleur " . $vCouleur . ")</p>";
?>
<p><a href="index.php?action=update&immat=<?php echo $vImmatriculationURL; ?>">Modifier cette voiture</a></p>
<p><a href="index.php?action=delete&immat=<?php echo $vImmatriculationURL; ?>">Supprimer cette voiture</a></p>
<a href="index.php?action=readAll">Retour à la liste</a>
