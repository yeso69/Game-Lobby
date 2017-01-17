function changeGame(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    id_game = $("#choose_game").val();
    $.ajax({
        method: "POST",
        url: '/teams/getTeamsByGame',
        data: { id_game: id_game}
    }).done(function(data) {
        data = JSON.parse(data);
    });
}