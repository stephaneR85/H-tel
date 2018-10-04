<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
	<head>
		<?php include("Modele/header.php");?>
	</head>
	<body>
		<img id="img_header" src="Images/header.png"></img>
		<div id="compte"><?php compte();?></div>
		<div id="boutton_accueil"><?php if($title == "Accueil"){
						echo "";}
					else{echo ' <form action="index.php" method="GET">
									<input type="hidden" name="page" value="accueil"/>
									<input type="submit" id="boutton" class="form-control" value="Retour &agrave; l\'accueil"/></form> ';}?>
		</div>
		<div class="row">
			<div class="form-group">
				<form class="navbar-form navbar-left inline-form">					
					<input class="input-sm form-control" type="search" name="champ" id="champ"  onblur="affiche();" onfocus="efface();" value="Rechercher un hôtel"/>
				</form>
			</div>
		</div>
		<div id="results"></div>
	</body>
	<script type="text/javascript" src="Javascript/jquery.js"></script>
	<script type="text/javascript" src="Javascript/jquery-ui.min.js"></script>
	<script type="text/javascript" src="Javascript/form.js"></script>
	<script type="text/javascript" src="Javascript/footer.js"></script>
	<script type="text/javascript" src="Javascript/recherche.js"></script>
</html>

