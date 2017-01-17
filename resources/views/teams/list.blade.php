@extends('main')

@section('title', '| Les Teams')

@section('stylesheets')

    <link rel="stylesheet" href="{{ URL('/css/browse_teams.css') }}">
    <link rel="stylesheet" href="{{ URL('/css/team_card.css') }}">
    <script type="text/javascript" src="{{ URL('/js/browse_teams.js') }}"></script>
    <script type="text/javascript" src="{{ URL('/js/player_card.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')

    <div class="col-lg-10" id="browse_teams">
        <h1>Teams</h1>

        Sélectionner un jeu :
        <select id="choose_game" onchange="changeGame()" >
            <option disabled selected value> -- Sélectionner un jeu -- </option>
            <option value="3">CS: GO</option>
            <option value="2">Rocket Leagues</option>
            <option value="1">League of Legends</option>
        </select>

    </div>




@endsection