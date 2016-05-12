<?php
	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../login.php");
		die("");	
	}
	// include "libs/maLibUtils.php";
	// Chargement eventuel des données en cookies
	$login = valider("login", "COOKIE");
	$passe = valider("passe", "COOKIE"); 
	if ($checked = valider("remember", "COOKIE")) $checked = "checked"; 
?>

<article id="main">
	<section class="wrapper style5">
		<div class="inner">
			<section>
				<h4>Connexion</h4>
					<form method="GET" action="controleur.php">
						<div class="row uniform">
							<div class="6u$ 12u$(xsmall)">
								<input type="text" name="login" id="login" value="<?php echo $login;?>" placeholder="Pseudo" />
							</div>
							<div class="6u$ 12u$(xsmall)">
								<input type="password" name="passe" id="passe" value="<?php echo $passe;?>" placeholder="Mot de passe" />
							</div>
							<div class="6u$ 12u$(small)">
								<input type="checkbox" id="remember" name="remember" checked>
								<label for="remember">Se souvenir de moi</label>
							</div>
							<div class="12u$">
								<ul class="actions">
									<li><input type="submit" name="action" value="Connexion" class="special" /></li>
								</ul>
							</div>
						</div>
					</form>
			</section>
		</div>
	</section>
</article>
