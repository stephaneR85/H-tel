<?php
if (isset($_POST['adresse_mail']) && (isset($_POST['mdp'])))
{	
	$adresse_mail = $_POST['adresse_mail'];
	$mdp = sha1($_POST['mdp']);
	if(!empty($adresse_mail) && !empty($mdp))
	{
		include("../Modele/user.php");
		$user = new user;
		$user->mail_user = $adresse_mail;
		$user->mdp = $mdp;
		$resultat = $user->auth();
			if(!empty($resultat))
				{
				session_start();
				$_SESSION['id'] = $resultat->id_utilisateur;
				$_SESSION['prenom']= $resultat->prenom_utilisateur;
				$_SESSION['nom']= $resultat->nom_utilisateur;
				$_SESSION['role']= $resultat->role;
				$_SESSION['email']= $resultat->mail;
				if($resultat->role == 'client')
				{
					echo "<script type='text/javascript'>
					window.location.href ='../index.php?page=accueil';</script>";
				}
				else if($resultat->role=='admin')
				{
					echo "<script type='text/javascript'>
					window.location.href ='../index.php?page=admin';</script>";
				}
			}
			else
			{
				echo "<script type='text/javascript'>
					alert('votre adresse mail ou votre mot de passe est incorrect');
					window.location.href ='../index.php?page=accueil';</script>";
			}
	}
	else
	{
	echo "<script type='text/javascript'>
					alert('Veuillez saisir votre adresse mail et votre mot de passe s'il vous plait');
					window.location.href ='../index.php?page=accueil';</script>";
	}
}
else
	{
	echo "<script type='text/javascript'>
					alert('Veuillez saisir votre adresse mail et votre mot de passe s'il vous plait');
					window.location.href ='../index.php?page=accueil';</script>";
	}
?>