<?php

if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=mlist&" . $_SERVER["QUERY_STRING"]);
	die("");
}

$idList = valider("idListe");
if (!$idList)
{
	header("Location:index.php?view=listes"); 
	die("idListe manquant");
}

$Liste = getListe($idList);

echo "<br/>";
echo "<h1> {$liste[0]['nom']} </h1>";

$SQL="SELECT complete FROM listes WHERE id = $idListe";
$complete=SQLGetChamp($SQL);


	echo("<h4>La liste est complete.</h4></br>");

		if (valider("connecte","SESSION"))
		{
			$idUser=$_SESSION['idUser'];
			$produitsliste=listerProduisListe($idListe);
			$longueur=count($produitsliste);
			echo('Cette liste comporte '.$longueur.' produits.');
			for($i=0; $i <$longueur; $i++){
				echo('<p>['.($produitsliste[$i]['pseudo']).'] : '.($produitsliste[$i]['idProduitscatalogue']).'</p>');
			}
	mkForm("controleur.php","GET");
		mkInput("text","produitsliste","","onFocus=\"select()\""); // On peut aussi utiliser textarea
		mkinput("hidden","idUser",$idUser);  //Pour envoyer les infos en caché
		mkinput("hidden","idListe",$idListe);
		mkinput("submit","action","Poster");
		endForm();
		echo("<script>");
		echo("setInterval('location.reload();', 20000);");   //setInterval(Action,X); : fait Action toutes les X milisecondes.    location.reload(); permet de recharger la page où l'on se trouve
		echo("</script>");

		}

?>