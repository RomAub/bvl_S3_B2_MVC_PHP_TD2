<?php
session_start();
unset($_SESSION['login']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Supprimer une variable</title>
    </head>
    <body>
        <p>La variable login a été supprimée de la session.</p>
        <a href="session2_lire.php">Relire la session</a>
    </body>
</html>
