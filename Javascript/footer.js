$(document).ready(function () {
    if (parseInt($(window).height()) == parseInt($("#content").height()))
    {
        $("#footer").removeClass("footer-max");
        $("#footer").addClass("footer-min");
    }
    else
    {
        $("#footer").removeClass("footer-min");
        $("#footer").addClass("footer-max");
    }
});