
<?php

session_start(); // A mettre dans l'index car l'index est le fichier de base, ça marchera pour header,...,footer

	include_once "libs/maLibUtils.php"; // On aura plus besoin de les inclure dans header,...,footer
	include_once("libs/modele.php");
	include_once "libs/maLibSQL.pdo.php";

	include ("Templates/header.php");

	$view = "accueil";
	if(isset($_GET["view"])) {
		$view = $_GET["view"];
	}

	// Si l'utilisateur est déjà connecté, on affiche la page des listes et non la page d'accueil
	if(valider("connecte", "SESSION")) {
		switch ($view) {
			case 'listes':
				include 'Templates/listes.php';
			break;

			case 'frigo':
				include 'Templates/frigo.php';
			break;

			case 'catalogue':
				include 'Templates/catalogue.php';
			break;

			case 'profil':
				include 'Templates/profil.php';
			break;

			default :
				include 'Templates/listes.php';
			break;
		}
	} else {
		switch ($view) {
			case 'accueil':
				include 'Templates/accueil.php';
			break;

			case 'login':
				include 'Templates/login.php';
			break;

			case 'inscription':
				include 'Templates/inscription.php';
			break;

			case 'notreEcole':
				include 'Templates/notreEcole.php';
			break;

			case 'mdpOublie':
				include 'Templates/mdpOublie.php';
			break;

			case 'nouveauPasse':
				include 'Templates/nouveauPasse.php';
			break;

			default :
				include 'Templates/accueil.php';
			break;
		}
	}

	include 'Templates/footer.php';
?>
			