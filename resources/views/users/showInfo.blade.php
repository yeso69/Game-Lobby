@extends('main')

@section('title', '| Mes jeux')

@section('stylesheets')
    <link rel="stylesheet" href="{{ URL('/css/browse_players.css') }}">
    <link rel="stylesheet" href="{{ URL('/css/team_card.css') }}">

    <script type="text/javascript" src="{{ URL('/js/player_card.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')
    <div class="all_page col-lg-10">

    @if (!isset($data))
        Vos info par jeux :<br><br>
    @endif

    @foreach ($data as $game)
    <div class="team_card">
        <div class="game" id="{{$game->id_game}}">
            @if ($game->id_game == 1)
                <img src="{{ URL('img/lol.jpg') }}" alt="Team image" height="165" width="165" style="float:left">
            @endif

            @if ($game->id_game == 2)
                <img src="{{ URL('img/rocketleague.jpg') }}" alt="Team image" height="165" width="165" style="float:left">
            @endif

            @if ($game->id_game == 3)
                <img src="{{ URL('img/csgo.jpg') }}" alt="Team image" height="165" width="165" style="float:left">
            @endif

                <b>Jeu :</b> {{$game->name}} <br>
                <b>Pseudo :</b> {{$game->pseudo}} <br>
                <b>Niveau :</b> {{$game->level}} <br>
                <b>Description :</b> {{$game->description}}<br>
                <b>Recherche :</b> {{$game->search}}<br>
            @if ($game->id_game === 1)
                    <b>Poste :</b> {{$game->position}}
            @endif
            <br><br>
            <div style="text-align: center;">
                <a href="/users/editGame/{{$game->id_game}}" ><button type="button" class="btn btn-warning">Modifier</button></a>
                <a href="/users/deleteGame/{{$game->id_game}}" ><button type="button" class="btn btn-danger">Supprimer</button></a>
            </div>

        </div>
    </div>
    @endforeach

    @if(count($data) != 3)
        <a href="/users/addGame/"><button class="btn btn-primary">Ajouter des jeux</button></a>
    @endif
    </div>

    @endsection
