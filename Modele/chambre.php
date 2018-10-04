<?php
require_once('connection.php');

class chambre extends hotel
{
	public $id_hotel;
	public $id_chambre;
	public $nombre;
	public $nbr_places;
	public $des;
	public $prix_nuit;
	public $photo;
	public $description;
	
			
	
	public function AfficheChambre()
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT * FROM chambre WHERE id_hotel = $this->id_hotel");
		$pdo->execute();
		$count = $pdo->rowCount();
		if ($count == 0)
			{
			echo 'Pas de chambre disponible pour le moment';
			}
		while($row = $pdo->fetch(PDO::FETCH_OBJ))
		{
			if(isset($_SESSION['arrivee']) && isset($_SESSION['depart']))
			{
				$nombre_de_reservation = $this->Nbr_Reservation($row->id_chambre);
				$dispo = $row->nombre - $nombre_de_reservation;
				if($dispo>0)
				{
				echo '<img id="img" src="'.$row->photo.'"/><div id="description">'.$row->description.'</div><div id="prix_chb">'.$row->prix_nuit.' €</div> 
				<form action="index.php" method="GET">
					<input type="submit" class="form-control" id="boutton" value="réserver"/>
					<input type="hidden" value="'.$row->id_chambre.'" name="id_chambre"/>
					<input type="hidden" value="reservation" name="page"/>
				</form>';
				echo '<div id="dispo">Nombre de chambres disponibles : '.$dispo.'</div>';
				}
				else
				{
					echo '<img id="img" src="'.$row->photo.'"/><div id="description">'.$row->description.'</div><div id="prix_chb">'.$row->prix_nuit.' €</div>'; 
					echo '<div id="non_dispo">Pas de chambre disponible pour cette période</div>';
				}
			}
			else
			{
				echo '<img id="img" src="'.$row->photo.'"/><div id="description">'.$row->description.'</div><div id="prix_chb">'.$row->prix_nuit.' €</div>';
				echo '<div id="dispo">Selectionnez des dates pour voir les disponibilités</div>';
			}
		}
	}

	public function Nbr_Reservation($id_chambre)
	{
		$bdd = bdd();
		$arrivee = $this->form_date($_SESSION['arrivee']);
		$depart = $this->form_date($_SESSION['depart']);
		$pdo = $bdd->prepare("SELECT count(id_réservation) as nbr FROM réservation WHERE réservation.id_chambre = $id_chambre AND ('$arrivee' BETWEEN date_arrivé AND date_départ OR '$depart' BETWEEN date_arrivé AND date_départ)"); 
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
	
	function AjoutChambre()
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("INSERT INTO chambre VALUES(NULL, :id_hotel, :nombre, :nbr_places, :description, :prix_nuit, :photo)");
		$pdo->bindValue(':id_hotel', $this->id_hotel, PDO::PARAM_INT);
		$pdo->bindValue(':description', $this->des, PDO::PARAM_STR);
		$pdo->bindValue(':nombre', $this->nombre, PDO::PARAM_INT);
		$pdo->bindValue(':nbr_places', $this->nbr_places, PDO::PARAM_INT);
		$pdo->bindValue(':prix_nuit', $this->prix_nuit, PDO::PARAM_INT);
		$pdo->bindValue(':photo', $this->photo, PDO::PARAM_STR);
	
			$pdo->execute();
			$count = $pdo->rowCount();
			if ($count>0){
			echo utf8_decode('<script type="text/javascript">alert("L\'ajout de la chambre à bien été prit en compte");
										window.location.href ="../../index.php?page=admin";</script>');
			}
			else{
				echo utf8_decode('<script type="text/javascript">alert("La saisie de la chambre est incorrecte.");
										window.location.href ="../../index.php?page=admin";</script>');
				echo "\nPDO::errorInfo():\n";
				print_r($pdo->errorInfo());
			}
		}

	public function IdChambre()
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT id_chambre FROM chambre WHERE id_hotel = :id AND description = :description");
		$pdo->bindValue(':id', $this->id_hotel, PDO::PARAM_INT);
		$pdo->bindValue(':description', $this->description, PDO::PARAM_STR);
		$pdo->execute();
		while($row = $pdo->fetch(PDO::FETCH_OBJ))
		{
			return $row;
		}
	}
	
	
	
	
	
}