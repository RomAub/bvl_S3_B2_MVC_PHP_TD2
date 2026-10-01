<?php
require_once File::build_path(array("model", "Model.php"));

class ModelUtilisateur extends Model {

    protected static $object = 'utilisateur';
    protected static $primary = 'login';

    private $login;
    private $nom;
    private $prenom;
    private $mdp;
    private $admin;
    private $email;
    private $nonce;

    public function getLogin() {
        return $this->login;
    }
    public function setLogin($login2) {
        $this->login = $login2;
    }

    public function getNom() {
        return $this->nom;
    }
    public function setNom($nom2) {
        $this->nom = $nom2;
    }

    public function getPrenom() {
        return $this->prenom;
    }
    public function setPrenom($prenom2) {
        $this->prenom = $prenom2;
    }

    public function getAdmin() {
        return $this->admin;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getNonce() {
        return $this->nonce;
    }

    public function __construct($l = NULL, $n = NULL, $p = NULL) {
        if (!is_null($l) && !is_null($n) && !is_null($p)) {
            $this->login = $l;
            $this->nom = $n;
            $this->prenom = $p;
        }
    }

    public static function findTrajets($login) {
        $sql = "SELECT trajet.* FROM trajet
                INNER JOIN passager ON trajet.id = passager.trajet_id
                WHERE passager.utilisateur_login = :login";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute(array("login" => $login));
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelTrajet');
        return $req_prep->fetchAll();
    }

    public static function checkPassword($login, $mot_de_passe_chiffre) {
        $sql = "SELECT * FROM utilisateur WHERE login=:login AND mdp=:mdp";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "login" => $login,
            "mdp" => $mot_de_passe_chiffre,
        );
        $req_prep->execute($values);
        $tab = $req_prep->fetchAll();
        return (count($tab) == 1);
    }
}
?>
