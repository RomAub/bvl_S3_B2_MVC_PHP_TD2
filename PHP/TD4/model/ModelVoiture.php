<?php
require_once 'Model.php';

class ModelVoiture {

  private $marque;
  private $couleur;
  private $immatriculation;

  public function getMarque() {
       return $this->marque;
  }

  public function setMarque($marque2) {
       $this->marque = $marque2;
  }


  public function getCouleur() {
       return $this->couleur;
  }
  public function setCouleur($couleur2) {
       $this->couleur = $couleur2;
  }


  public function getImmatriculation() {
       return $this->immatriculation;
  }
  public function setImmatriculation($immatriculation2) {
       if (strlen($immatriculation2) <= 8) {
          $this->immatriculation = $immatriculation2;
      } else {
          echo "Erreur : L'immatriculation saisie est trop longue (8 caractères maximum).";
  }
}

  public function __construct($m = NULL, $c = NULL, $i = NULL) {
		if (!is_null($m) && !is_null($c) && !is_null($i)) {
					$this->marque = $m;
					$this->couleur = $c;
					$this->immatriculation = $i;
				}
			}

  /*
  public function afficher() {
      echo "<p>Voiture " . $this->immatriculation . " de la marque " . $this->marque
	  . " (couleur " . $this->couleur . ")</p>";
  }
  */

public static function getAllVoitures() {
        $sql = "SELECT * FROM voiture";
        $rep = Model::$pdo->query($sql);
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        return $rep->fetchAll();
    }

	public static function getVoitureByImmat($immat) {
		$sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
		// Préparation de la requête
		$req_prep = Model::$pdo->prepare($sql);

		$values = array(
		"nom_tag" => $immat,
		//nomdutag => valeur, ...
		);

		// On donne les valeurs et on exécute la requête
		$req_prep->execute($values);

		// On récupère les résultats comme précédemment
		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
		$tab_voit = $req_prep->fetchAll();
		// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_voit))
			return false;
		return $tab_voit[0];
	}

	public function save() {
      $sql = "INSERT INTO voiture (marque, couleur, immatriculation) VALUES (:marque, :couleur, :immatriculation)";
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
          "marque" => $this->marque,
          "couleur" => $this->couleur,
          "immatriculation" => $this->immatriculation
      );
      $req_prep->execute($values);
  }
}

?>
