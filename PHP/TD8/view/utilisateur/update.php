<?php
$uLogin = htmlspecialchars($login);
$uNom = htmlspecialchars($nom);
$uPrenom = htmlspecialchars($prenom);
$uEmail = htmlspecialchars($email);
$methode = Conf::getDebug() ? "get" : "post";
?>
<form method="<?php echo $methode; ?>" action="index.php">
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
	  <label for="email_id">Email</label> :
	  <input type="email" placeholder="Ex : jdupont@yopmail.com" name="email" id="email_id" value="<?php echo $uEmail; ?>" required/>
	</p>
	<p>
	  <label for="mdp_id">Mot de passe</label> :
	  <input type="password" name="mdp" id="mdp_id" required/>
	</p>
	<p>
	  <label for="mdp2_id">Confirmation du mot de passe</label> :
	  <input type="password" name="mdp2" id="mdp2_id" required/>
	</p>
<?php if (Session::is_admin()) { ?>
	<p>
	  <input type="checkbox" name="admin" id="admin_id" <?php echo $admin_checked; ?>/>
	  <label for="admin_id">Administrateur ?</label>
	</p>
<?php } ?>
	<p>
	  <input type="submit" value="Envoyer" />
	</p>
  </fieldset>
</form>
