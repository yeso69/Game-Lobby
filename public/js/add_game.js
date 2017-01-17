/**
 * Created by Bobol on 16/01/2017.
 */
$(function () {
    $("#level").children().css("display","none");
    data = JSON.parse(data);
    data = $.makeArray(data);
    console.log(data);

    $.each(data,function(i){
        val = data[i]["id_game"];
        $("#game_name option[value='"+val+"']").each(function() {
            $(this).remove();
        });
    })


});


function changeGame(){
    val = $("#game_name").val();
    changeGameRank(val);
    if (val == 1){
        if (!$("#poste").is(":visible")){
            $("#poste").fadeIn();
        }
    }else {
        if ($("#poste").is(":visible")){
            $("#poste").fadeOut();
        }
    }
}

function changeGameRank(val){
    $("#level").children().css("display","none");
    $("#level").children("."+val).css("display","initial");

}