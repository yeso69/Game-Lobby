
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
            <div class="col-lg-4" style="padding: 20px">
                <img src="{{ URL('/img/nopic.png') }}" alt="Team image" height="100" width="100">
            </div>
            <div class="col-lg-8" style="padding: 20px">
                <div class="col-lg-12">
                    {{ Form::label('name_team','Nom de la Team :') }}
                    {{ Form::text('name_team','', array('class' => 'form-control')) }}
                </div>
                <div class="col-lg-12">
                    {{ Form::label('id_game','Jeu :') }}
                    {{  Form::select('id_game', array('1' => 'League Of Legends', '2' => 'Rocket League', '3' => 'CS:GO'))  }}
                </div>
                <div class="col-lg-12">
                    {{ Form::label('description','Description :') }}
                    {{ Form::text('description','', array('class' => 'form-control')) }}
                </div>
                <div class="col-lg-12">
                    {{ Form::label('image','Image de Team :') }}
                    {{ Form::file('image') }}
                </div>

            </div>





        {{ Form::submit('Valider',array('class' => 'btn btn-success btn-lg btn-block')) }}

        <input type="hidden" name="id_admin" id="id_admin" value="{{Auth::user()->id}}">

        {{ Form::close() }}


        </div>
    </div>
@endsection
