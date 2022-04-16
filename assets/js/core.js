$(document).ready(function () { 
    $('body').hide().fadeIn(1500).delay(6000)
    $("#cvvbtn").click(function() {
        playsfx();
        $("#cvvdiv").slideToggle();
    });
    $("#ccnbtn").click(function() {
        playsfx();
        $("#ccndiv").slideToggle();
    });
    $("#deadbtn").click(function() {
        playsfx();
        $("#deaddiv").slideToggle();
    });
    $("#cvvcbtn").click(function() {
        playsfx();
        var x = document.getElementsByClassName("cvvr");
        for(var i=0; i < x.length; i++){
        x[i].remove();
        }
    });
    $("#ccncbtn").click(function() {
        playsfx();
        var y = document.getElementsByClassName("ccnr");
        for(var i=0; i < y.length; i++){
        y[i].remove();
        }
    });
    $("#deadcbtn").click(function() {
        playsfx();
        var z = document.getElementsByClassName("deadr");
        for(var i=0; i < z.length; i++){
        z[i].remove();
        }
    });
});

$("#check").click(function() {
    playsfx();
    var card = $("#cards").val();
    var gate = $("#gates").val();
    var carda = card.split("\n");
    var cvv = 0;
    var ccn = 0;
    var dead = 0;
    carda.forEach(function(value, index) {
        setTimeout(function() {
            $.ajax({
                url: gate + '?card=' + value,
                type: 'GET',
                async: true,
                success: function(result) {
                    if (result.match("#CVV")) {
                        $("#cvvdiv").append(result);
                        update();
                        cvv++;
                    } else if (result.match("#CCN")) {
                        $("#ccndiv").append(result);
                        update();
                        ccn++;
                    } else {
                        $("#deaddiv").append(result);
                        update();
                        dead++;
                    }
                    $(".progress-bar").css("width", (index + 1) / carda.length * 100 + "%").text((index + 1) + "/" + carda.length + "%");
                    $('#cvvc').html(cvv);
                    $('#ccnc').html(ccn);
                    $('#deadc').html(dead);
                }
            });
        }, index * 500);
    });
});

function update() {
    var card = $("#cards").val().split("\n");
    card.splice(0, 1);
    $("#cards").val(card.join("\n"));
}
function playsfx() {
    var x = document.getElementById("bvsfx");  
    x.play(); 
} 
