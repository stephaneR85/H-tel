<?php
require_once('connection.php');

class user
{
	public $id_user;
	public $nom_user;
	public $prenom;
	public $adresse_user;
	public $code_postal_user;
	public $ville_user;
	public $tel_user;
	public $mail_user;
	public $mdp;
	public $role;
	public $colonne;
	public $data;
	public $id_hotel;
	public $note;
	public $commentaire;
	public $pseudo;
	
		function auth()
		{
			$bdd = bdd();
			$pdo = $bdd->prepare("SELECT id_utilisateur, mail, mdp, nom_utilisateur, prenom_utilisateur, role FROM utilisateur WHERE mdp= :mdp AND mail= :adresse_mail");
			$pdo->bindValue(':adresse_mail', $this->mail_user, PDO::PARAM_STR);
			$pdo->bindValue(':mdp', $this->mdp, PDO::PARAM_STR);
			$pdo->execute();
			while ($resultat = $pdo->fetch(PDO::FETCH_OBJ))
			{
			return $resultat;
			}
		}
		
		function ListUser()
		{
			$bdd = bdd(); 
			$pdo = $bdd->prepare("SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur, mail FROM utilisateur");
			$pdo->execute();

			while ($resultat = $pdo->fetch(PDO::FETCH_OBJ))
				{
				echo '<li><a href="../index.php?page=page_client&id='.$resultat->id_utilisateur.'">'.$resultat->nom_utilisateur.' '.$resultat->prenom_utilisateur.'</a></li>';
				}
		}
		
