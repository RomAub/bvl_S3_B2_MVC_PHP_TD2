<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
        <nav>
            <a href="index.php?action=readAll">Voitures</a> |
            <a href="index.php?action=readAll&controller=utilisateur">Utilisateurs</a> |
            <a href="index.php?action=readAll&controller=trajet">Trajets</a> |
            <a href="index.php?controller=panier">Panier<?php
            if (!empty($_SESSION['panier'])) {
                echo " (" . $_SESSION['prix_panier'] . " €)";
            }
            ?></a> |
            <a href="preference.html">Préférences</a>
        </nav>
<?php
$filepath = File::build_path(array("view", static::$object, "$view.php"));
require $filepath;
?>
        <p style="border: 1px solid black;text-align:right;padding-right:1em;">
            Site de covoiturage de Romain Aubrée
        </p>
    </body>
</html>
