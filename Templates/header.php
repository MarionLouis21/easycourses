<?php
	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../index.php");
		die("");
	}
?>

<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>EasyCourses</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
<body>
<div id="page-wrapper">
	<!-- Header -->
		<header id="header">
			<h1>EasyCourses</h1>
			<nav id="nav">
				<ul>
					<li class="special">
						<a href="#menu" class="menuToggle"><span>Menu</span></a>
						<div id="menu">
							<ul>
								<?php
									if(!valider("connecte", "SESSION")) {	
										echo "<li><a href='index.php'>Accueil</a></li>";		
										echo "<li><a href='index.php?view=login'>Se connecter</a></li>";
										echo "<li><a href='index.php?view=inscription'>S'inscrire</a></li>";
										echo "<li><a href='index.php?view=notreEcole'>Notre école</a></li>";
									}
									if(valider("connecte","SESSION")) {
										echo "<li><a href='index.php?view=listes'>Mes Listes</a></li>";
										echo "<li><a href='index.php?view=frigo'>Mon Frigo</a></li>";
										echo "<li><a href='index.php?view=catalogue'>Catalogue</a></li>";
										echo "<li><a href='index.php?view=profil'>Mon Profil</a></li>";
										echo "<li><a href='controleur.php?action=Deconnexion'>Se déconnecter</a></li>";  // Aussi dans le footer
									}
								?>			
							</ul>
						</div>
					</li>
				</ul>
			</nav>
		</header>
</div>

