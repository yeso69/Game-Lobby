$(function () {
    $("#level").children().css("display","none");
});

function changeGame(){
    $("#browse_players").children().each(function(){
        $(this).remove();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    id_game = $("#choose_game").val();
    $.ajax({
        method: "POST",
        url: '/players/getPlayersByGame',
        data: { id_game: id_game}
    }).done(function(data){
        data = JSON.parse(data);
        $.each(data,function(i){
            if (data[i]['id_game'] ==  1){
                $("#browse_players").append(
                    '<div class="col-lg-3">'+
                        '<div class="player_card">' +
                            '<div class="col-lg-4 player_resume">' +
                            '</div>' +
                            '<div>Pseudo:' + data[i]["pseudo"] + '</div>'+
                            '<div>Level:' + data[i]["level"] + '</div>'+
                            '<div>Poste:' + data[i]["position"] + '</div>'+
                            '<div>Description:' + data[i]["description"] + '</div>'+
                            '<div>Recherche:' + data[i]["search"] + '</div>'+
                            '<a href="/message/showConv/' + data[i]["id_user"] + '"><button>Envoyer un message</button></a>' +
                        '</div>' +
                    '</div>')
            }else {
                $("#browse_players").append(
                    '<div class="col-lg-3 ' + i + '">'+
                        '<div class="player_card">' +
                            '<div class="col-lg-4 player_resume">' +
                            '</div>' +
                            '<div>Pseudo:' + data[i]["pseudo"] + '</div>'+
                            '<div>Level:' + data[i]["level"] + '</div>'+
                            '<div>Description:' + data[i]["description"] + '</div>'+
                            '<div>Recherche:' + data[i]["search"] + '</div>'+
                            '<a href="/message/showConv/' + data[i]["id_user"] + '"><button>Envoyer un message</button></a>' +
                        '</div>' +
                    '</div>');
            }
        });
        $("#level").val("");
        $("#level").children().css("display","none");
        $("#level").children("."+$('#choose_game').val()).css("display","initial");
    })
}
function changeRank() {
    $("#browse_players").children().each(function(){
        $(this).remove();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    id_game = $("#choose_game").val();
    level = $("#level").val();
    $.ajax({
        method: "POST",
        url: '/players/getPlayersByGameAndLevel',
        data: { id_game: id_game,level: level}
    }).done(function(data){
        data = JSON.parse(data);
        $.each(data,function(i){
            if (data[i]['id_game'] ==  1){
                $("#browse_players").append(
                    '<div class="col-lg-3">'+
                    '<div class="player_card">' +
                    '<div class="col-lg-4 player_resume">' +
                    '</div>' +
                    '<div>Pseudo:' + data[i]["pseudo"] + '</div>'+
                    '<div>Level:' + data[i]["level"] + '</div>'+
                    '<div>Poste:' + data[i]["position"] + '</div>'+
                    '<div>Description:' + data[i]["description"] + '</div>'+
                    '<div>Recherche:' + data[i]["search"] + '</div>'+
                    '</div>' +
                    '</div>')
            }else {
                $("#browse_players").append(
                    '<div class="col-lg-3 ' + i + '">'+
                    '<div class="player_card">' +
                    '<div class="col-lg-4 player_resume">' +
                    '</div>' +
                    '<div>Pseudo:' + data[i]["pseudo"] + '</div>'+
                    '<div>Level:' + data[i]["level"] + '</div>'+
                    '<div>Description:' + data[i]["description"] + '</div>'+
                    '<div>Recherche:' + data[i]["search"] + '</div>'+
                    '</div>' +
                    '</div>');
            }
        });
    });
}