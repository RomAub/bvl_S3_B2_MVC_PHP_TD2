<?php
require_once File::build_path(array("model", "ModelUtilisateur.php")); // chargement du modèle
require_once File::build_path(array("model", "ModelTrajet.php"));

class ControllerUtilisateur {

    protected static $object = 'utilisateur';

    public static function readAll() {
        $tab_u = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        $view = 'list';
        $pagetitle = 'Liste des utilisateurs';
        require File::build_path(array("view", "view.php"));
    }

    public static function read() {
        $login = $_GET['login'];
        $u = ModelUtilisateur::select($login);
        if ($u === false) {
            self::error();
        } else {
            $tab_t = ModelUtilisateur::findTrajets($u->getLogin());
            $view = 'detail';
            $pagetitle = 'Détail de l\'utilisateur';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function create() {
        $login = "";
        $nom = "";
        $prenom = "";
        $etat_login = "required";
        $action_form = "created";
        $view = 'update';
        $pagetitle = 'Créer un utilisateur';
        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        $data = array(
            "login" => $_GET['login'],
            "nom" => $_GET['nom'],
            "prenom" => $_GET['prenom'],
        );
        if (ModelUtilisateur::save($data) === false) {
            self::error();
        } else {
            $tab_u = ModelUtilisateur::selectAll();
            $view = 'created';
            $pagetitle = 'Utilisateur créé';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function delete() {
        $login = $_GET['login'];
        ModelUtilisateur::delete($login);
        $tab_u = ModelUtilisateur::selectAll();
        $view = 'deleted';
        $pagetitle = 'Utilisateur supprimé';
        require File::build_path(array("view", "view.php"));
    }

    public static function update() {
        $u = ModelUtilisateur::select($_GET['login']);
        if ($u === false) {
            self::error();
        } else {
            $login = $u->getLogin();
            $nom = $u->getNom();
            $prenom = $u->getPrenom();
            $etat_login = "readonly";
            $action_form = "updated";
            $view = 'update';
            $pagetitle = 'Modifier un utilisateur';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function updated() {
        $data = array(
            "login" => $_GET['login'],
            "nom" => $_GET['nom'],
            "prenom" => $_GET['prenom'],
        );
        ModelUtilisateur::update($data);

        $login = $_GET['login'];
        $tab_u = ModelUtilisateur::selectAll();
        $view = 'updated';
        $pagetitle = 'Utilisateur modifié';
        require File::build_path(array("view", "view.php"));
    }

    public static function error() {
        $view = 'error';
        $pagetitle = 'Erreur';
        require File::build_path(array("view", "view.php"));
    }
}
?>
