
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
        <h1>Créer une Team</h1>

        {{ Form::open(['route'=>['team.store','method'=>'POST'],'files' =>true]) }}

        {{ Form::label('image','Image de Team :') }}
        {{ Form::file('image') }}

        <img src="{{ URL(Auth::user()->image)}}" alt="Smiley face" height="100" width="100">

        {{ Form::label('name','Nom:') }}
        {{Form::text('name',Auth::user()->name,array('class' => 'form-control'))}}

        {{ Form::label('email','Email:') }}
        {{Form::text('email',Auth::user()->email,array('class' => 'form-control'))}}

        {{ Form::label('password','Mot de passe:') }}
        {{Form::password('password',['class' => 'form-control'])}}




        {{ Form::submit('Valider',array('class' => 'btn btn-success btn-lg btn-block')) }}

        {{ Form::close() }}



    </div>
@endsection
