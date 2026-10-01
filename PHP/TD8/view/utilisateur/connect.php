<?php
if (!is_null($erreur)) {
    echo '<p style="color:red;">Erreur : ' . htmlspecialchars($erreur) . '</p>';
}
?>
<form method="<?php echo Conf::getDebug() ? "get" : "post"; ?>" action="index.php">
  <fieldset>
	<legend>Connexion :</legend>
	<input type="hidden" name="action" value="connected" />
	<input type="hidden" name="controller" value="utilisateur" />
	<p>
	  <label for="login_id">Login</label> :
	  <input type="text" placeholder="Ex : jdupont" name="login" id="login_id" required autofocus/>
	</p>
	<p>
	  <label for="mdp_id">Mot de passe</label> :
	  <input type="password" name="mdp" id="mdp_id" required/>
	</p>
	<p>
	  <input type="submit" value="Se connecter" />
	</p>
  </fieldset>
</form>
