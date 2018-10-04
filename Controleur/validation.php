<?php

	if(isset($_SESSION['id']))
	{
		require('Modele/reservation.php');
		$reservation = new reservation;
		$reservation->id_chambre = $_SESSION['id_chambre'];
		$row = $reservation->Affiche();
		$reservation->nbr_nuit = $_SESSION['depart'] - $_SESSION['arrivee'];
		$reservation->prix = $reservation->nbr_nuit * $row->prix_nuit;
		$reservation->id_hotel = $row->id_hotel;
		$reservation->date_arrivee = $reservation->form_date($_SESSION['arrivee']);
		$reservation->date_depart = $reservation->form_date($_SESSION['depart']);
		$reservation->prix_nuit = $row->prix_nuit;
		$reservation->id_utilisateur = $_SESSION['id'];
		$reservation->id_utilisateur = $_SESSION['id'];
		$dispo = $row->nombre - $reservation->Nbr_Reservation($reservation->id_chambre);
		if($dispo > 0)
		{
			$reservation->email = $_SESSION['email'];
			$reservation->prenom = $_SESSION['prenom'];
			$reservation->nom = $_SESSION['nom'];
			$reservation->email();
			$reservation->Enregistre();
			session_destroy();
		}
		else
		{
			echo '<script type="text/javascript">alert("Il n\'y a plus de place pour cette chambre");
										window.location.href ="../../index.php";</script>';
		}
	}
	else 
	{
		echo '<script type="text/javascript">alert("Veuillez vous identifier pour réserver.");
										window.location.href ="../../index.php?page=reservation&id_chambre='.$_SESSION['id_chambre'].'";</script>';
	}
	function form_date($date)
	{
	list($jour, $mois, $an) = explode("/", $date);
	return "$an/$mois/$jour";
	}
?>