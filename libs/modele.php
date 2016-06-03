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
	$SQL="INSERT INTO `users`(`nom`, `prenom`, `pseudo`, `passe`, `idQuestion`, `reponse`) VALUES (\"". $nom . "\",\"" . $prenom . "\",\"" . $pseudo . "\",\"" . $passe . "\",\"" . (int)$idQuestion . "\",\" ". $reponse . "\");";
	SQLInsert($SQL);
	// Cette fonction crée un nouvel utilisateur et renvoie l'identifiant de l'utilisateur créé}
}

function connecterUtilisateur($idUser) {
	// cette fonction affecte le booléen "connecte" à vrai pour l'utilisateur concerné
	$SQL ="UPDATE users SET connecte=1 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function listerInfosUtilisateur($login){
	$SQL="SELECT * FROM users WHERE pseudo=\"" . $login . "\" AND connecte=1;";
	return parcoursRs(SQLSelect($SQL));
}


function deconnecterUtilisateur($idUser) {
	// cette fonction affecte le booléen "connecte" à faux pour l'utilisateur concerné 
	$SQL ="UPDATE users SET connecte=0 WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function changerPasse($idUser,$passe) {
	// cette fonction modifie le mot de passe d'un utilisateur
	$SQL = "UPDATE users SET passe=\"" . $passe . "\" WHERE id=\"" . $idUser . "\"";
	SQLUpdate($SQL);
}

function changerPseudo($idUser,$pseudo) {
	// cette fonction modifie le pseudo d'un utilisateur
	$SQL = "UPDATE users SET pseudo='$pseudo' WHERE id='$idUser'";
	SQLUpdate($SQL);
}

function listerQuestions($classe = "both") // Liste les questions lors de l'inscription 
{
	$str="SELECT * FROM questions "; 
	return parcoursRs(SQLSelect($str));
}

function listerCategories()
{
	$str="SELECT nom,id FROM categories ORDER BY nom"; 
	return parcoursRs(SQLSelect($str));
}

function listerProduits($idCat = 0)
{
	$str="SELECT * FROM catalogue WHERE idCategorie= " . (int)$idCat . " ORDER BY nom ASC"; 
	//$str="SELECT * FROM catalogue WHERE idCategorie='$idCat' ORDER BY nom"; 
	return parcoursRs(SQLSelect($str));
}


function ajouterProduitAuCatalogue($nom,$idCategorie)
{
	$SQL="INSERT INTO catalogue (nom,idCategorie) VALUES (\"" . $nom . "\",\"" . $idCategorie . "\");";
	SQLInsert($SQL);
}

function listerListes($mode="tout") {
	// Liste toutes les listes ($mode="tout")
	// OU uniquement celles actives  ($mode="actives"), ou inactives  ($mode="inactives")
	$SQL = "SELECT * FROM listes"; 
	if ($mode=="actives") $SQL .= " WHERE complete=1";
	if ($mode=="inactives") $SQL .= " WHERE complete=0";

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

function creerListe($nom, $idAuteur) {
	// crée une nouvelle liste et renvoie son identifiant
	$SQL="INSERT INTO `listes`(`nom`, `complete`, `idAuteur`) VALUES ('$nom', '0, $idAuteur)";
	SQLInsert($SQL);
}

function supprimerListe($idListe) {
	// supprime une liste et ses produits
	$SQL = "DELETE FROM listes WHERE id='$idListe'";
	SQLDelete($SQL);
}


function enregistrerProduit($idListe, $idAuteur, $quantite) {
	// Enregistre un message dans la base en encodant les caractères spéciaux HTML : <, > et & pour interdire les messages HTML
	$SQL="INSERT INTO `produits`(`idConversation`, `idAuteur`, `contenu`) VALUES ($idConversation ,$idAuteur ,'$contenu')";
	return SQLInsert($SQL);
}

function listerProduitsFrigo($idListe) {
	$SQL = "SELECT produitsliste.idProduitscatalogue, users.pseudo FROM produitsliste
					INNER JOIN users ON listes.idAuteur = users.id
					WHERE produitsliste.idListe = $idListe";
	return parcoursRs(SQLSelect($SQL));
	
}


function listerProduitsListe($idListe,$format="asso") {
	$SQL = "SELECT produitsliste.idProduitscatalogue, users.pseudo FROM produitsliste
					INNER JOIN users ON listes.idAuteur = users.id
					WHERE produitsliste.idListe = $idListe";
	return parcoursRs(SQLSelect($SQL));
	
}


function getListe($idList) {	
	$SQL = "SELECT nom, complete FROM listes WHERE id='$idList'";
	return parcoursRs(SQLSelect($SQL));

}

/**********************BONUS VENANT DE QUENTIN <3************************************/

function recupererAvecId($idUser) {
	$SQL = "SELECT * FROM users WHERE id = '$idUser'";
	return parcoursRs(SQLSelect($SQL));
}


?>
