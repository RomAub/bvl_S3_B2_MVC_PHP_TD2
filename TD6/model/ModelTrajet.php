<?php
require_once File::build_path(array("model", "Model.php"));

class ModelTrajet extends Model {

    protected static $object = 'trajet';
    protected static $primary = 'id';

    private $id;
    private $depart;
    private $arrivee;
    private $date;
    private $nbplaces;
    private $prix;
    private $conducteur_login;

    public function getId() {
        return $this->id;
    }
    public function getDepart() {
        return $this->depart;
    }
    public function setDepart($depart2) {
        $this->depart = $depart2;
    }
    public function getArrivee() {
        return $this->arrivee;
    }
    public function setArrivee($arrivee2) {
        $this->arrivee = $arrivee2;
    }
    public function getDate() {
        return $this->date;
    }
    public function setDate($date2) {
        $this->date = $date2;
    }
    public function getNbplaces() {
        return $this->nbplaces;
    }
    public function setNbplaces($nbplaces2) {
        $this->nbplaces = $nbplaces2;
    }
    public function getPrix() {
        return $this->prix;
    }
    public function setPrix($prix2) {
        $this->prix = $prix2;
    }
    public function getConducteurLogin() {
        return $this->conducteur_login;
    }
    public function setConducteurLogin($login2) {
        $this->conducteur_login = $login2;
    }

    public function __construct($id = NULL, $dep = NULL, $arr = NULL, $dat = NULL, $nb = NULL, $pr = NULL, $cond = NULL) {
        if (!is_null($dep)) {
            $this->id = $id;
            $this->depart = $dep;
            $this->arrivee = $arr;
            $this->date = $dat;
            $this->nbplaces = $nb;
            $this->prix = $pr;
            $this->conducteur_login = $cond;
        }
    }

    public static function findPassagers($id) {
        $sql = "SELECT utilisateur.* FROM utilisateur
                INNER JOIN passager ON utilisateur.login = passager.utilisateur_login
                WHERE passager.trajet_id = :id";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute(array("id" => $id));
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        return $req_prep->fetchAll();
    }
}
?>
