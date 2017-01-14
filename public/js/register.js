/**
 * Created by Pelomedusa on 22/12/2016.
 */


$(function () {
    $("#containerSwitchForm div").click(function () {
        if ($(this).hasClass("not_selected")){
            $(this).removeClass("not_selected").siblings("div").addClass("not_selected");
            $(".form").hide();
            $("#form"+$(this).find("span").text()).fadeIn();
        }
    });

    $(".pickGame").hover(function () {
        if (!$(this).hasClass("gameSelected")) $(this).find(".layer").fadeIn(100);
    },function () {
        if (!$(this).hasClass("gameSelected")) $(this).find(".layer").fadeOut(100);
    })

    $(".pickGame").click(function () {
        $(this).toggleClass("gameSelected").find(".layer").show();
    })
})