<?php
	// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
	if (basename($_SERVER["PHP_SELF"]) != "index.php") {
		header("Location:../index.php");
		die("");
	}
?>
<!-- Footer -->
	<footer id="footer">
		<ul class="icons">
			<li><a href="https://twitter.com/IG2i_ecLille" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="https://fr-fr.facebook.com/ig2i.lens" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
			<li><a href="http://www.ig2i.fr/" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
		</ul>
		<ul class="copyright">
			<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
		</ul>
		<?php
			if (valider("connecte","SESSION")) {
				echo "Utilisateur <b>$_SESSION[pseudo]</b> "; 
				echo "connecté depuis $_SESSION[heureConnexion]";
				echo ' <a href="controleur.php?action=Deconnexion">Déconnexion</a>';
			}
		?>
	</footer>

<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="assets/js/main.js"></script>

	</body>
</html>