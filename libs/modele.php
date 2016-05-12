<?php

//librairie faciliant les requêtes SQL
include_once("maLibSQL.pdo.php");

function verifUserBdd($login,$passe) {
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès

	$SQL="SELECT id FROM users WHERE pseudo='$login' AND passe='$passe'";

	return SQLGetChamp($SQL);
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}

function mkUser($nom, $prenom, $pseudo, $passe, $idQuestion, $reponse) {
	$SQL="INSERT INTO `users`(`nom`, `prenom`, `pseudo`, `passe`, `idQuestion`, `reponse`) VALUES (\"$nom\",\"$prenom\",\"$pseudo\",\"$passe\",$idQuestion,\"$reponse\")";
	SQLInsert($SQL);
	// Cette fonction crée un nouvel utilisateur et renvoie l'identifiant de l'utilisateur créé
}

function connecterUtilisateur($idUser) {
	// cette fonction affecte le booléen "connecte" à vrai pour l'utilisateur concerné
	$SQL ="UPDATE users SET connecte=1 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function deconnecterUtilisateur($idUser) {
	// cette fonction affecte le booléen "connecte" à faux pour l'utilisateur concerné 
	$SQL ="UPDATE users SET connecte=0 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function changerPasse($idUser,$passe) {
	// cette fonction modifie le mot de passe d'un utilisateur
	$SQL = "UPDATE users SET passe='$passe' WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function changerPseudo($idUser,$pseudo) {
	// cette fonction modifie le pseudo d'un utilisateur
	$SQL = "UPDATE users SET pseudo='$pseudo' WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function listerQuestions($classe = "both") // Liste les questions lors de l'inscription 
{
	$str="SELECT label FROM questions "; 
	return parcoursRs(SQLSelect($str));
}

function listerCategories()
{
	$str="SELECT nom,id FROM categories ORDER BY nom"; 
	return parcoursRs(SQLSelect($str));
}

function listerProduits($idCat = 0)
{
	$str="SELECT * FROM catalogue WHERE idCategorie=" . (int)$idCat . " ORDER BY nom"; 
	return parcoursRs(SQLSelect($str));
}

function listerListes($mode="tout") {
	// Liste toutes les listes ($mode="tout")
	// OU uniquement celles actives  ($mode="actives"), ou inactives  ($mode="inactives")
	$SQL = "SELECT * FROM listes"; 
	if ($mode=="actives") $SQL .= " WHERE active=1";
	if ($mode=="inactives") $SQL .= " WHERE active=0";

	return parcoursRs(SQLSelect($SQL));
}

function archiverListe($idListe) {
	// rend une liste non complete/ non termineee
	$SQL = "UPDATE listes SET complete=0 WHERE id='$idListe'";
	SQLUpdate($SQL);
}

function reactiverListe($idListe) {	
	// rend une liste complete/terminee
	$SQL = "UPDATE listes SET complete=1 WHERE id='$idListe'";
	SQLUpdate($SQL);
}

function creerListe($nom) {
	// crée une nouvelle liste et renvoie son identifiant
	$SQL="INSERT INTO `listes`(`nom`, `complete`, `idAuteur`) VALUES ('$nom', '0, $idAuteur)";
	SQLInsert($SQL);
}

function supprimerConversation($idConv) {
	// supprime une liste et ses produits
	$SQL = "DELETE FROM listes WHERE id='$idList'";
	SQLDelete($SQL);
}


function enregistrerProduit($idListe, $idAuteur, $quantite) {
	// Enregistre un message dans la base en encodant les caractères spéciaux HTML : <, > et & pour interdire les messages HTML
	$SQL="INSERT INTO `produits`(`idConversation`, `idAuteur`, `contenu`) VALUES ($idConversation ,$idAuteur ,'$contenu')";
	return SQLInsert($SQL);
}

function listerMessages($idConv,$format="asso") {
	// Liste les messages de cette conversation, au format JSON ou tableau associatif
	// Champs à extraire : contenu, auteur, couleur 
	// en ne renvoyant pas les utilisateurs blacklistés

	$SQL = "SELECT message.contenu, users.pseudo, users.couleur FROM message
					INNER JOIN users ON message.idAuteur = users.id
					WHERE message.idConversation = $idConv";
	return parcoursRs(SQLSelect($SQL));
	
}

function listerMessagesFromIndex($idConv,$index) {
	// Liste les messages de cette conversation, 
	// dont l'id est superieur à l'identifiant passé
	// Champs à extraire : contenu, auteur, couleur 
	// en ne renvoyant pas les utilisateurs blacklistés

}

function getConversation($idConv) {	
	// Récupère les données de la conversation (theme, active)

	$SQL = "SELECT theme, active FROM conversations WHERE id='$idConv'";
	return parcoursRs(SQLSelect($SQL));

}

/**********************BONUS VENANT DE QUENTIN <3************************************/

function recupererAvecId($idUser) {
	$SQL = "SELECT * FROM users WHERE id = '$idUser'";
	return parcoursRs(SQLSelect($SQL));
}


?>
