<?php
	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../index.php?view=listes.php");
		die("");
	}
 ?>

<article id="main">
	<section class="wrapper style5">
		<div class="inner">
			<section>
				<h4>Listes</h4>
			</section>
		</div>
	</section>
</article>
