<?php
$tab = array("nom" => "Aubrée", "prenom" => "Romain", "ville" => "Gap");
setcookie("TabCookie", serialize($tab), time() + 3600);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tableau dans un cookie</title>
    </head>
    <body>
        <p>Le tableau a été stocké dans le cookie TabCookie.</p>
        <?php
        if (isset($_COOKIE["TabCookie"])) {
            $tab_lu = unserialize($_COOKIE["TabCookie"]);
            echo "<p>Contenu du cookie :</p>";
            echo "<pre>";
            print_r($tab_lu);
            echo "</pre>";
        }
        ?>
    </body>
</html>
