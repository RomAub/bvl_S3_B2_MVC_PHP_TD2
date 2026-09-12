<?php
class Voiture {
   
  private $marque;
  private $couleur;
  private $immatriculation;
      
  // un getter      
  public function getMarque() {
       return $this->marque;  
  }
     
  // un setter 
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
  
  // un constructeur
  public function __construct($m = NULL, $c = NULL, $i = NULL) {
		if (!is_null($m) && !is_null($c) && !is_null($i)) {
					$this->marque = $m;
					$this->couleur = $c;
					$this->immatriculation = $i;
				}
			} 
           
  // une methode d'affichage.
  public function afficher() {
      echo "<p>Voiture " . $this->immatriculation . " de la marque " . $this->marque 
	  . " (couleur " . $this->couleur . ")</p>";
  }

public static function getAllVoitures() {
        $sql = "SELECT * FROM voiture";
        // connexion PDO du Model
        $rep = Model::$pdo->query($sql);
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
        return $rep->fetchAll();
    }
}

?>
