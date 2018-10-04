<?php
require_once('connection.php');

class hotel 
{
	public $identifiant;
	public $id;
	public $nom;
	public $description;
	public $adresse;
	public $ville;
	public $region;
	public $cp;
	public $tel;
	public $nbr_chambre;
	public $photo1;
	public $photo2;
	public $photo3;
	public $colonne;
	public $data;
	public $table;
	
	
	function Hotel_Dispo($id_hotel)
	{
		if(isset($_SESSION['arrivee']) && isset($_SESSION['depart']))
		{
			
			$arrivee = $this->form_date2($_SESSION['arrivee']);
			$depart = $this->form_date2($_SESSION['depart']);
			$bdd = bdd();
			$pdo = $bdd->prepare("SELECT count(id_réservation) AS nb_réservation, id_hotel FROM réservation WHERE id_hotel = $id_hotel AND ('$arrivee' BETWEEN date_arrivé AND date_départ OR '$depart' BETWEEN date_arrivé AND date_départ)");
			$pdo->execute();
			while($row = $pdo->fetch(PDO::FETCH_OBJ))
			{
				$this->colonne = "id_hotel";
				$this->data = $id_hotel;
				$res = $this->Affiche();
				$nbr_chambre = $res->nbr_chambre;
				$nb_res = $row->nb_réservation;
				$dispo = $nbr_chambre - $nb_res;
				$disponibilite = 'Chambre disponible : '.$dispo;
			}
		}
		else
		{
			$disponibilite = " ";
		}
		return $disponibilite;
	}
	public function read()
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT * FROM hotel WHERE $this->colonne = :data"); 
		$pdo->bindValue(':data', $this->data, PDO::PARAM_STR);
		$pdo->execute();
		$count = $pdo->rowCount();
		if ($count == 0)
		{
			echo utf8_decode('<script type="text/javascript">alert("Nous n\'avons pas d\'offre dans cette region");
										window.location.href ="../../index.php?page=accueil";</script>');
		}
		else
		{
			while($selection = $pdo->fetch(PDO::FETCH_OBJ))
			{
				$dispo = $this->Hotel_Dispo($selection->id_hotel);
				$prix = $bdd->query("SELECT prix_nuit FROM chambre WHERE id_hotel = $selection->id_hotel")->fetch(); 
				echo '<div id="selection"><img id="img_hotel" src="'. $selection->photo.'"/><a href="../index.php?nom='.$selection->nom_hotel.'&page=hotel"><div id="nom_hotel">'.$selection->nom_hotel.'</div></a>
				<div id="prix">'.$prix[0].' €</div>'.$dispo.'</div>';
				
			}
		}
		
	}
	
