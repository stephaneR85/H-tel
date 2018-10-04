<?php 
function bdd()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=hotel;charset=utf8', 'root', '0000')
		or die("Impossible de se connecter au serveur "); 
		return $bdd;
	}
?>