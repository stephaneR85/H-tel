$(document).ready(function()
{
	var id;
	$('.form').hide();
	$(".titre").click(function(){
    id = (this.id);
	id='form'+id;
	$('#'+id).toggle(100);
});
});

