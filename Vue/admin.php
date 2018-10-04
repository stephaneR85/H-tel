<html>
	<head>
	</head>
	<body>
		<div class="alert span1 alert-info">
			<strong>Choississez une action : </strong>
		</div>
		<div class="col-lg-12"><a href="#"class="titre" id="1">Ajout d'un h&ocirc;tel</a></div>
		<div class="form" id="form1">
			<div class="form-group">
				<form class="col-lg-6" method= 'POST' action= '../Controleur/admin.php'>
					<label>Nom de l'h&ocirc;tel</label><input class="form-control" type='text' name='ajout_hotel'/>
					<label>Description</label><input class="form-control" type='text' name='description'/>
					<label>Adresse</label><input class="form-control" type='text' name='adresse'/>
					<label>Ville</label><input class="form-control" type='text' name='ville'/>
					<label>R&eacute;gion</label><select class="form-control" type='text' name='region'>
						<option>Alsace</option>
						<option>Aquitaine</option>
						<option>Auvergne</option>
						<option>Basse-Normandie</option>
						<option>Bretagne</option>
						<option>Bourgogne</option>
						<option>Centre</option>
						<option>Champagne-Ardenne</option>
						<option>Corse</option>
						<option>Franche-Comté</option>
						<option>Haute-Normandie</option>
						<option>Île-de-France</option>
						<option>Languedoc-Roussillon</option>
						<option>Limousin</option>
						<option>Lorraine</option>
						<option>Midi-Pyrénées</option>
						<option>Nord-Pas-de-Calais</option>
						<option>Pays de la Loire</option>
						<option>Picardie</option>
						<option>Provence-Alpes-Côte d'Azur</option>
						<option>Poitou-Charentes</option>
						<option>Rhône-Alpes</option>
					</select>
					<label>Code postal</label><input class="form-control" type='number' name='cp'/>
					<label>Numero de t&eacute;lephone</label><input class="form-control" type='text' name= 'tel'/>
					<label>Nombre de chambre</label><input class="form-control" type='number' name='nbr_chambre'/>
					<label>Photo 1</label><input class="form-control" type='text' name='photo1'/>
					<label>Photo 2</label><input class="form-control" type='text' name='photo2'/>
					<label>Photo 3</label><input class="form-control" type='text' name='photo3'/>
					<input class="form-control" type='submit' value='valider'/>
				</form>
			</div>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="2">Ajout chambre</a></div>
		<div class="form" id="form2">
			<form class="col-lg-6" method='POST' action='../Controleur/admin.php'>
				<label>Nom de l'h&ocirc;tel</label><select class="form-control" type='text' name='ajout_chambre'>
					<?php echo $ListHotel->SelectHotel();?>
				</select>
				<label>Description</label><input class="form-control" type='text' name="des"/> 
				<label>Nombre de chambres</label><input class="form-control" type="number" name="nbr"/>
				<label>Nombre de places</label><input class="form-control" type="number" name='nbr_place'/>
				<label>Prix nuit</label><input class="form-control" type="text" name= 'prix_nuit'/> 
				<label>Photo</label><input class="form-control" type="text" name='photo'/>			
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="3">Modifier un h&ocirc;tel</a></div>
		<div class="form" id="form3">
			<form class="col-lg-6" method='POST' action='../Controleur/admin.php'>
				<label>Nom de l'h&ocirc;tel</label><select class="form-control" type='text' name='ModifHotel'>
					<?php echo $ListHotel->SelectHotel();?>
				</select> 
				<label>Nom de la colonne</label><select class="form-control" type='text' name='colonne'>
					<option>id_hotel</option>
					<option>nom_hotel</option>
					<option>description</option>
					<option>adresse</option>
					<option>ville</option>
					<option>region</option>
					<option>code_postal</option>
					<option>num_tel</option>
					<option>nbr_chambre</option>
					<option>photo</option>
					<option>photo2</option>
					<option>photo3</option>
				</select>
				<label>Nouvelle valeur</label><input class="form-control" type='text' name='valeur'/>
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="4">Modifier une chambre</a></div>
		<div class="form" id="form4">
			<form class="col-lg-6" method='POST' action='../Controleur/admin.php'>
				<label>Nom de l'h&ocirc;tel</label><select class="form-control" type='text' name='ModifChambre'>
					<?php echo $ListHotel->SelectHotel();?>
				</select>  
				<label>Description de la chambre</label><input class="form-control" type='text' name='description'/>
				<label>Nom de la colonne</label><select class="form-control" type='text' name='colonne'>
					<option>id_chambre</option>
					<option>id_hotel</option>
					<option>nombre</option>
					<option>nbr_places</option>
					<option>description</option>
					<option>prix_nuit</option>
					<option>photo</option>
				</select>
				<label>Nouvelle valeur</label><input class="form-control" type='text' name='valeur'/>
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="5">Suppression d'un h&ocirc;tel</a></div>
		<div class="form" id="form5">
			<form class="col-lg-6" method='POST' action='../Controleur/admin.php'>
				<label>Nom de l'h&ocirc;tel</label><select class="form-control" type='text' name='SupHotel'>
					<?php echo $ListHotel->SelectHotel();?>
				</select> 
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="6">Suppression d'une chambre</a></div>
		<div class="form" id="form6">
			<form class="col-lg-6" method='POST' action='../Controleur/admin.php'>
				<label>Nom de l'h&ocirc;tel</label><select class="form-control" type='text' name='SupChambre'>
					<?php echo $ListHotel->SelectHotel();?>
				</select>  
				<label>Description</label><input class="form-control" type='text' name='description'/>
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="7">Suppression d'un membre</a></div>
		<div class="form" id="form7">
			<form class="col-lg-6" method='POST' action='../Controleur/admin.php'>
				<label>Adresse mail du membre</label><input class="form-control" type='email' name='mail_user'/>
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="8">Mod&eacute;ration commentaires</a></div>
		<div class="form" id="form8">
			<form class="col-lg-6" method='POST' action='../Controleur/admin.php'>
				<label>Réference du commentaire</label><input class="form-control" type='text' name='ref'/>
				<label>Texte</label><input class="form-control" type='text' name='commentaire'/>
				<input class="form-control" type='submit' value='valider'/>
			</form>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="9">Liste des membres</a></div>
		<div class="form" id="form9">
			<ul>
				<div id="list"><?php echo $ListUser->ListUser();?></div>
			</ul>
		</div>
		<div class="col-lg-12"><a href="#" class="titre" id="10">Liste des h&ocirc;tels</a></div>
		<div class="form" id="form10">
			<ul>
				<div id="liste"><?php echo $ListHotel->ListHotel();?></div>
			</ul>
		</div>
	</body>
</html>