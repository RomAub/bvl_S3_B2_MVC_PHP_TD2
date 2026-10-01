<?php
require_once File::build_path(array("model", "ModelTrajet.php"));

class ControllerPanier {

    protected static $object = 'panier';

    public static function readAll() {
        self::calculerPrix();
        self::afficher();
    }

    public static function add() {
        $id = $_GET['id'];
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
        if (ModelTrajet::select($id) !== false) {
            if (isset($_SESSION['panier'][$id])) {
                $_SESSION['panier'][$id]++;
            } else {
                $_SESSION['panier'][$id] = 1;
            }
        }
        self::calculerPrix();
        self::afficher();
    }

    public static function vider() {
        unset($_SESSION['panier']);
        unset($_SESSION['prix_panier']);
        self::afficher();
    }

    private static function calculerPrix() {
        $prix = 0;
        if (isset($_SESSION['panier'])) {
            foreach ($_SESSION['panier'] as $id => $nb) {
                $t = ModelTrajet::select($id);
                if ($t !== false) {
                    $prix = $prix + $t->getPrix() * $nb;
                }
            }
        }
        $_SESSION['prix_panier'] = $prix;
    }

    private static function afficher() {
        $tab_panier = array();
        if (isset($_SESSION['panier'])) {
            foreach ($_SESSION['panier'] as $id => $nb) {
                $t = ModelTrajet::select($id);
                if ($t !== false) {
                    $tab_panier[] = array("trajet" => $t, "nb" => $nb);
                }
            }
        }
        $view = 'list';
        $pagetitle = 'Mon panier';
        require File::build_path(array("view", "view.php"));
    }
}
?>
