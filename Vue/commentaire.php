<form class="form-inline" method="GET" action="index.php">
	<div class="form-group">
		<label for="text">Note : </label>
		<select class="form-control" type="select" name="note"/>
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
		<label for="text">Pseudo : </label>
		<input class="form-control" name="pseudo" type="text"/>
		<label for="text">Commentaire : </label>
		<input class="form-control" name="commentaire" type="text"/>
		<input type="hidden" name="id" value=".<?php echo $id_hotel?>."/>
		<input type="hidden" name="page" value="commentaire"/>
	</div>
	<button class="btn btn-default" type="submit">Valider</button>
</form>
	