<?php

// AJOUTE UN NOM VIDE QUAND J'ACTUALISE




	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../index.php?view=catalogue.php");
		die("");
	}
	// include_once("libs/modele.php");
	// include "libs/maLibUtils.php";
?>

<article id="main">
	<section>
		<section class="wrapper style5">
			<div class="inner">
				<h3>Catalogue</h3>
				<form id="cataForm" action="index.php?view=catalogue" method="post">
				<?php  // Mettre avant le formulaire pour afficher le nouveau produit dès qu'on appuie sur le bouton
							$absent=true;
							if (isset($_POST['nouveauProduit'])) {
								if (isset($_POST['idCategorie'])) {
									$SQL = "SELECT * FROM catalogue WHERE idCategorie=\"" . $_POST['idCategorie'] . " \"";		
									$produit = parcoursRs(SQLSelect($SQL));
									foreach ($produit as $dataProduit) {
									//	var_dump($dataProduit['nom'], $_POST['nouveauProduit']);
										if ($dataProduit['nom'] == $_POST['nouveauProduit']) {
											$absent=false;
										}
									}
									//var_dump($absent);
									//die();

									if (($_POST['nouveauProduit']!="") && $absent) {
										ajouterProduitAuCatalogue($_POST['nouveauProduit'],$_POST['idCategorie']);
										//echo $_POST['idCategorie']; 
									}
								}
							}
						?>

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
						<?php
							if (isset ($_POST['idCategorie'])) {
								$produit = listerProduits($_POST['idCategorie']);

								echo('<ul id="products">');
								foreach($produit as $dataProduit) {
									echo "<li>" . $dataProduit["nom"] . "</li>";
								}
								echo('</ul>');
							}
						?>
							<h5> Ajouter un produit à la catégorie </h5>
							<div class="6u$ 12u$(xsmall)">
								<input type="text" name="nouveauProduit" id="nouveauProduit" placeholder ="Produit"/>
								<input type="submit" name="action" value="Ajouter"  class="special" style="float:right;" />

						
						</div>
				</form>

			</div>
		</section>
	</section>
</article>

<script>
	document.getElementById("selectCategories").onchange = function() {
		document.getElementById("cataForm").submit();
	};
</script>