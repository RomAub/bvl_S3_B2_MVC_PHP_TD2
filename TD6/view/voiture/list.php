<h1>Liste des voitures :</h1>
<?php
foreach ($tab_v as $v) {
    $vImmatriculation = htmlspecialchars($v->getImmatriculation());
    $vImmatriculationURL = rawurlencode($v->getImmatriculation());
    echo '<p> Voiture d\'immatriculation <a href="index.php?action=read&immat=' . $vImmatriculationURL . '">' . $vImmatriculation . '</a>.</p>';
}
?>
<p><a href="index.php?action=create">Ajouter une voiture</a></p>
