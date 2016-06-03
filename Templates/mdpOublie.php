<?php
	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../mdpOublie.php");
		die("");	
	}
?>

<article id="main">
	<section class="wrapper style5">
		<div class="inner">
			<section>
				<h4>Mot de passe oublié</h4>
					<form method="post" action="controleur.php?action=mdpOublie">
							<div class="row uniform">
								<div class="6u$ 12u$(xsmall)">
									<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" />
								</div>
								<div class="12u$">
									<div class="select-wrapper">
											<select name="idQuestion" id="idQuestion">
												<option value="">- Quelle est votre question ? -</option>
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
											<li><input type="submit" value="Changer mon mot de passe" class="special" /></li>
									</ul>
								</div>
							</div>
						</form>
			</section>
		</div>
	</section>
</article>
