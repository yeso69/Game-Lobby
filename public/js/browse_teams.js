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
            $("#browse_teams").append(
                '<div class="col-lg-6">' +
                '<div class="team_card">' +
                '<div> Jeu :' + data[i]["name"]  + '</div>' +
                '<div> Nom :' + data[i]["name_team"]  + '</div>' +
                '<div> Description :' + data[i]["description"]  + '</div>' +
                    '<a href="/teams/showT/' + data[i]["id_team"]  + '"><button>Voir résumé</button></a>' +
            '</div>' +
            '</div>');
        })
    });
}