<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lire un cookie</title>
    </head>
    <body>
        <?php
        if (isset($_COOKIE["TestCookie"])) {
            echo "<p>Valeur du cookie TestCookie : " . htmlspecialchars($_COOKIE["TestCookie"]) . "</p>";
        } else {
            echo "<p>Le cookie TestCookie n'existe pas.</p>";
        }
        ?>
    </body>
</html>
