<?php
class Trajet {
    private $id;
    private $depart;
    private $arrivee;
    private $date;
    private $nbplaces;
    private $prix;
    private $conducteur_login;

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

		public static function getAllTrajets() {
			$sql = "SELECT * FROM trajet";
			$rep = Model::$pdo->query($sql);
			$rep->setFetchMode(PDO::FETCH_CLASS, 'Trajet');
			return $rep->fetchAll();
		}
		
			public static function findPassagers($id) {
			$sql = "SELECT utilisateur.* FROM utilisateur 
					INNER JOIN passager ON utilisateur.login = passager.utilisateur_login 
					WHERE passager.trajet_id = :id";
			
			$req_prep = Model::$pdo->prepare($sql);
			$req_prep->execute(array("id" => $id));
			
			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
			return $req_prep->fetchAll();
		}
		
		public function afficher() {
			echo "<p>Trajet n°" . htmlspecialchars($this->id) . " : de " . htmlspecialchars($this->depart) . " à " . htmlspecialchars($this->arrivee) . "</p>";
		}
		
		public static function deletePassager($data) {
			$sql = "DELETE FROM passager WHERE trajet_id = :trajet_id AND utilisateur_login = :utilisateur_login";
			$req_prep = Model::$pdo->prepare($sql);
			
			$req_prep->execute(array(
				"trajet_id" => $data['trajet_id'],
				"utilisateur_login" => $data['utilisateur_login']
			));
		}
	}

?>


