<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
</head>
<body>

<form id="panier" type="GET" action="Controleur/reservation.php">
<table class="table table-bordered table-striped table-condensed">
	<tr>
		<td><b>Votre Réservation</b></td>
	</tr>
	<tr>
		<td>Nom de l'hôtel</td>
		<td>Date d'arrivée</td>
		<td>Date de départ</td>
		<td>Nombre de nuits</td>
		<td>Prix nuitée</td>
		<td>Prix Total</td>
	</tr>
	<tr>
		<td><?php echo $row->nom_hotel.'<br>'.$row->description;?></td>
		<td><?php echo $reservation->depart = $_SESSION['arrivee']?></td>
		<td><?php echo $reservation->arrivee = $_SESSION['depart']?></td>
		<td><?php echo $reservation->nbr_nuit?></td>
		<td><?php echo $row->prix_nuit.' €'?></td>
		<td><?php echo $reservation->prix_total?> €</td>
	</tr>
</table>
</form>
	<div>Date: <?php echo date("d-m-Y");?></div>
	
	<div id="validation"><a href="index.php?page=validation"><button id="boutton" class="pull-right btn btn-default">Valider ma réservation</button></a></div>
</body>
</html>
