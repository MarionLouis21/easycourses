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
			<form id="cataProfil" action="controleur.php?action=Profil" method="post">
				<?php
					$infosUser=listerInfosUtilisateur($login,$passe);
					foreach ($infosUser as $infos){
						echo 'Pseudo : <input style="width:250px;" type="text" name="login" id="login" value="' . $infos['pseudo'] . '" placeholder="Pseudo"/>';
						echo 'Mot de passe : <input style="width:250px;" type="password" name="passe" id="passe" value="' . $infos['passe'] . '" placeholder="Mot de passe"/>';
						echo 'Nouveau mot de passe : <input style="width:250px;" type="password" name="newPasse" id="newPasse" placeholder="Nouveau mot de passe"/>';
					}
				?>
					<input style="float:right;" type="submit" name="action" value="Modifier mon profil"  class="special" />
				</form>
			</div>
		</section>
	</section>
</article>
