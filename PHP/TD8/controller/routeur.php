<?php
require_once File::build_path(array("controller", "ControllerVoiture.php"));
require_once File::build_path(array("controller", "ControllerUtilisateur.php"));
require_once File::build_path(array("controller", "ControllerTrajet.php"));
require_once File::build_path(array("controller", "ControllerPanier.php"));

function myGet($nomvar) {
	if (isset($_GET[$nomvar])) {
		return $_GET[$nomvar];
	} else if (isset($_POST[$nomvar])) {
		return $_POST[$nomvar];
	} else {
		return NULL;
	}
}

if (!is_null(myGet('action'))) {
	$action = myGet('action');
} else {
	$action = 'readAll';
}

$controller_default = 'voiture';
if (isset($_COOKIE['preference'])) {
	$controller_default = $_COOKIE['preference'];
}

if (!is_null(myGet('controller'))) {
	$controller = myGet('controller');
} else {
	$controller = $controller_default;
}

$controller_class = 'Controller' . ucfirst($controller);

if (class_exists($controller_class)) {
	if (in_array($action, get_class_methods($controller_class))) {
		$controller_class::$action();
	} else {
		ControllerVoiture::error();
	}
} else {
	ControllerVoiture::error();
}
?>
