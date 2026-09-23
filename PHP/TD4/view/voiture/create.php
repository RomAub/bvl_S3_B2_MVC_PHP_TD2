<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Créer une voiture</title>
    </head>
    <body>
		<form method="get" action="routeur.php">
		  <fieldset>
			<legend>Mon formulaire :</legend>
			<input type="hidden" name="action" value="created" />
			<p>
			  <label for="marque_id">Marque</label> :
			  <input type="text" placeholder="Ex : Opel" name="marque" id="marque_id" required autofocus/>
			</p>
			<p>
			  <label for="couleur_id">Couleur</label> :
			  <input type="text" placeholder="Ex : Rouge" name="couleur" id="couleur_id" required/>
			</p>
			<p>
			  <label for="immat_id">Immatriculation</label> :
			  <input type="text" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" required/>
			</p>
			<p>
			  <input type="submit" value="Envoyer" />
			</p>
		  </fieldset> 
		</form>
    </body>
</html>