		function Sup_User()
		{
			$bdd = bdd();
			$pdo = $bdd->prepare("DELETE FROM utilisateur where mail = '$this->mail_user'");
			$pdo->execute();
			$count = $pdo->rowCount();
				if ($count>0)
				{
				echo utf8_decode('<script type="text/javascript">alert("La suppression du membre à bien été prise en compte");
											window.location.href ="../../index.php?page=admin";</script>');
				}
				else{
					echo utf8_decode('<script type="text/javascript">alert("La saisie du membre est incorrecte");
										window.location.href ="../../index.php?page=admin";</script>');
				}
		}
		
		function ajouterutilisateur()
		{
			$bdd = bdd();
			if($this->nom_user!=null && $this->prenom!=null && $this->adresse_user!=null && $this->code_postal_user!=null && $this->ville_user!=null && $this->tel_user!=null && $this->mdp!=null && $this->mail_user!=null && $this->role!=null)
				{
				$pdo = $bdd->prepare("INSERT INTO utilisateur  VALUES(NULL, :nom, :prenom, :adresse, :numero, :adresse_mail, :mdp, :role)");
				$pdo->bindValue(':nom', $this->nom_user, PDO::PARAM_STR);
				$pdo->bindValue(':prenom', $this->prenom, PDO::PARAM_STR);
				$pdo->bindValue(':adresse', $this->adresse_user." ".$this->code_postal_user." ".$this->ville_user, PDO::PARAM_STR);
				$pdo->bindValue(':numero', $this->tel_user, PDO::PARAM_INT);
				$pdo->bindValue(':adresse_mail', $this->mail_user, PDO::PARAM_STR);
				$pdo->bindValue(':mdp', $this->mdp, PDO::PARAM_STR);
				$pdo->bindValue(':role', $this->role, PDO::PARAM_STR);
				$pdo->execute();
				$count = $pdo->rowCount();
				if ($count != null)
				{
					echo utf8_decode('<script type="text/javascript">
							alert("Votre inscription à bien été prise en compte, Vous pouvez à présent vous connecter");
							window.location.href ="../index.php?page=accueil";</script>');					
				}
				else
				{
					echo utf8_decode('<script type="text/javascript">
							alert("Un problème est survenu veuillez contacter l\'administrateur");
							window.location.href ="../index.php?page=inscription";</script>');	
				}
			}
			else
			{
				echo '<script type="text/javascript">alert("Vous n\'avez pas rempli tous les champs");
													window.location.href ="../index.php?page=inscription";</script>';
			}
		}
		
function double_email($adresse_mail)
{
	$bdd = bdd();
	$pdo = $bdd->prepare("SELECT mail FROM utilisateur");
	$pdo->execute();
	while($selection = $pdo->fetch())
			{
			if($this->mail_user != $selection['mail'])
			{
				$double = true;
			}
			else
			{
				$double = false;
				echo $selection['mail'];
				break;
			}
			return $double;
		}
}

function VerifierNum($tel)
	{
	$motif ='`^0[1-7][0-9]{8}$`';
	if(preg_match($motif,$tel))
		{
		return $tel;
		}
		else
		{
		$tel = false;
		return $tel;
		}
	}

function VerifierMotDePasse($mdp, $conf)
	{
		if($mdp == $conf && strlen($mdp) > 3)
		{
		return sha1($mdp);
		}
		else
		{
		$mdp = false;
		return $mdp;
		}
	}	
						
function VerifierMail($mail)
{

	if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$mail))
	{
    return  $mail;
	}
	else
	{
	$mail = false;
	return $mail;	
	}
}

function Affiche()
{
	$bdd = bdd();
	$pdo = $bdd->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = $this->id_user");
	$pdo->execute();
	while ($resultat = $pdo->fetch(PDO::FETCH_OBJ))
	{
		return $resultat;
	}
}

function Modif()
		{
			$bdd = bdd();
			$id = $_SESSION['id'];
			$pdo = $bdd->prepare("UPDATE utilisateur SET $this->colonne = :data WHERE id_utilisateur = $id");
			$pdo->bindValue(':data', $this->data, PDO::PARAM_STR);
			$pdo->execute();
			$count = $pdo->rowCount();
			if ($count>0){
			echo utf8_decode('<script type="text/javascript">alert("La modification à bien été prise en compte");
										window.location.href ="../../index.php?page=page_client";</script>');
			}
			else{
				echo utf8_decode('<script type="text/javascript">alert("La saisie incorrecte.");
										window.location.href ="../../index.php?page=page_client";</script>');
			}
		}
function Historique()
{
	$bdd = bdd();
	$id = $_SESSION['id'];
	$pdo = $bdd->prepare("SELECT réservation.id_utilisateur, réservation.id_réservation, réservation.nbr_nuit, réservation.prix, réservation.date_arrivé, réservation.date_départ, nom_hotel, réservation.id_hotel, chambre.description FROM réservation JOIN hotel ON réservation.id_hotel = hotel.id_hotel JOIN chambre ON réservation.id_chambre = chambre.id_chambre WHERE réservation.id_utilisateur = $this->id_user");
	$pdo->execute();
	while ($resultat = $pdo->fetch(PDO::FETCH_OBJ))
	{
		echo '<tr><td>'.$resultat->id_réservation.'</td><td>'.$resultat->date_arrivé.'</td><td>'.$resultat->date_départ.'</td><td>'.$resultat->nom_hotel.'</td><td>'.$resultat->description.'</td><td>'.$resultat->nbr_nuit.'</td><td><a href="index.php?page=commentaire&id='.$resultat->id_hotel.'" >Laisser un commentaire</a></td><td>'.$resultat->prix.' €</td></tr>';
	}
}
function AjoutCommentaire()
{
	$bdd = bdd();
	$pdo = $bdd->prepare("INSERT INTO avis_client  VALUES(NULL, :id_utilisateur, :id_hotel, :pseudo, :note, :commentaire)");
				$pdo->bindValue(':id_utilisateur', $this->id_user, PDO::PARAM_INT);
				$pdo->bindValue(':id_hotel', $this->id_hotel, PDO::PARAM_INT);
				$pdo->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
				$pdo->bindValue(':note', $this->note, PDO::PARAM_INT);
				$pdo->bindValue(':commentaire', $this->commentaire, PDO::PARAM_STR);
				$pdo->execute();
				$count = $pdo->rowCount();
				if ($count != null)
				{
					echo '<script type="text/javascript">
							alert("Votre commentaire à bien été prit en compte");
							window.location.href ="../index.php?page=page_client";</script>';					
				}
				else
				{
					echo '<script type="text/javascript">
							alert("Un probleme est survenu veuillez contacter l\'administrateur");
							window.location.href ="../index.php?page=page_client";</script>';	
				}
}

function Modere()
		{
			$bdd = bdd();
			$pdo = $bdd->prepare("UPDATE avis_client SET $this->colonne = :data WHERE id_utilisateur = $id");
			$pdo->bindValue(':data', $this->data, PDO::PARAM_STR);
			$pdo->execute();
			$count = $pdo->rowCount();
			if ($count>0){
			echo utf8_decode('<script type="text/javascript">alert("La modification à bien été prise en compte");
										window.location.href ="../../index.php?page=page_client";</script>');
			}
			else{
				echo utf8_decode('<script type="text/javascript">alert("La saisie incorrecte.");
										window.location.href ="../../index.php?page=page_client";</script>');
			}
		}
}	
?>