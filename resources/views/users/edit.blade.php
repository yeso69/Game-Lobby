
@extends('main')

@section('title', '| Mon compte')

@section('stylesheets')
    <link rel="stylesheet" href="{{ URL('/css/browse_players.css') }}">
    <link rel="stylesheet" href="{{ URL('/css/player_card.css') }}">

    <script type="text/javascript" src="{{ URL('/js/player_card.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')

    <div class="col-lg-10" id="browse_teams">
        <h1>Mon compte </h1>

    {{ Form::open(['route'=>['users.update',Auth::user()->id],'method'=>'PATCH','files' =>true]) }}


        {{ Form::label('image','Image de profil :') }}
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
