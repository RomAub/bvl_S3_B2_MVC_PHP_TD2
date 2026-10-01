<?php
if (isset($_GET['preference'])) {
    $preference = $_GET['preference'];
    setcookie("preference", $preference, time() + 30*24*3600);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Personnalisation</title>
    </head>
    <body>
        <?php
        if (isset($preference)) {
            echo "<p>Votre page d'accueil sera maintenant : " . htmlspecialchars($preference) . "</p>";
        } else {
            echo "<p>Aucune préférence choisie.</p>";
        }
        ?>
        <a href="index.php">Retour au site</a>
    </body>
</html>
