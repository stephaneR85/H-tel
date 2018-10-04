<?php 
if(isset($_SESSION['arrivee']) && isset($_SESSION['depart']))
{
	require('Modele/reservation.php');
	$reservation = new reservation;
	$reservation->id_chambre = $_GET['id_chambre'];
	$_SESSION['id_chambre'] = $reservation->id_chambre;
	$row = $reservation->Affiche();
	$reservation->nbr_nuit = $_SESSION['depart'] - $_SESSION['arrivee'];
	$reservation->prix_total = $reservation->nbr_nuit * $row->prix_nuit;
	require('Vue/reservation.php');
}
else
{
	echo '<script type="text/javascript">alert("Vous devez saisir des dates.");
										window.location.href ="../../index.php";</script>';
}

?>