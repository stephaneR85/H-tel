<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
	<head>
	</head>
	<body>
		<h1>Informations personnelles</h1>
		<table id="info_client" class="table table-bordered table-striped table-condensed">
			<tr>
				<td>nom :</td>
				<td><?php echo $row->nom_utilisateur?></td>	
			</tr>
			<tr>
				<td>prenom :</td>
				<td><?php echo $row->prenom_utilisateur?></td>
			</tr>
			<tr>
				<td>adresse :</td>
				<td><?php echo $row->adresse?></td>
				<td><a href="#" class="titre" id="1">Modifier</a></td>
			</tr>
			<tr>
				<td>numero de telephone :</td>
				<td><?php echo $row->num_tel?></td>
				<td><a href="#" class="titre" id="2">Modifier</a></td>
			</tr>
			<tr>
				<td>adresse mail :</td>
				<td><?php echo $row->mail?></td>
				<td><a href="#" class="titre" id="3">Modifier</a></td>
			</tr>
			<tr>
				<td>mot de passe :</td>
				<td>xxxx</td>
				<td><a href="#" class="titre" id="4">Modifier</a></td>
			</tr>
		</table>
		<div class="form" id="form1">
			<form class="form-inline" method="post" action="Controleur/page_client.php">
				<div class="form-group">
					<label for="text">Adresse : </label>
					<input class="form-control" type="text" id="adresse" name="adresse"/>
				</div>
				<div class="form-group">
					<label for="text">Code postal: </label>			
					<input class="form-control" type="number" id="cp" name="cp"/>
				</div>
				<div class="form-group">
					<label for="text">Ville : </label>
					<input class="form-control" type="text" id="ville" name="ville"/>
				</div>
				<button class="btn btn-default" type="submit">Valider</button>
			</form>
		</div>
		<div class="form" id="form2">
			<form class="form-inline" method="post" action="Controleur/page_client.php">
				<div class="form-group">
					<label for="text">Numero de telephone : </label>
					<input class="form-control" type="tel" id="num_tel" name="num_tel"/>
				</div>
				<button class="btn btn-default" type="submit">Valider</button>
			</form>
		</div>
		<div class="form" id="form3">
			<form class="form-inline" method="post" action="Controleur/page_client.php">
				<div class="form-group">
					<label for="text">Adresse mail : </label>
					<input class="form-control" type="email" id="adr_mail" name="adr_mail"/>
				</div>
				<button class="btn btn-default" type="submit">Valider</button>
			</form>
		</div>
		<div class="form" id="form4">
			<form class="form-inline" method="post" action="Controleur/page_client.php">
				<div class="form-group">
					<label for="text">Mot de passe : </label>
					<input class="form-control" type="text" id="mdp" name="mdp"/>
				</div>
				<div class="form-group">
					<label for="text">Confirmation : </label>
					<input class="form-control" type="text" id="conf" name="conf"/>
				</div>
				<button class="btn btn-default" type="submit">Valider</button>
			</form>
		</div>
		<H1>Historique de réservation</h1>
		<table class="table table-bordered table-striped table-condensed">
			<tr>
				<td>Numéro de réservation</td>
				<td>Date d'arrivée</td>
				<td>Date de départ</td>
				<td>Nom de l'hotel</td>
				<td>Chambre</td>
				<td>Nombre de nuits</td>
				<td></td>
				<td>Prix</td>
			</tr>
			<?php echo $user->Historique()?>
		</table>
	</body>
</html>
