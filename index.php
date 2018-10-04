<?php
if (isset($_GET["page"]))
	{
    $page = $_GET["page"];
	session_start();
	}
else 
	{
	$page = "accueil";
	}
    switch ($page)
    {
        case "page_client":
            $title = "Page_client";
			if(isset($_GET['id']))
			{
				$id_utilisateur = $_GET['id'];
			}
            $include = "Controleur/page_client.php";
            break;
		case "selection":
			$region = $_GET['region'];
            $title = "hôtels en ".$region;
            $include = "Controleur/selection.php";
            break;
        case "hotel":
			$title = "hotel";
			$nom_hotel = $_GET['nom']; 
            $include = "Controleur/hotel.php";
            break;
		case "admin":
			$title = "admin";
			$include = "Controleur/admin.php";
			break;
		case "inscription":
			$title = "inscription";
			$include = "Controleur/inscription.php";
			break;
		case "commentaire":
			$title = "commentaire";
			$id_hotel = $_GET['id'];
			$include = "Controleur/commentaire.php";
			break;
		case "accueil":
            $title = "Accueil";
            $include = "Vue/accueil.php";
            break;	
		case "reservation":
			$title = "Reservation";
			$include= "Controleur/reservation.php";
			break;
		case "validation":
			$title = "Validation";
			$include= "Controleur/validation.php";
			break;
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="Style/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="Style/index.css">
		<link rel="stylesheet" type="text/css" href="Style/jquery-ui.min.css">
		<title><?php echo $title;?></title>
	</head>
	<body>
		<div id="header">
			<?php require("Vue/header.php");?>
		</div>
	<div id="content">
		<div id="main">
			<?php if (isset($include)) require_once $include;?>
		</div>
		<div class="footer">
			<?php require('Vue/footer.php');?>
		</div>
	</div>
	</body>
</html>