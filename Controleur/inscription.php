<?php
if(isset($_POST['nom']))
{
	include('../Modele/user.php');
	$inscription = new user;
	$inscription->nom_user = $_POST['nom'];
	$inscription->prenom =$_POST['prenom'];
	$inscription->adresse_user = $_POST['adresse'];
	$inscription->code_postal_user =$_POST['cp'];
	$inscription->ville_user = $_POST['ville'];
	$tel = $_POST['num_tel'];
	$numero = $inscription->VerifierNum($tel);
	$inscription->tel_user = $numero;
	$mail = $_POST['adr_mail'];
	$adresse_mail = $inscription->VerifierMail($mail);
	$inscription->mail_user = $adresse_mail;
	$mdp = $_POST['mot_de_passe'];
	$conf = $_POST['confirmation'];
	$passe = $inscription->VerifierMotDePasse($mdp, $conf);
	$inscription->mdp = $passe; 
	$inscription->role = role();

	
	if (empty($numero))
	{
		echo '<script type="text/javascript">alert("Le format du numero que vous avez indiquez n\'est pas correct");
											window.location.href ="../index.php?page=inscription";</script>';
		exit;
	}
	if(empty($passe))
	{
		echo '<script type="text/javascript">alert("Erreur de saisie du mot de passe");
											window.location.href ="../index.php?page=inscription";</script>';
		exit;
	}
	if(empty($adresse_mail))
	{
		echo '<script type="text/javascript">alert("Votre adresse e-mail n\'est pas valide");
											window.location.href ="../index.php?page=inscription";</script>';
		exit;
	}
	if($inscription->double_email($adresse_mail) == false)
		{
		echo utf8_decode('<script type="text/javascript">alert("Cette adresse e-mail est déja utilisée");
											window.location.href ="../index.php?page=inscription";</script>');
		exit;
		}
	else
		{
			$inscription->ajouterutilisateur();
		}
}	

function role()
	{
	if (isset($_POST['role']))
	{
		$role = $_POST['role'];
	}
	else
	{
		$role = 'client';
	}
		return $role;
}

include('Vue/inscription.php');
?>