	public function Affiche()
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT * FROM hotel WHERE $this->colonne = :data OR $this->colonne = :data2");
		$pdo->bindValue(':data', $this->data, PDO::PARAM_STR);
		$pdo->bindValue(':data2', $this->data, PDO::PARAM_INT);
		$pdo->execute();
		while($row = $pdo->fetch(PDO::FETCH_OBJ))
		{
			return $row;
		}
		if(!$pdo)
		{
			echo '<script type="text/javascript">alert("La saisie est incorrecte");
										window.location.href ="../../index.php?page=admin";</script>';
		}
	}
	
	function ListHotel()
		{
			$bdd = bdd(); 
			$pdo = $bdd->prepare("SELECT nom_hotel FROM hotel");
			$pdo->execute();

			while ($resultat = $pdo->fetch(PDO::FETCH_OBJ))
				{
				echo '<li><a href="../index.php?page=hotel&nom='.$resultat->nom_hotel.'">'.$resultat->nom_hotel.'</a></li>';
				}
		}
		
		function SelectHotel()
		{
			$bdd = bdd(); 
			$pdo = $bdd->prepare("SELECT nom_hotel FROM hotel");
			$pdo->execute();

			while ($resultat = $pdo->fetch(PDO::FETCH_OBJ))
				{
				echo '<option>'.$resultat->nom_hotel.'</option>';
				}
		}
	
	
	function AjoutHotel()
		{
			$bdd = bdd();
			$pdo = $bdd->prepare("INSERT INTO hotel VALUES(NULL, :nom, :description, :adresse, :ville, :region, :cp, :tel, :nbr_chambre, :photo1, :photo2, :photo3)");
			$pdo->bindValue(':nom', $this->nom, PDO::PARAM_STR);
			$pdo->bindValue(':description', $this->description, PDO::PARAM_STR);
			$pdo->bindValue(':adresse', $this->adresse, PDO::PARAM_STR);
			$pdo->bindValue(':ville', $this->ville, PDO::PARAM_STR);
			$pdo->bindValue(':region', $this->region, PDO::PARAM_STR);
			$pdo->bindValue(':cp', $this->cp, PDO::PARAM_INT);
			$pdo->bindValue(':tel', $this->tel, PDO::PARAM_STR);
			$pdo->bindValue(':nbr_chambre', $this->nbr_chambre, PDO::PARAM_INT);
			$pdo->bindValue(':photo1', $this->photo1, PDO::PARAM_STR);
			$pdo->bindValue(':photo2', $this->photo2, PDO::PARAM_STR);
			$pdo->bindValue(':photo3', $this->photo3, PDO::PARAM_STR);
			$pdo->execute();
			$count = $pdo->rowCount();
			if ($count>0){
			echo utf8_decode('<script type="text/javascript">alert("L\'ajout de l\'hôtel à bien été prit en compte");
										window.location.href ="../../index.php?page=admin";</script>');
			}
			else{
				echo utf8_decode('<script type="text/javascript">alert("La saisie de l\'hôtel est incorrecte.");
										window.location.href ="../../index.php?page=admin";</script>');
			}
		}

	function Sup()
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("DELETE FROM $this->table WHERE $this->colonne = :data1 OR $this->colonne = :data2");
		$pdo->bindValue(':data1', $this->data, PDO::PARAM_STR);
		$pdo->bindValue(':data2', $this->data, PDO::PARAM_INT);
		$pdo->execute();
		$count = $pdo->rowCount();
			if ($count>0)
			{
			echo utf8_decode('<script type="text/javascript">alert("La suppression à bien été prise en compte");
										window.location.href ="../../index.php?page=admin";</script>');
			}
			else
			{
				echo utf8_decode('<script type="text/javascript">alert("La saisie est incorrecte");
								window.location.href ="../../index.php?page=admin";</script>');
			}
	}
	
	static function load($name)
	{
		require("$name.php");
		return new $name();
	}
	
	function Modif()
		{
			$bdd = bdd();
			$pdo = $bdd->prepare("UPDATE $this->table SET $this->colonne = :data WHERE $this->identifiant = $this->id");
			$pdo->bindValue(':data', $this->data, PDO::PARAM_STR);
			$pdo->execute();
			$count = $pdo->rowCount();
			if ($count>0){
			echo utf8_decode('<script type="text/javascript">alert("La modification à bien été prise en compte");
										window.location.href ="../../index.php?page=admin";</script>');
			}
			else{
				echo utf8_decode('<script type="text/javascript">alert("La saisie incorrecte.");
										window.location.href ="../../index.php?page=admin";</script>');
			}
		}

	function SelectDates($page, $valeur, $data)
	{
	 if(!isset($_SESSION['arrivee']) || !isset($_SESSION['depart']))
		{
		 echo '
			<h3>Sélectionnez vos dates</h3><br>
			<form class="form-inline" action="index.php" method="GET">
				<p>
					<label>Date d\'arrivée : </label> <input type="text" id="datearrivee" name="datearrivee"/> 
					<label>Date de départ : </label> <input type="text" id="datedepart" name="datedepart"/>
					<input type="hidden" value="'.$data.'" name="'.$valeur.'"/>
					<input type="hidden" value="'.$page.'" name="page"/>
					<input type="submit" class="form-control" id="boutton_valider" value="Valider"/>
				</p>
			</form>';
		}
		else
		{
			echo '<h3>Dates de votre séjour : du '.$_SESSION['arrivee'].' au '.$_SESSION['depart'].'</h3>
			<form method="GET" action="index.php">
				<input type="submit" class="form-control" id="changer_le_dates" value="Changer de dates"/>
				<input type="hidden" name="'.$valeur.'" value="'.$data.'"/>
				<input type="hidden" name="page" value="'.$page.'"/>
				<input type="hidden" name="destroy" value="destroy"/>
			</form>';
		}
	}
	
	function form_date($date)
	{
	list($mois, $jour, $an) = explode("/", $date);
	return "$jour/$mois/$an";
	}
	
	function form_date2($date)
	{
	list($jour, $mois, $an) = explode("/", $date);
	return "$an/$mois/$jour";
	}
	
	function form_date3($date)
	{
	list($mois, $jour, $an) = explode("/", $date);
	return "$an/$mois/$jour";
	}
	function form_date4($date)
	{
	list($an, $mois, $jour) = explode("/", $date);
	return "$jour/$mois/$an";
	}
	
	function Commentaire()
	{
		$bdd = bdd();
		$pdo = $bdd->prepare("SELECT * FROM $this->table WHERE $this->colonne = :data"); 
		$pdo->bindValue(':data', $this->data, PDO::PARAM_INT);
		$pdo->execute();
		$count = $pdo->rowCount();
		if ($count == 0)
		{
			echo "Pas encore de commentaire pour cet hôtel";
		}
		else
		{
			echo '<tr><td><b>Réference</b></td><td><b>Pseudo<b></td><td><b>Note</b></td><td><b>Commentaire</b></td></tr>';
			while($row = $pdo->fetch(PDO::FETCH_OBJ))
			{
				echo '<tr><td>'.$row->id_avis_client.'</td><td>'.$row->pseudo.'</td><td>'.$row->note.'/5</td><td>'.$row->commentaire.'</td></tr>';
			}
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
}
?>