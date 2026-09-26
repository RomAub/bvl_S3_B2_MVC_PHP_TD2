<?php
require_once File::build_path(array("model", "ModelVoiture.php")); // chargement du modèle

class ControllerVoiture {

    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        $controller = 'voiture';
        $view = 'list';
        $pagetitle = 'Liste des voitures';
        require File::build_path(array("view", "view.php"));
    }

    public static function read() {
        $immat = $_GET['immat'];
        $v = ModelVoiture::getVoitureByImmat($immat);
        $controller = 'voiture';
        if ($v === false) {
            $view = 'error';
            $pagetitle = 'Erreur';
        } else {
            $view = 'detail';
            $pagetitle = 'Détail de la voiture';
        }
        require File::build_path(array("view", "view.php"));
    }

    public static function create() {
        $controller = 'voiture';
        $view = 'create';
        $pagetitle = 'Créer une voiture';
        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $marque = $_GET['marque'];
        $couleur = $_GET['couleur'];
        $immatriculation = $_GET['immatriculation'];

        $v = new ModelVoiture($marque, $couleur, $immatriculation);
        $v->save();

        $tab_v = ModelVoiture::getAllVoitures();
        $controller = 'voiture';
        $view = 'created';
        $pagetitle = 'Voiture créée';
        require File::build_path(array("view", "view.php"));
    }
}
?>
