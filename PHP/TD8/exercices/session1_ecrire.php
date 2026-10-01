<?php
require_once "../lib/File.php";
require_once File::build_path(array("model", "ModelVoiture.php"));
session_start();

$_SESSION['login'] = 'raubree';
$_SESSION['age'] = 19;
$_SESSION['notes'] = array(14, 16.5, 12);
$_SESSION['voiture'] = new ModelVoiture("Peugeot", "Rouge", "AA-000-AA");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ecrire en session</title>
    </head>
    <body>
        <p>Les variables de session ont été écrites.</p>
        <a href="session2_lire.php">Lire la session</a>
    </body>
</html>
