<?php
	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../index.php?view=listes.php");
		die("");
	}

include "libs/maLibForms.php";
 ?>


<article id="main">
	<section class="wrapper style5">
		<div class="inner">
			<section>
				<h2>Listes</h2>
				<h4>Listes actives</h4>
				<?php
				$listList = listerListes("actives");
				mkLiens($listList,"nom","id","index.php?view=mlist","idList");
				?>
				<h4>Listes inactives</h4>
				<?php
				$listList = listerListes("inactives");
				mkLiens($listList,"nom","id","index.php?view=mlist","idList");
				?>
				<h4>Gestion des listes</h4>
				<?php
					mkForm("controleur.php"); 
					$toutesList = listerListes();
					mkSelect("idListe",$toutesList,"id", "nom");
					mkInput("submit","action","Activer");
					mkInput("submit","action","Archiver");
					mkInput("submit","action","Supprimer");
					echo "<br/> <h4>Créer une Liste</h4>";
					mkInput("text","nvListe");
					mkInput("submit","action","Creer");
					endForm();
				?>
			</section>
		</div>
	</section>
</article>
