<?php
require_once File::build_path(array("model", "Model.php"));

class ModelUtilisateur extends Model {

    protected static $object = 'utilisateur';
    protected static $primary = 'login';

    private $login;
    private $nom;
    private $prenom;

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
}
?>
