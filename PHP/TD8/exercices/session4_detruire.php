<?php
session_start();
session_unset();     // unset $_SESSION variable for the run-time
session_destroy();   // destroy session data in storage
setcookie(session_name(), '', time() - 1); // deletes the session cookie containing the session ID
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Détruire la session</title>
    </head>
    <body>
        <p>La session a été complètement supprimée.</p>
        <a href="session2_lire.php">Relire la session</a>
    </body>
</html>
