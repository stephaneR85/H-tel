<?php	
		if(isset($_POST['ajout_hotel']))
		{
			require("../Modele/hotel.php");
			$hotel = new hotel;
			$hotel->nom = $_POST['ajout_hotel'];
			$hotel->description = $_POST['description']; 
			$hotel->adresse = $_POST['adresse'];
			$hotel->ville = $_POST['ville'];
			$hotel->region = $_POST['region']; 
			$hotel->cp = (int)$_POST['cp'];
			$tel = $_POST['tel'];
			$hotel->nbr_chambre = (int)$_POST['nbr_chambre'];
			$hotel->photo1 = $_POST['photo1'];
			$hotel->photo2 = $_POST['photo2'];
			$hotel->photo3 = $_POST['photo3'];
			$numtel = $hotel->VerifierNum($tel);
			if($numtel == false)
			{
				echo utf8_decode('<script type="text/javascript">alert("Le format de téléphone saisi est incorrecte.");
										window.location.href ="../../index.php?page=admin";</script>');
			}
			else
			{
				$hotel->tel = $numtel;
				$hotel->AjoutHotel();
			}
		}
		if(isset($_POST['ajout_chambre']))
		{
			require("../Modele/hotel.php");
			$hotel = new hotel;
			$hotel->colonne = "nom_hotel";
			$hotel->data = $_POST['ajout_chambre'];
			$row = $hotel->Affiche();
			$id_hotel = $row->id_hotel;
			$chambre = hotel::load("chambre");
			$chambre->id_hotel = $id_hotel;
			$chambre->des = $_POST['des']; 
			$chambre->nombre = $_POST['nbr'];
			$chambre->nbr_places = $_POST['nbr_place'];
			$chambre->prix_nuit = $_POST['prix_nuit']; 
			$chambre->photo = $_POST['photo'];
			$chambre->AjoutChambre();
			
		}
		if(isset($_POST['SupHotel']))
		{
			require("../Modele/hotel.php");
			$hotel = new hotel;
			$data = $_POST['SupHotel'];
			$hotel->data = $data;
			$hotel->colonne = "nom_hotel";
			$row = $hotel->Affiche();
			$hotel->data = $row->id_hotel;
			$hotel->colonne = "id_hotel";
			$hotel->table = "chambre";
			$hotel->Sup();
			$hotel->data = $data;
			$hotel->colonne = "nom_hotel";
			$hotel->table = "hotel";
			$hotel->Sup();
		}
		if(isset($_POST['mail_user']))
		{
			require("../Modele/user.php");
			$SupUser = new user;
			$SupUser->mail_user = $_POST['mail_user'];
			$SupUser->Sup_User();
		}
		if(isset($_POST['ModifHotel']))
		{
			require("../Modele/hotel.php");
			$hotel = new hotel;
			$hotel->data = $_POST['ModifHotel'];
			$hotel->identifiant = "id_hotel";
			$hotel->colonne = "nom_hotel";
			$row = $hotel->Affiche();
			$hotel->id = $row->id_hotel;
			$hotel->colonne = $_POST['colonne'];
			$hotel->data = $_POST['valeur'];
			$hotel->table = "hotel";
			$hotel->Modif();
		}
		if(isset($_POST['ModifChambre']))
		{
			require("../Modele/hotel.php");
			$hotel = new hotel;
			$hotel->data = $_POST['ModifChambre'];
			$hotel->colonne = "nom_hotel";
			$row = $hotel->Affiche();
			$id_hotel = $row->id_hotel;
			$chambre = hotel::load("chambre");
			$chambre->id_hotel = $id_hotel;
			$chambre->description = $_POST['description'];
			$hotel->identifiant = "id_chambre";
			$res = $chambre->IdChambre();
			$hotel->id = $res->id_chambre;
			$hotel->colonne = $_POST['colonne'];
			$hotel->data = $_POST['valeur'];
			$hotel->table = "chambre";
			$hotel->Modif();
		}
		if(isset($_POST['SupChambre']))
		{
			require("../Modele/hotel.php");
			$hotel = new hotel;
			$hotel->data = $_POST['SupChambre'];
			$hotel->colonne = "nom_hotel";
			$row = $hotel->Affiche();
			$id_hotel = $row->id_hotel;
			$chambre = hotel::load("chambre");
			$chambre->id_hotel = $id_hotel;
			$chambre->description = $_POST['description'];
			$res = $chambre->IDChambre();
			$hotel->data = $res->id_chambre;
			$hotel->table = "chambre";
			$hotel->colonne = "id_chambre";
			$hotel->Sup();
		}
		if(isset($_POST['commentaire']))			
		{
			require("../Modele/hotel.php");
			$hotel = new hotel;
			$hotel->table = "avis_client";
			$hotel->data = $_POST['commentaire'];
			$hotel->colonne = "commentaire";
			$hotel->identifiant = "id_avis_client";
			$hotel->id = $_POST['ref'];
			$hotel->Modif();
		}
		else
		{	if(isset($_SESSION['nom']) && $_SESSION['email'] == "admin@gmail.com")
			{
				require("Modele/hotel.php");
				require("Modele/user.php");
				$ListHotel = new hotel;
				$ListUser = new user;
				require("Vue/admin.php");
			}
			else
			{
				echo "Vous n'etes pas autorisé à accéder à cette page.";
			}
		}
		
?> 