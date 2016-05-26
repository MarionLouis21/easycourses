<?php
	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../index.php?view=frigo.php");
		die("");
	}
	// include_once("libs/modele.php");
	// include "libs/maLibUtils.php";
?>

<article id="main">
	<section>
		<section class="wrapper style5">
			<div class="inner">
				<h4>Frigo</h4>
				<form id="frigoForm" action="index.php?view=frigo" method="post">
					<select id="selectCategories" name="idCategorie" style="width:300px;">
						<option value="">- Catégorie -</option>
						<?php
							$categorie = listerCategories(); // Appel à listerCategories dans modele.php
				
							foreach ($categorie as $dataCategorie) {
								echo "<option value=\"" . $dataCategorie["id"] . "\"";
								echo (isset($_POST['idCategorie']) && $_POST['idCategorie'] == $dataCategorie["id"]) ? " selected " : ""; // si(isset) categorie choisie et(&&) categorie est egale à son id alors(?) afficher selected sinon(:) afficher rien("")
								echo ">" . $dataCategorie['nom'] . "</option>"; 
							}
						?>
					</select>
				</form>
				<?php

					if (isset ($_POST['idCategorie'])) {
						$produit = listerProduitsFrigo($_POST['idCategorie']);

						echo('<ul id="products">');
						foreach($produit as $dataProduit) {
							echo "<li>" . $dataProduit["nom"] . "</li>";
						}
						echo('</ul>');
					}
				?>
			</div>
		</section>
	</section>
</article>

<script>
	document.getElementById("selectCategories").onchange = function() {
		document.getElementById("frigoForm").submit();
	};
</script>