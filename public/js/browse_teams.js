function changeGame(){
    $("#browse_teams").find("div").remove();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    id_game = $("#choose_game").val();
    $.ajax({
        method: "POST",
        url: '/teams/getTeamsByGame',
        data: {id_game: id_game}
    }).done(function(data) {
        data = JSON.parse(data);
        console.log(data);
        $.each(data,function(i){
            $("#browse_teams").append(createCard(data[i]));
        })
    });
}

function createCard(data) {

    return ''+
        '<div class="col-lg-6">' +
            '<div class="team_card">' +
                '<div class="col-lg-6 text-center">' +
                    '<img src="/'+data["image"]+'">' +
                '</div>'+
                '<div class="col-lg-6">' +
                    '<span> Jeu :' + data["name"]  + '</span>' +
                    '<span> Nom :' + data["name_team"]  + '</span>' +
                    '<span> Description :' + data["description"]  + '</span>' +
                    '<a href="/teams/showT/' + data["id_team"]  + '"><button class="btn btn-success">Voir résumé</button></a>' +
                '</div>'+
            '</div>' +
        '</div>';
}