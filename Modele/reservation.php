<?php 
require_once('connection.php');
class reservation
{
	public $id_utilisateur;
	public $id_hotel;
	public $id_chambre;
	public $date_arrivee;
	public $date_depart;
	public $prix_nuit;
	public $nbr_nuit;
	public $prix_total;
	public $email;
	public $prenom;
	public $nom;
	
	public function Affiche()
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT chambre.id_hotel, nombre, nom_hotel, chambre.description, prix_nuit FROM hotel JOIN chambre on hotel.id_hotel = chambre.id_hotel WHERE id_chambre = $this->id_chambre");
		$pdo->execute();
		while($row = $pdo->fetch(PDO::FETCH_OBJ))
		{
			return $row;
		}	
	}
	
	public function Enregistre()
	{
		$bdd = bdd();
			$pdo = $bdd->prepare("INSERT INTO réservation VALUES(NULL, :id_utilisateur, :id_hotel, :id_chambre, '$this->date_arrivee', '$this->date_depart', :nbr_nuit, :prix)");
			$pdo->bindValue(':id_utilisateur', $this->id_utilisateur, PDO::PARAM_INT);
			$pdo->bindValue(':id_hotel', $this->id_hotel, PDO::PARAM_INT);
			$pdo->bindValue(':id_chambre', $this->id_chambre, PDO::PARAM_INT);
			$pdo->bindValue(':nbr_nuit', $this->nbr_nuit, PDO::PARAM_INT);
			$pdo->bindValue(':prix', $this->prix, PDO::PARAM_INT);
			$pdo->execute();
			$count = $pdo->rowCount();
			if ($count>0){
			echo '<script type="text/javascript">alert("Votre réservation à bien été prise en compte");
										window.location.href ="../../index.php";</script>';
			}
			else{
				echo '<script type="text/javascript">alert("Un problème est survenu veuillez contacter l\'administrateur.");
										window.location.href ="../../index.php";</script>';
			}
	}
	
	public function Nbr_Reservation($id_chambre)
	{
		$bdd = bdd();
		$arrivee = $this->form_date($_SESSION['arrivee']);
		$depart = $this->form_date($_SESSION['depart']);
		$pdo = $bdd->prepare("SELECT count(id_réservation) as nbr FROM réservation WHERE réservation.id_chambre = $id_chambre AND $arrivee BETWEEN date_arrivé AND date_départ OR $depart BETWEEN date_arrivé AND date_départ"); 
		$pdo->execute();
			while($resultat = $pdo->fetch(PDO::FETCH_OBJ))
			{
				$nombre_de_reservation = $resultat->nbr;
			}
			return $nombre_de_reservation;
	}
	
	function form_date($date)
	{
	list($jour, $mois, $an) = explode("/", $date);
	return "$an/$mois/$jour";
	}
	
	function email()
	{
	require "class.phpmailer.php"; 
	require "class.smtp.php";
	$message = utf8_decode("Bonjour ".$this->prenom." ".$this->nom."\n 
				Nous vous remercions de la confiance que vous nous accordez.\n
				Votre réservation à bien été envoyée à l'etablissement.\n
				Cordialement l'equipe de hotel.fr.");
	$mail = new PHPmailer();         
	$mail->Host='smtp.gmail.com';
	$mail->SMTPAuth = false;
	$mail->From=('hotel@gmail.com'); 
	$mail->FromName= 'www.hotel.fr';
	$mail->AddAddress($this->email);   
	$mail->Subject='Confirmation commande';   
	$mail->Body= $message;      
	$mail->Send();
	$mail->SmtpClose();   
	unset($this->email); 	
	}
}
