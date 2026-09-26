<?php
$uLogin = htmlspecialchars($login);
$uNom = htmlspecialchars($nom);
$uPrenom = htmlspecialchars($prenom);
?>
<form method="get" action="index.php">
  <fieldset>
	<legend>Mon formulaire :</legend>
	<input type="hidden" name="action" value="<?php echo $action_form; ?>" />
	<input type="hidden" name="controller" value="<?php echo static::$object; ?>" />
	<p>
	  <label for="login_id">Login</label> :
	  <input type="text" placeholder="Ex : jdupont" name="login" id="login_id" value="<?php echo $uLogin; ?>" <?php echo $etat_login; ?>/>
	</p>
	<p>
	  <label for="nom_id">Nom</label> :
	  <input type="text" placeholder="Ex : Dupont" name="nom" id="nom_id" value="<?php echo $uNom; ?>" required autofocus/>
	</p>
	<p>
	  <label for="prenom_id">Prénom</label> :
	  <input type="text" placeholder="Ex : Jean" name="prenom" id="prenom_id" value="<?php echo $uPrenom; ?>" required/>
	</p>
	<p>
	  <input type="submit" value="Envoyer" />
	</p>
  </fieldset>
</form>
