<?php
require("Modele/hotel.php");
$hotel = new hotel;
if(isset($_GET['datearrivee'])&& isset($_GET['datedepart']))
{
	$date_arrivee = $_GET['datearrivee'];
	$date_depart = $_GET['datedepart'];
	if(empty($date_arrivee) || empty($date_depart))
	{
		echo '<script type="text/javascript">alert("Veuillez renseigner les dates");</script>';
	}
	else
	{
	$arrivee = $hotel->form_date3($date_arrivee);
	$depart = $hotel->form_date3($date_depart);
	$date_actuel = date("Y/m/d");
	if(($arrivee > $date_actuel) && ($arrivee < $depart))
	{
		$arrivee = $hotel->form_date4($arrivee);
		$depart = $hotel->form_date4($depart);
		$_SESSION['arrivee'] = $arrivee;
		$_SESSION['depart'] = $depart;
	}
	else
	{
		echo '<script type="text/javascript">alert("Les dates saisies sont incorrectes");</script>';
	}
	}
}
if(isset($_GET['destroy']))
{
	unset($_SESSION['arrivee']);
	unset($_SESSION['depart']);
}	
$hotel->colonne = "nom_hotel";
$hotel->data = $nom_hotel;
$hotel->table = "hotel";
$row = $hotel->Affiche();
$chambre = hotel::load("chambre");
$chambre->id_hotel = $row->id_hotel;
$page = "hotel";
$valeur = "nom";
$data = $nom_hotel;
$dispo_hotel = $hotel->Hotel_Dispo($chambre->id_hotel);
$commentaire = new hotel;
$commentaire->table = "avis_client";
$commentaire->colonne = "id_hotel";
$commentaire->data = $row->id_hotel;
require("Vue/hotel.php");
?>
