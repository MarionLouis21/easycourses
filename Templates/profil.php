<?php	


	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../index.php?view=profil.php");
		die("");
	}
	// include_once("libs/modele.php");
	// include "libs/maLibUtils.php";

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
			<h3> Mon profil </h3>
				<form id="cataProfil" action="index.php?view=profil" method="post">

					<div class="row uniform">
						<div class="6u 12u$(xsmall)">
							<input type="text" name="nom" id="nom" placeholder="Nom" />
						</div>
						<div class="6u 12u$(xsmall)">
							<input type="text" name="prenom" id="prenom"  value="<?php  ?>"placeholder="Prenom" />
						</div>
						<div class="6u$ 12u$(xsmall)">
							<input type="text" name="login" id="login" value="<?php echo $login;?>" placeholder="Pseudo" />
						</div>
						<div class="6u$ 12u$(xsmall)">
							<input type="password" name="passe" id="passe" placeholder="Mot de passe" />
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
						<?php
						$SQL="SELECT * FROM users WHERE pseudo=\"" . $login . "\" AND passe=\"" . $passe . "\";";
		echo parcoursRs(SQLSelect($SQL));
		?>

					</div>
					
					<input type="submit" name="action" value="Modifier mon profil"  class="special" />
				</form>

			</div>
		</section>
	</section>
</article>
