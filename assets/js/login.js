$(document).ready(function () { 
    $('body').hide().fadeIn(1500).delay(6000)
});
$("#login").click(function() {
    var un = $("#username").val();
    var pw = $("#password").val();
    $.redirect('index.php', {'un': un, 'pw': pw });
});