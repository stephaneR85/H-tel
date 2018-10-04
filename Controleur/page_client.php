<?php
if(isset($_POST['adresse']))
{
	session_start();
	require("../Modele/user.php");
	$user = new user;
	$user->colonne = "adresse";
	$user->data = $_POST['adresse']." ".$_POST['cp']." ".$_POST['ville'];
	$user->Modif();
}
if(isset($_POST['num_tel']))
{
	session_start();
	require("../Modele/user.php");
	$user = new user;
	$user->colonne = "num_tel";
	$tel = $_POST['num_tel'];
	$numero = $user->VerifierNum($tel);
	if($tel == false)
	{
		echo '<script type="text/javascript">alert("Le format saisi est incorrecte.");
										window.location.href ="../../index.php?page=page_client";</script>';
	}
	else
	{
		$user->data = $numero;
		$user->Modif();
	}
}
if(isset($_POST['adr_mail']))
{
	session_start();
	require("../Modele/user.php");
	$user = new user;
	$user->colonne = "mail";
	$mail = $_POST['adr_mail'];
	$adr_mail = $user->VerifierMail($mail);
	if($adr_mail == false)
	{
		echo '<script type="text/javascript">alert("Le format saisi est incorrecte.");
										window.location.href ="../../index.php?page=page_client";</script>';
	}
	else
	{
		$user->data = $adr_mail;
		$user->Modif();
	}
}
if(isset($_POST['mdp']))
{
	session_start();
	require("../Modele/user.php");
	$user = new user;
	$user->colonne = "mdp";
	$mdp = $_POST['mdp'];
	$conf = $_POST['conf'];
	$mdp = $user->VerifierMotDePasse($mdp, $conf);
	if($mdp == false)
	{
		echo '<script type="text/javascript">alert("La saisie incorrecte.");
										window.location.href ="../../index.php?page=page_client";</script>';
	}
	else
	{
		$user->data = $mdp;
		$user->Modif();
	}
}
else
{
	if(isset($_SESSION['id']))
	{		
		$id = $_SESSION['id'];
		if($id != 1)
		{
			$id_utilisateur = $id;
		}
		require("Modele/user.php");
		$user = new user;
		$user->id_user = $id_utilisateur;
		$row = $user->Affiche();
		require("Vue/page_client.php");
	}
	else
	{
		echo "Veuillez vous authentifier pour accéder à cette page";
	}
}
?>