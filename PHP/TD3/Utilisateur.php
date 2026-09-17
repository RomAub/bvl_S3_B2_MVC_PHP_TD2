<?php
class Utilisateur {
    private $login;
    private $nom;
    private $prenom;

    public function __construct($l = NULL, $n = NULL, $p = NULL) {
        if (!is_null($l) && !is_null($n) && !is_null($p)) {
            $this->login = $l;
            $this->nom = $n;
            $this->prenom = $p;
        }
    }

    public static function getAllUtilisateurs() {
        $sql = "SELECT * FROM utilisateur";
        $rep = Model::$pdo->query($sql);
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        return $rep->fetchAll();
    }

    public function afficher() {
        echo "<p>Passager : " . htmlspecialchars($this->prenom . " " . $this->nom) . " (" . htmlspecialchars($this->login) . ")</p>";
    }
	
	public static function findTrajets($login) {
    $sql = "SELECT trajet.* FROM trajet 
            INNER JOIN passager ON trajet.id = passager.trajet_id 
            WHERE passager.utilisateur_login = :login";
    
    $req_prep = Model::$pdo->prepare($sql);
    $req_prep->execute(array("login" => $login));
    
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
    return $req_prep->fetchAll();
}
}
?>