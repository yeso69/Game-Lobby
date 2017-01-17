/**
 * Created by Pelomedusa on 17/01/2017.
 */
var convUpdater;
$(function () {
    convUpdater = setInterval(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'GET',
            url: '/message/showConvJson/'+$("#input_receiver").val(),
            data: {_token: CSRF_TOKEN},
            success: function (data) {
                $("#bloc_view_conversation").html(data);
            },
            error: function (data) {
                console.log("error:");
                console.log(data);
            }
        });
    },5000)
})