<?php
setcookie("TestCookie", "OK", time() + 3600);  /* expire dans 1 heure = 3600 secondes */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ecrire un cookie</title>
    </head>
    <body>
        <p>Le cookie TestCookie a été déposé !</p>
    </body>
</html>
