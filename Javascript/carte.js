	$(document).ready(function() {
		$('#francemap').vectorMap({
		    map: 'france_fr',
			hoverOpacity: 0.5,
			hoverColor: "#90EE90",
			backgroundColor: "#ffffff",
			color: "#7CFC00",
			borderColor: "#000000",
			selectedColor: "#7CFC00",
			enableZoom: false,
			showTooltip: false,
		    onRegionClick: function(element, code, region)												
		    {
				location.href = 'index.php?page=selection&region='+region;
		    }
		});
	});