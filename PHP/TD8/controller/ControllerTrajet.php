<?php
require_once File::build_path(array("model", "ModelTrajet.php")); // chargement du modèle
require_once File::build_path(array("model", "ModelUtilisateur.php"));

class ControllerTrajet {

    protected static $object = 'trajet';

    public static function readAll() {
        $tab_t = ModelTrajet::selectAll();
        $view = 'list';
        $pagetitle = 'Liste des trajets';
        require File::build_path(array("view", "view.php"));
    }

    public static function read() {
        $t = ModelTrajet::select(myGet('id'));
        if ($t === false) {
            self::error();
        } else {
            $tab_p = ModelTrajet::findPassagers($t->getId());
            $view = 'detail';
            $pagetitle = 'Détail du trajet';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function delete() {
        $id = myGet('id');
        ModelTrajet::delete($id);
        $tab_t = ModelTrajet::selectAll();
        $view = 'deleted';
        $pagetitle = 'Trajet supprimé';
        require File::build_path(array("view", "view.php"));
    }

    public static function create() {
        $id = "";
        $depart = "";
        $arrivee = "";
        $date = "";
        $nbplaces = "";
        $prix = "";
        $conducteur_login = "";
        $tab_u = ModelUtilisateur::selectAll();
        $action_form = "created";
        $view = 'update';
        $pagetitle = 'Créer un trajet';
        require File::build_path(array("view", "view.php"));
    }

    public static function update() {
        $t = ModelTrajet::select(myGet('id'));
        if ($t === false) {
            self::error();
        } else {
            $id = $t->getId();
            $depart = $t->getDepart();
            $arrivee = $t->getArrivee();
            $date = $t->getDate();
            $nbplaces = $t->getNbplaces();
            $prix = $t->getPrix();
            $conducteur_login = $t->getConducteurLogin();
            $tab_u = ModelUtilisateur::selectAll();
            $action_form = "updated";
            $view = 'update';
            $pagetitle = 'Modifier un trajet';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function created() {
        $data = array(
            "depart" => myGet('depart'),
            "arrivee" => myGet('arrivee'),
            "date" => myGet('date'),
            "nbplaces" => myGet('nbplaces'),
            "prix" => myGet('prix'),
            "conducteur_login" => myGet('conducteur_login'),
        );
        if (ModelTrajet::save($data) === false) {
            self::error();
        } else {
            $tab_t = ModelTrajet::selectAll();
            $view = 'created';
            $pagetitle = 'Trajet créé';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function updated() {
        $data = array(
            "id" => myGet('id'),
            "depart" => myGet('depart'),
            "arrivee" => myGet('arrivee'),
            "date" => myGet('date'),
            "nbplaces" => myGet('nbplaces'),
            "prix" => myGet('prix'),
            "conducteur_login" => myGet('conducteur_login'),
        );
        ModelTrajet::update($data);

        $id = myGet('id');
        $tab_t = ModelTrajet::selectAll();
        $view = 'updated';
        $pagetitle = 'Trajet modifié';
        require File::build_path(array("view", "view.php"));
    }

    public static function error() {
        $view = 'error';
        $pagetitle = 'Erreur';
        require File::build_path(array("view", "view.php"));
    }
}
?>
