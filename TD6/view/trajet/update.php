<?php
$tId = htmlspecialchars($id);
$tDepart = htmlspecialchars($depart);
$tArrivee = htmlspecialchars($arrivee);
$tDate = htmlspecialchars($date);
$tPlaces = htmlspecialchars($nbplaces);
$tPrix = htmlspecialchars($prix);
?>
<form method="get" action="index.php">
  <fieldset>
	<legend>Mon formulaire :</legend>
	<input type="hidden" name="action" value="<?php echo $action_form; ?>" />
	<input type="hidden" name="controller" value="<?php echo static::$object; ?>" />
<?php if ($action_form == "updated") { ?>
	<p>
	  <label for="id_id">Numéro</label> :
	  <input type="text" name="id" id="id_id" value="<?php echo $tId; ?>" readonly/>
	</p>
<?php } ?>
	<p>
	  <label for="depart_id">Départ</label> :
	  <input type="text" placeholder="Ex : Gap" name="depart" id="depart_id" value="<?php echo $tDepart; ?>" required autofocus/>
	</p>
	<p>
	  <label for="arrivee_id">Arrivée</label> :
	  <input type="text" placeholder="Ex : Marseille" name="arrivee" id="arrivee_id" value="<?php echo $tArrivee; ?>" required/>
	</p>
	<p>
	  <label for="date_id">Date</label> :
	  <input type="date" name="date" id="date_id" value="<?php echo $tDate; ?>" required/>
	</p>
	<p>
	  <label for="nbplaces_id">Nombre de places</label> :
	  <input type="number" min="1" name="nbplaces" id="nbplaces_id" value="<?php echo $tPlaces; ?>" required/>
	</p>
	<p>
	  <label for="prix_id">Prix</label> :
	  <input type="number" min="0" name="prix" id="prix_id" value="<?php echo $tPrix; ?>" required/> €
	</p>
	<p>
	  <label for="conducteur_id">Conducteur</label> :
	  <select name="conducteur_login" id="conducteur_id">
<?php
foreach ($tab_u as $u) {
    $selected = ($u->getLogin() == $conducteur_login) ? " selected" : "";
    echo '		<option value="' . htmlspecialchars($u->getLogin()) . '"' . $selected . '>' . htmlspecialchars($u->getLogin()) . '</option>' . "\n";
}
?>
	  </select>
	</p>
	<p>
	  <input type="submit" value="Envoyer" />
	</p>
  </fieldset>
</form>
