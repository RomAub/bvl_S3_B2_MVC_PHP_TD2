<?php
$vImmat = htmlspecialchars($immat);
$vMarque = htmlspecialchars($marque);
$vCouleur = htmlspecialchars($couleur);
?>
<form method="get" action="index.php">
  <fieldset>
	<legend>Mon formulaire :</legend>
	<input type="hidden" name="action" value="<?php echo $action_form; ?>" />
	<input type="hidden" name="controller" value="<?php echo static::$object; ?>" />
	<p>
	  <label for="immat_id">Immatriculation</label> :
	  <input type="text" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" value="<?php echo $vImmat; ?>" <?php echo $etat_immat; ?>/>
	</p>
	<p>
	  <label for="marque_id">Marque</label> :
	  <input type="text" placeholder="Ex : Opel" name="marque" id="marque_id" value="<?php echo $vMarque; ?>" required autofocus/>
	</p>
	<p>
	  <label for="couleur_id">Couleur</label> :
	  <input type="text" placeholder="Ex : Rouge" name="couleur" id="couleur_id" value="<?php echo $vCouleur; ?>" required/>
	</p>
	<p>
	  <input type="submit" value="Envoyer" />
	</p>
  </fieldset>
</form>
