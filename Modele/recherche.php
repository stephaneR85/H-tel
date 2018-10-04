<?php
require("connection.php");

	$bdd = bdd();
	$recherche = $_GET['champ'];
	$pdo = $bdd->prepare("SELECT nom_hotel FROM hotel WHERE nom_hotel LIKE :recherche ORDER BY nom_hotel");
	$pdo->bindValue(':recherche', '%' .$recherche. '%', PDO::PARAM_STR);
	$pdo->execute();
	$count = $pdo->rowCount();
		if($count == 0 )
			{
?>
			<p>Pas de résultats pour cette recherche</p>
<?php
			}
		else
			{
	
	
		while ($resultat = $pdo->fetch())
		{?>
			<a href="../index.php?nom=<?php echo $resultat['nom_hotel'];?>&page=hotel"><?php echo ( $resultat['nom_hotel'] );?></a><br>
		<?php
		}
			}
?>

