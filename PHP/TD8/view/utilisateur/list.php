<h1>Liste des utilisateurs :</h1>
<?php
foreach ($tab_u as $u) {
    $uLogin = htmlspecialchars($u->getLogin());
    $uLoginURL = rawurlencode($u->getLogin());
    echo '<p> Utilisateur <a href="index.php?controller=utilisateur&action=read&login=' . $uLoginURL . '">' . $uLogin . '</a>';
    if (Session::is_user($u->getLogin()) || Session::is_admin()) {
        echo ' <a href="index.php?controller=utilisateur&action=delete&login=' . $uLoginURL . '">(supprimer)</a>';
    }
    echo '</p>';
}
?>
<p><a href="index.php?controller=utilisateur&action=create">Ajouter un utilisateur</a></p>
