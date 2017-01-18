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
                $("#browse_players").append(createCard(data[i]));
        });
        $("#level").val("");
        $("#level").children().css("display","none");
        $("#level").children("."+$('#choose_game').val()).css("display","block");
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
            $("#browse_players").append(createCard(data[i]))
        });
    });
}

function createCard(data) {
    var logos = $("<div></div>");
    console.log("test");
    $.each(data["allGames"], function (i,val) {
        logos.append("<div class='col-lg-4 container_logo'><img src='../img/"+val["logo"]+"'></div>")
    });

    var poste = "";
    if (data.id_game == 1) poste = '<span class="title_fiche">Poste:</span><span class="info_fiche">' + data["position"] + '</span>'

    return ''+
        '<div class="col-lg-4">'+
        '<div class="player_card">' +
        '<div class="col-lg-4 player_resume text-center">' +
        '<img class="img-responsive img" src="'+data["image"]+'">' +
        '<span>'+data["name"]+'</span>'+
        '<div class="col-lg-12">'+logos.html()+'</div>' +
        '</div>' +
        '<br class="col-lg-8 text-center">' +

        '<span class="title_fiche">Pseudo In-Game:</span><br><span class="info_fiche">' + data["pseudo"] + '</span>'+
        '<span class="title_fiche">Level:</span><span class="info_fiche">' + data["level"] + '</span>'+
        poste+
        '<span class="title_fiche">Description:</span><span class="info_fiche">' + data["description"] + '</span>'+
        '<span class="title_fiche">Recherche:</span><span class="info_fiche">' + data["search"] + '</span>'+

        '<div class="col-lg-12"><a href="/message/showConv/' + data["id_user"] + '"><button><span class="glyphicon glyphicon-envelope"></span></button></a></div>'+
        '</div>'+
        '</div>'+
        '</div>';
}