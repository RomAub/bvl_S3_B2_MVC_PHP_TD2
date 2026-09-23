<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Détail de la voiture</title>
    </head>
    <body>
        <?php
        echo "<p>Voiture " . $v->getImmatriculation() . " de la marque " . $v->getMarque()
            . " (couleur " . $v->getCouleur() . ")</p>";
        ?>
        <a href="routeur.php?action=readAll">Retour à la liste</a>
    </body>
</html>
