<?php
	// On inclut les fichiers de classe PHP avec require_once
	// pour éviter qu'ils soient inclus plusieurs fois
	require_once 'Conf.php';
	// On affiche le login de la base de donnees
	echo Conf::getLogin();
	echo " ";
	echo Conf::getHostname();
	echo " ";
	echo Conf::getDatabase();
	echo " ";
	echo Conf::getPassword();
?>
