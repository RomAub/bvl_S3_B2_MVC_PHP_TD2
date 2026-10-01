<?php

	require_once File::build_path(array("config", "Conf.php"));

	class Model {
		public static $pdo;

		public static function Init() {
			$hostname = Conf::getHostname();
			$database_name = Conf::getDatabase();
			$login = Conf::getLogin();
			$password = Conf::getPassword();

			try{
				self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
					array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
				);

				// On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				if (Conf::getDebug()) {
					echo $e->getMessage(); // affiche un message d'erreur
				} else {
					echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
				}
				die();
			}
		}

		public static function selectAll() {
			$table_name = static::$object;
			$class_name = 'Model' . ucfirst(static::$object);

			$sql = "SELECT * FROM $table_name";
			$rep = Model::$pdo->query($sql);
			$rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
			return $rep->fetchAll();
		}

		public static function select($primary_value) {
			$table_name = static::$object;
			$class_name = 'Model' . ucfirst(static::$object);
			$primary_key = static::$primary;

			$sql = "SELECT * FROM $table_name WHERE $primary_key=:nom_tag";
			// Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"nom_tag" => $primary_value,
			);
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
			$tab = $req_prep->fetchAll();
			// Attention, si il n'y a pas de résultats, on renvoie false
			if (empty($tab))
				return false;
			return $tab[0];
		}

		public static function delete($primary_value) {
			$table_name = static::$object;
			$primary_key = static::$primary;

			$sql = "DELETE FROM $table_name WHERE $primary_key=:nom_tag";
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"nom_tag" => $primary_value,
			);
			$req_prep->execute($values);
		}

		public static function update($data) {
			$table_name = static::$object;
			$primary_key = static::$primary;

			$set = "";
			foreach ($data as $cle => $valeur) {
				$set = $set . "$cle=:$cle,";
			}
			$set = rtrim($set, ",");

			$sql = "UPDATE $table_name SET $set WHERE $primary_key=:$primary_key";
			$req_prep = Model::$pdo->prepare($sql);
			$req_prep->execute($data);
		}

		public static function save($data) {
			$table_name = static::$object;

			$champs = "";
			$tags = "";
			foreach ($data as $cle => $valeur) {
				$champs = $champs . "$cle,";
				$tags = $tags . ":$cle,";
			}
			$champs = rtrim($champs, ",");
			$tags = rtrim($tags, ",");

			$sql = "INSERT INTO $table_name ($champs) VALUES ($tags)";
			$req_prep = Model::$pdo->prepare($sql);
			try {
				$req_prep->execute($data);
			} catch (PDOException $e) {
				return false;
			}
			return true;
		}
	}

	Model::Init();
?>
