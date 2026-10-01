<?php
require_once "../lib/File.php";
require_once File::build_path(array("model", "ModelVoiture.php"));
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lire la session</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION['login'])) {
            echo "<p>Login : " . htmlspecialchars($_SESSION['login']) . "</p>";
            echo "<p>Age : " . $_SESSION['age'] . "</p>";
            echo "<p>Notes : " . implode(" / ", $_SESSION['notes']) . "</p>";
            echo "<p>Voiture : " . htmlspecialchars($_SESSION['voiture']->getImmatriculation()) . "</p>";
        } else {
            echo "<p>La variable login n'existe pas en session.</p>";
        }
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        ?>
        <a href="session3_supprimer.php">Supprimer la variable login</a> |
        <a href="session4_detruire.php">Détruire la session</a>
    </body>
</html>
