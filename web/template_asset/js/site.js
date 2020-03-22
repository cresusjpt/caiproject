$(document).ready(function() {
    $('#blinghash').click(function() {
        alert('je suis');
        console.log(window.location.origin)
        //console.log("message = "+$(location).attr('href'))
        $.post("/site/logout");
    });
});