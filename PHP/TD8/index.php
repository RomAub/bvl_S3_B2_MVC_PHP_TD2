<?php
session_start();

$delai = 10 * 60;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $delai)) {
    unset($_SESSION['panier']);
    unset($_SESSION['prix_panier']);
}
$_SESSION['LAST_ACTIVITY'] = time();

// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
$DS = DIRECTORY_SEPARATOR;
// __DIR__ est une constante "magique" de PHP qui contient le chemin du dossier courant
require_once __DIR__ . $DS . "lib" . $DS . "File.php";
require_once File::build_path(array("lib", "Session.php"));

require File::build_path(array("controller", "routeur.php"));
?>
