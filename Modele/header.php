<?php
function compte()
{
	if(isset($_SESSION['role']))
	{
		if($_SESSION['role'] == 'admin')
		{
			echo '<a href ="../index.php?page=admin">Page administrateur</a>';
			echo '<div class="form-group">
					<a href="../Controleur/deconnection.php">	
						<button id="boutton" class="pull-right btn btn-default">D&eacute;connexion</button></a></div>';
		}	
		else
		{
			echo '<a href ="../index.php?page=page_client">Mon compte</a>';
			echo '<div id="nom">Bonjour '.$_SESSION['prenom']." ".$_SESSION['nom'].'</div>'; 
			echo '<div class="form-group">
					<a href="../Controleur/deconnection.php">
						<button id="boutton" class="pull-right btn btn-default">D&eacute;connexion</button></a></div>';
		}
	}
	else 
	{
		echo '<form action="Controleur/auth.php" method="post">
				<a href="#" class="titre" id="1">
					<div class="form-group">
					<legend>Identifiez-vous</legend>
					</div></a>
				<div class="form" id="form1">
					<div class="form-group">
						<label for="text">Adresse mail: </label>
						<input type="email" class="form-control" id="adresse_mail" name="adresse_mail"/>
					</div>
					<div class="form-group">
						<label for="text">Mot de passe: </label>
						<input type="password" class="form-control" id="mdp" name="mdp"/>
					</div>
					<div class="form-group">
						<button id="boutton" class="pull-right btn btn-default">Valider</button>
					</div>
					<a href="../index.php?page=inscription">Inscrivez-vous</a>
				</div>
				</form>';
	}
}
?>