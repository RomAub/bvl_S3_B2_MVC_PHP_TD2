<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> testVoiture </title>
    </head>
    <body>
	<?php
	require_once('Voiture.php');
	$voiture1 = new Voiture("PetitPoney", "Rose Pastel", "AZERTYUI");
	$voiture1->afficher();
        ?>
    </body>
</html> 

