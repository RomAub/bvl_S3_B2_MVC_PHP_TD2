<?php
require_once File::build_path(array("model", "ModelUtilisateur.php")); // chargement du modèle
require_once File::build_path(array("model", "ModelTrajet.php"));
require_once File::build_path(array("lib", "Security.php"));

class ControllerUtilisateur {

    protected static $object = 'utilisateur';

    public static function readAll() {
        $tab_u = ModelUtilisateur::selectAll();     //appel au modèle pour gerer la BD
        $view = 'list';
        $pagetitle = 'Liste des utilisateurs';
        require File::build_path(array("view", "view.php"));
    }

    public static function read() {
        $login = myGet('login');
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
        $email = "";
        $admin_checked = "";
        $etat_login = "required";
        $action_form = "created";
        $view = 'update';
        $pagetitle = 'Créer un utilisateur';
        require File::build_path(array("view", "view.php"));
    }

    public static function created() {
        if (myGet('mdp') != myGet('mdp2')) {
            self::error("les deux mots de passe ne correspondent pas.");
        } else if (!filter_var(myGet('email'), FILTER_VALIDATE_EMAIL)) {
            self::error("l'adresse email n'est pas valide.");
        } else {
            $nonce = Security::generateRandomHex();
            $data = array(
                "login" => myGet('login'),
                "nom" => myGet('nom'),
                "prenom" => myGet('prenom'),
                "email" => myGet('email'),
                "mdp" => Security::chiffrer(myGet('mdp')),
                "nonce" => $nonce,
            );
            if (ModelUtilisateur::save($data) === false) {
                self::error("ce login est déjà utilisé.");
            } else {
                self::envoyerMail(myGet('login'), myGet('email'), $nonce);
                $tab_u = ModelUtilisateur::selectAll();
                $view = 'created';
                $pagetitle = 'Utilisateur créé';
                require File::build_path(array("view", "view.php"));
            }
        }
    }

    public static function delete() {
        $login = myGet('login');
        if (!Session::is_user($login) && !Session::is_admin()) {
            self::connect("vous devez être connecté avec ce compte pour le supprimer.");
        } else {
            ModelUtilisateur::delete($login);
            $tab_u = ModelUtilisateur::selectAll();
            $view = 'deleted';
            $pagetitle = 'Utilisateur supprimé';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function update() {
        $login = myGet('login');
        if (!Session::is_user($login) && !Session::is_admin()) {
            self::connect("vous devez être connecté avec ce compte pour le modifier.");
        } else {
            $u = ModelUtilisateur::select($login);
            if ($u === false) {
                self::error();
            } else {
                $login = $u->getLogin();
                $nom = $u->getNom();
                $prenom = $u->getPrenom();
                $email = $u->getEmail();
                $admin_checked = ($u->getAdmin() == 1) ? "checked" : "";
                $etat_login = "readonly";
                $action_form = "updated";
                $view = 'update';
                $pagetitle = 'Modifier un utilisateur';
                require File::build_path(array("view", "view.php"));
            }
        }
    }

    public static function updated() {
        $login = myGet('login');
        if (!Session::is_user($login) && !Session::is_admin()) {
            self::connect("vous devez être connecté avec ce compte pour le modifier.");
        } else {
            if (myGet('mdp') != myGet('mdp2')) {
                self::error("les deux mots de passe ne correspondent pas.");
            } else if (!filter_var(myGet('email'), FILTER_VALIDATE_EMAIL)) {
                self::error("l'adresse email n'est pas valide.");
            } else {
                $data = array(
                    "login" => myGet('login'),
                    "nom" => myGet('nom'),
                    "prenom" => myGet('prenom'),
                    "email" => myGet('email'),
                    "mdp" => Security::chiffrer(myGet('mdp')),
                );
                if (Session::is_admin()) {
                    $data["admin"] = is_null(myGet('admin')) ? 0 : 1;
                }
                ModelUtilisateur::update($data);

                $tab_u = ModelUtilisateur::selectAll();
                $view = 'updated';
                $pagetitle = 'Utilisateur modifié';
                require File::build_path(array("view", "view.php"));
            }
        }
    }

    public static function connect($erreur = NULL) {
        $view = 'connect';
        $pagetitle = 'Connexion';
        require File::build_path(array("view", "view.php"));
    }

    public static function connected() {
        $login = myGet('login');
        $mdp_chiffre = Security::chiffrer(myGet('mdp'));
        if (!ModelUtilisateur::checkPassword($login, $mdp_chiffre)) {
            self::connect("login ou mot de passe incorrect.");
        } else {
            $u = ModelUtilisateur::select($login);
            if (!is_null($u->getNonce())) {
                self::connect("vous devez d'abord valider votre adresse email.");
            } else {
                $_SESSION['login'] = $login;
                $_SESSION['admin'] = ($u->getAdmin() == 1);
                $tab_t = ModelUtilisateur::findTrajets($login);
                $view = 'detail';
                $pagetitle = 'Détail de l\'utilisateur';
                require File::build_path(array("view", "view.php"));
            }
        }
    }

    public static function deconnect() {
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time() - 1);
        header('Location: index.php');
        exit();
    }

    public static function validate() {
        $login = myGet('login');
        $nonce = myGet('nonce');
        $u = ModelUtilisateur::select($login);
        if ($u !== false && !is_null($u->getNonce()) && $u->getNonce() == $nonce) {
            ModelUtilisateur::update(array("login" => $login, "nonce" => NULL));
            $view = 'validated';
            $pagetitle = 'Email validé';
            require File::build_path(array("view", "view.php"));
        } else {
            self::error("le lien de validation n'est pas valide.");
        }
    }

    private static function envoyerMail($login, $email, $nonce) {
        $lien = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF'])
              . "/index.php?controller=utilisateur&action=validate&login=" . rawurlencode($login) . "&nonce=" . $nonce;

        $mail = "<html><body>"
              . "<p>Bonjour " . htmlspecialchars($login) . ",</p>"
              . "<p>Merci pour votre inscription sur le site de covoiturage.</p>"
              . "<p>Pour valider votre adresse email, cliquez sur ce lien :<br>"
              . "<a href=\"" . $lien . "\">" . $lien . "</a></p>"
              . "</body></html>";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: covoiturage@localhost\r\n";
        mail($email, "Validation de votre inscription", $mail, $headers);
    }

    public static function error($message = "aucun utilisateur ne correspond à ce login.") {
        $view = 'error';
        $pagetitle = 'Erreur';
        require File::build_path(array("view", "view.php"));
    }
}
?>
