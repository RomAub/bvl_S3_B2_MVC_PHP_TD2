<?php
require_once File::build_path(array("model", "ModelVoiture.php")); // chargement du modèle

class ControllerVoiture {

    protected static $object = 'voiture';

    public static function readAll() {
        $tab_v = ModelVoiture::selectAll();     //appel au modèle pour gerer la BD
        $view = 'list';
        $pagetitle = 'Liste des voitures';
        require File::build_path(array("view", "view.php"));
    }

    public static function read() {
        $immat = myGet('immat');
        $v = ModelVoiture::select($immat);
        if ($v === false) {
            self::error();
        } else {
            $view = 'detail';
            $pagetitle = 'Détail de la voiture';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create() {
        $immat = "";
        $marque = "";
        $couleur = "";
        $etat_immat = "required";
        $action_form = "created";
        $view = 'update';
        $pagetitle = 'Créer une voiture';
        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $data = array(
            "immatriculation" => myGet('immatriculation'),
            "marque" => myGet('marque'),
            "couleur" => myGet('couleur'),
        );
        if (ModelVoiture::save($data) === false) {
            self::error();
        } else {
            $tab_v = ModelVoiture::selectAll();
            $view = 'created';
            $pagetitle = 'Voiture créée';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function delete() {
        $immat = myGet('immat');
        ModelVoiture::delete($immat);
        $tab_v = ModelVoiture::selectAll();
        $view = 'deleted';
        $pagetitle = 'Voiture supprimée';
        require File::build_path(array("view", "view.php"));
    }

    public static function update() {
        $v = ModelVoiture::select(myGet('immat'));
        if ($v === false) {
            self::error();
        } else {
            $immat = $v->getImmatriculation();
            $marque = $v->getMarque();
            $couleur = $v->getCouleur();
            $etat_immat = "readonly";
            $action_form = "updated";
            $view = 'update';
            $pagetitle = 'Modifier une voiture';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function updated() {
        $data = array(
            "immatriculation" => myGet('immatriculation'),
            "marque" => myGet('marque'),
            "couleur" => myGet('couleur'),
        );
        ModelVoiture::update($data);

        $immat = myGet('immatriculation');
        $tab_v = ModelVoiture::selectAll();
        $view = 'updated';
        $pagetitle = 'Voiture modifiée';
        require File::build_path(array("view", "view.php"));
    }

    public static function error() {
        $view = 'error';
        $pagetitle = 'Erreur';
        require File::build_path(array("view", "view.php"));
    }
}
?>
