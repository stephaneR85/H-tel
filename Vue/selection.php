<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html>
	<head>
	</head>
	<body>
		<div><?php $hotel->SelectDates($page, $valeur, $data);?></div>
		<div class="jumbotron">
			<section class ="row">
			<?php $hotel->read();?>
			</section>
		</div>
	</body>
	<script> 
		$(function() { $( "#datearrivee" ).datepicker();});
		$(function() { $( "#datedepart" ).datepicker();});
	</script>
</html>