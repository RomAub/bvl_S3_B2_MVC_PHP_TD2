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
	}
?>


