<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
	<head>
	</head>
	<body>
		<legend>Inscription nouveau client</legend>
			<form class="col-lg-6"method= 'POST' action= '../Controleur/inscription.php'>
				<label>Nom</label><input class="form-control" type='text' name='nom'/></p><br>
				<label>Prénom</label><input class="form-control" type='text' name='prenom'/></p><br>
				<label>Adresse</label><input class="form-control" type='text' name='adresse'/></p><br>
				<label>Code postal<input class="form-control" type='number' name='cp'/></p><br>
				<label>Ville<input class="form-control" type='text' name='ville'/></p><br>
				<label>Numéro de téléphone<input class="form-control" type='tel' name= 'num_tel'/></p><br>
				<label>Adresse mail<input class="form-control" type='email' name= 'adr_mail'/></p><br>
				<label>Mot de passe<input class="form-control" type='password' name= 'mot_de_passe'/></p><br>
				<label>Confirmation mot de passe<input class="form-control" type='password' name= 'confirmation'/></p><br>
				<input class="form-control" type='submit' value='valider'/>
			</form>
	</body>
</html>