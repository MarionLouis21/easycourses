<?php
	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../nouveauPasse.php");
		die("");	
	}
?>

<article id="main">
	<section class="wrapper style5">
		<div class="inner">
			<section>
				<h4>Nouveau mot de passe</h4>
					<form method="post" action="controleur.php?action=ReinitMdp">
							<div class="row uniform">
								<div class="6u$ 12u$(xsmall)">
									<input type="text" name="nouveauPasse" id="nouveauPasse" placeholder="Nouveau mot de passe" />
								</div>
								<div class="12u$">
									<ul class="actions">
											<li><input style="float:right;" type="submit" value="Changer mon mot de passe" class="special" /></li>
									</ul>
								</div>
							</div>
					</form>
			</section>
		</div>
	</section>
</article>
