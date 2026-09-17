<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Désinscription d'un trajet</title>
</head>
<body>
    <form action="testDelPassager.php" method="POST">
        <label for="trajet_id">ID du trajet :</label>
        <input type="text" id="trajet_id" name="trajet_id" required><br><br>
        
        <label for="utilisateur_login">Login de l'utilisateur :</label>
        <input type="text" id="utilisateur_login" name="utilisateur_login" required><br><br>
        
        <button type="submit">Désinscrire l'utilisateur</button>
    </form>
</body>
</html>