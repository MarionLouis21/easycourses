<?php
session_start(); // On en a besoin pour utiliser la variable globale SESSION

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 

	$addArgs = "";

	if ($action = valider("action"))
	{
		ob_start ();
		echo "Action = '$action' <br />";

		switch($action) {
			case 'Connexion' :
				if ($login = valider("login"))
					if ($passe = valider("passe")) {
						if (verifUser($login,$passe)) {
							if (valider("remember")) {
								setcookie("login",$login , time()+60*60*24*30);
								setcookie("passe",$passe, time()+60*60*24*30);
								setcookie("remember",true, time()+60*60*24*30);
							} else {
								setcookie("login","", time()-3600);
								setcookie("passe","", time()-3600);
								setcookie("remember",false, time()-3600);
							}
							connecterUtilisateur(valider("idUser","SESSION"));
							$addArgs = "?view=listes";
					}
				}
			break;

			case 'Deconnexion' :
				session_destroy();
				deconnecterUtilisateur(valider("idUser","SESSION"));
			break;
		}

	}

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";

	header("Location:" . $urlBase . $addArgs);

	ob_end_flush();

// Pour plus d'infos sur ob_start...etc aller sur php.net
?>

