	
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
		}
	?>


