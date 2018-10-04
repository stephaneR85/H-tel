<?php
if(isset($_GET['commentaire']))
{
	require("Modele/user.php");
	$Commentaire = new user;
	$Commentaire->id_user = $_SESSION['id'];
	$Commentaire->id_hotel = $_GET['id'];
	$Commentaire->note = $_GET['note'];
	$Commentaire->commentaire = $_GET['commentaire'];
	$Commentaire->pseudo = $_GET['pseudo'];
	$Commentaire->AjoutCommentaire();
}
else
{
	require("Vue/commentaire.php");
}
?>