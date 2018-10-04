<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<div class="resultat">
			<h1><?php echo $row->nom_hotel.'<br>';?></h1>
			<img id="photo" src="<?php echo $row->photo;?>"/>
			<div id="photo_2" class="col-sm-12">
				<img id="img" src="<?php echo $row->photo2;?>"/>
				<img id="img" src="<?php echo $row->photo3;?>"/><br>
			</div>
			<p><?php echo $row->description;?></p>			
			<div><?php $hotel->SelectDates($page, $valeur, $data);?></div>
		</div>
		<h2>Chambres disponibles</h2>
		<?php echo $chambre->AfficheChambre();?>
		<div id="com">
			<h3>Commentaires des clients</h3>
			<table class="table table-bordered table-striped table-condensed">
				<?php echo $commentaire->commentaire();?>
			</table>
		</div>
	</body>
	<script> 
		$(function() { $( "#datearrivee" ).datepicker();});
		$(function() { $( "#datedepart" ).datepicker();});
	</script>
</html>
