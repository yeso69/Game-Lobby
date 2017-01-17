/**
 * Created by Pelomedusa on 23/12/2016.
 */
var messageUpdater;

$(function () {


    $("#message_button_title span").hide();

    $("#message_button").click(function () {
        var block = $("#bloc_conversations");
        if (block.height() == 300) {
            $("#bloc_conversations").animate({height:0},400);
        }
        else {
            $("#bloc_conversations").animate({height:300},400)
            $("#message_button").css({backgroundColor: "#414141", "font-weight":"bolder"},400);
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
                    console.log(conv.html())
                    $("#bloc_conversations").append(conv);
                });

            },
            error: function (data) {
                console.log("error:");
                console.log(data);
            }
        });
    },5000)


})

function pulseMessage(){
    $("#message_button_title span").show()
    $('#message_button_title').delay(200).fadeOut('slow').delay(50).fadeIn('slow',pulse);
}
