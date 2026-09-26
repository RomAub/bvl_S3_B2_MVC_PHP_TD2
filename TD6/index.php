<?php
// DS contient le slash des chemins de fichiers, c'est-à-dire '/' sur Linux et '\' sur Windows
$DS = DIRECTORY_SEPARATOR;
// __DIR__ est une constante "magique" de PHP qui contient le chemin du dossier courant
require_once __DIR__ . $DS . "lib" . $DS . "File.php";

require File::build_path(array("controller", "routeur.php"));
?>
