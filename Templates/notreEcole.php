<?php

// AJOUTE UN NOM VIDE QUAND J'ACTUALISE




	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../index.php?view=notreEcole.php");
		die("");
	}

?>
	<article id="main">
		<header>
			<h2>Institut en Génie Informatique et Industriel</h2>
			<p>Formation de Centrale Lille</p>
		</header>
		<section class="wrapper style5">
			<div class="inner">

				<h3>Formation d'ingénieur en 5 ans</h3>
				<p>Spécialisation en informatique ou industriel</p>

				<p>Avec possibilité de passer par la voie de l'apprentissage</p>

				<hr/>

				<h4>Pour plus d'informations :</h4>
				<p><a href="http://www.ig2i.fr">IG2I</a></p>

			</div>
		</section>
	</article>