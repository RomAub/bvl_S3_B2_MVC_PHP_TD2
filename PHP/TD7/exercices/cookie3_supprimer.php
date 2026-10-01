<?php
setcookie("TestCookie", "", time() - 1);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Supprimer un cookie</title>
    </head>
    <body>
        <p>Le cookie TestCookie a été supprimé.</p>
    </body>
</html>
