$(document).ready (function(){
    window.setTimeout(function() {
        $("#failAlert").fadeTo(500, 0).slideUp(500, function() {
            $(this).hide();
        });
    }, 1000);
});