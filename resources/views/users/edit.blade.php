
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
        <div class="col-lg-6 col-lg-offset-3">
        <h1>Mes Infos</h1>

    {{ Form::open(['route'=>['users.update',Auth::user()->id],'method'=>'PATCH','files' =>true]) }}

        {{ Form::label('name','Nom:') }}
        {{Form::text('name',Auth::user()->name,array('class' => 'form-control'))}}

        {{ Form::label('email','Email:') }}
        {{Form::text('email',Auth::user()->email,array('class' => 'form-control'))}}

        {{ Form::label('password','Mot de passe:') }}
        {{Form::password('password',['class' => 'form-control'])}}

        {{ Form::label('image','Image de profil :') }}<br>
        <img src="{{ URL(Auth::user()->image)}}" alt="No Image" height="100" width="100">
        {{ Form::file('image') }}
        {{ Form::submit('Valider',array('class' => 'btn btn-success')) }}

    {{ Form::close() }}
        </div>



</div>
@endsection
