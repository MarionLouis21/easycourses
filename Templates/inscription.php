<?php
	// Si la page est appelée directement par son adresse, on redirige en passant par la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../index.php?view=inscription.php");
		die("");	
	}

	include_once("libs/modele.php");
	$nom = valider("nom", "COOKIE");
	$prenom = valider("prenom", "COOKIE");
	$login = valider("login", "COOKIE");
	$passe = valider("passe", "COOKIE");
	$rep = valider("rep", "COOKIE");
?>

<article id="main">
	<section>
		<section class="wrapper style5">
			<div class="inner">
				<h4>Inscription</h4>
				<form method="post" action="controleur.php?action=Inscription">
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="text" name="nom" id="nom"  placeholder="Nom" />
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="text" name="prenom" id="prenom"  placeholder="Prenom" />
						</div>
						<div class="6u$ 12u$(xsmall)">
							<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" />
						</div>
						<div class="6u$ 12u$(xsmall)">
							<input type="password" name="passe" id="passe" placeholder="Mot de passe" />
						</div>
						<div class="12u$">
							<div class="select-wrapper">
									<select name="idQuestion" id="idQuestion">
										<option value="">- Question en cas d'oubli de mot de passe -</option>
										<?php
											$question = listerQuestions(); // Appel à listerQuestions dans modele.php
											foreach ($question as $dataQuestion) {
												echo "<option value=\"$dataQuestion[id]\">\n";
												echo  $dataQuestion["label"];
												echo "\n</option>\n"; 
											}
										?>
									</select>
							</div>
						</div>
						<div class="6u$ 12u$(xsmall)">
							<input type="text" name="rep" id="rep" placeholder="Réponse" />
						</div>
						<div class="12u$">
							<ul class="actions">
									<li><input type="submit" value="Inscription" class="special" /></li>
							</ul>
						</div>
					</div>
				</form>
			</div>
		</section>
	</section>	
</article>
