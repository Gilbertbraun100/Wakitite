$(document).ready(function () {
    $("#cvv-show-btn").click(function() {
        $("#cvv-div").slideToggle();
    });
    $("#ccn-show-btn").click(function() {
        $("#ccn-div").slideToggle();
    });
     $("#dead-show-btn").click(function() {
        $("#dead-div").slideToggle();
    });
    $("#cvv-clear-btn").click(function() {
        var m = document.getElementsByClassName("m");
        for(var i=0; i < m.length; i++){
        m[i].remove();
        }
    });
    $("#ccn-clear-btn").click(function() {
        var n = document.getElementsByClassName("n");
        for(var i=0; i < n.length; i++){
        n[i].remove();
        }
    });
    $("#dead-clear-btn").click(function() {
        var d = document.getElementsByClassName("d");
        for(var i=0; i < d.length; i++){
        d[i].remove();
        }
    });
    $("#format").click(function() {
        var card = $("#cards").val();
        var regex = /\d*\|\d*\|\d*\|\d*/g;
        $("#cards").val(card.match(regex).join("\n"));
    });
    
    $("#start").click(function() {
        var card = $("#cards").val();
        var sk = $("#sk").val();
        var gate = $("#gates").val();
        var carda = card.split("\n");
        var cvv = 0;
        var ccn = 0;
        var dead = 0;
        carda.forEach(function(value, index) {
            setTimeout(function() {
                $.ajax({
                    url: gate + '?card=' + value + '&sk=' + sk,
                    type: 'GET',
                    async: true,
                    success: function(result) {
                        if (result.match("#CVV")) {
                            var result = result.split("#CVV ");
                            $("#cvv-div").append('<div class="m"><span class="badge"> CVV </span> ' + value + ' ' + result[0] + result[1] + '</div>');
                            update();
                            cvv++;
                        }
                        else if (result.match("#CCN")) {
                            var result = result.split("#CCN ");
                            $("#ccn-div").append('<div class="n"><span class="badge"> CCN </span> ' + value + ' ' + result[0] + result[1]  + '</div>');
                            update();
                            ccn++;
                        }
                        else if (result.match("#DEAD")) {
                            var result = result.split("#DEAD ");
                            $("#dead-div").append('<div class="d"><span class="badge"> DEAD </span> ' + value + ' ' + result[0] + result[1]  + '</div>');
                            update();
                            dead++;
                        }
                        else {
                            $("#d-container").append('<div class="d"><span class="badge"> DEAD </span> ' + value + ' ' +  result + '</div>');
                            update();
                            dead++;
                        }
                        $('#m-count').html(cvv);
                        $('#n-count').html(ccn);
                        $('#d-count').html(dead);
                    }
                });
            }, index * 1000);
        });

    });
});

function update() {
    var card = $("#cards").val().split("\n");
    card.splice(0, 1);
    $("#cards").val(card.join("\n"));
}