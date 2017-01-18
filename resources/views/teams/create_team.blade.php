
@extends('main')

@section('title', '| Créer Team')

@section('stylesheets')
    <link rel="stylesheet" href="{{ URL('/css/browse_players.css') }}">
    <link rel="stylesheet" href="{{ URL('/css/player_card.css') }}">

    <script type="text/javascript" src="{{ URL('/js/player_card.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection


@section('content')

    <div class="col-lg-10" id="browse_teams">
        <div class="col-lg-6 col-md-offset-3">
        <h1>Créer une Team</h1>

        {{ Form::open(['route'=>['teams.store'],'method'=>'POST','files' =>true]) }}

        <img src="{{ URL('/img/nopic.png') }}" alt="Team image" height="100" width="100">
        {{ Form::label('image','Logo de la Team ') }}

        {{ Form::file('image') }}



        {{ Form::label('name_team','Nom de la Team :') }}
        {{ Form::text('name_team','', array('class' => 'form-control')) }}

        {{ Form::label('id_game','Jeu :') }}

        <select id="id_game" name="id_game" class="form-control">
            <option value="1">League Of Legends</option>
            <option value="2">Rocket League</option>
            <option value="3">CS:GO</option>
        </select>

        {{ Form::label('description','Description :') }}
        {{ Form::text('description','', array('class' => 'form-control')) }}
            <br>
            {{ Form::submit('Valider',array('class' => 'btn btn-success btn-lg btn-block')) }}

            </div>
        <input type="hidden" name="id_admin" id="id_admin" value="{{Auth::user()->id}}">

        {{ Form::close() }}


        </div>
    </div>
@endsection
