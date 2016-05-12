<?php
	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../login.php");
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
				<form method="inscription" action="#">
					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="text" name="nom" id="nom" value="<?php echo $nom;?>" placeholder="Nom" />
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="text" name="prenom" id="prenom" value="<?php echo $prenom;?>" placeholder="Prenom" />
						</div>
						<div class="6u$ 12u$(xsmall)">
							<input type="text" name="login" id="login" value="<?php echo $login;?>" placeholder="Pseudo" />
						</div>
						<div class="6u$ 12u$(xsmall)">
							<input type="text" name="passe" id="passe" value="<?php echo $passe;?>" placeholder="Mot de passe" />
						</div>
						<div class="12u$">
							<div class="select-wrapper">
								<form action="controleur.php">
									<select name="idQuestion" id="question">
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
								</form>
							</div>
						</div>
						<div class="6u$ 12u$(xsmall)">
							<input type="text" name="rep" id="rep" value="<?php echo $rep;?>" placeholder="Reponse" />
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
