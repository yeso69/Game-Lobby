/**
 * Created by Pelomedusa on 23/12/2016.
 */
var messageUpdater;

$(function () {

    $("#team_button").click(function () {
        var block = $("#bloc_teams");
        if (block.height() == 150) {
            $("#bloc_teams").animate({height:0},400, function () {
                $("#team_button").css({backgroundColor: "#171717"});
            });
        }
        else {
            $("#bloc_teams").animate({height:150},400)
            $("#team_button").css({backgroundColor: "#414141"});
        }
    });

    $("#jeux_button").click(function () {
        var block = $("#bloc_jeux");
        if (block.height() == 100) {
            $("#bloc_jeux").animate({height:0},400, function () {
                $("#jeux_button").css({backgroundColor: "#171717"});

            });
        }
        else {
            $("#bloc_jeux").animate({height:100},400)
            $("#jeux_button").css({backgroundColor: "#414141"});
        }
    });


    $("#message_button").click(function () {
        var block = $("#bloc_conversations");
        if (block.height() == 200) {
            $("#bloc_conversations").animate({height:0},400);
        }
        else {
            $("#bloc_conversations").animate({height:200},400)
            $("#message_button").css({backgroundColor: "#414141"},400);
        }
    });

    messageUpdater = setInterval(function () {
        var conv, pseudo;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'GET',
            url: '/message/getConv',
            data: {_token: CSRF_TOKEN},
            success: function (data) {
                var parsed = JSON.parse(data);
                $("#bloc_conversations").html("");
                jQuery.each(parsed, function(i, val) {
                    conv = $("<div class='conv'></div>")
                    pseudo = $("<a class='conv_name' href='/message/showConv/"+val.id+"'>"+val.name+"</a>")
                    conv.append(pseudo)
                    $("#bloc_conversations").append(conv);
                });

            },
            error: function (data) {
                console.log("error:");
                console.log(data);
            }
        });
    },3000);


})

function pulseMessage(){
    $("#message_button_title span").show()
    $('#message_button_title').delay(200).fadeOut('slow').delay(50).fadeIn('slow',pulse);
}
