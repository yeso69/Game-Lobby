@extends('main')

@section('content')
    <h1>Modifier mes infos générale</h1>
    {!! Form::open(['route'=>['users.update',Auth::user()->id],'method'=>'PATCH']) !!}


    {{ Form::label('name','Nom:') }}
    {{Form::text('name',Auth::user()->name,array('class' => 'form-control'))}}

    {{ Form::label('email','Email:') }}
    {{Form::text('email',Auth::user()->email,array('class' => 'form-control'))}}

    {{ Form::label('password','Mot de passe:') }}
    {{Form::password('password',['class' => 'form-control'])}}

    {{ Form::label('steam','Compte Steam:') }}
    {{Form::text('steam',Auth::user()->steam,array('class' => 'form-control'))}}

    {{ Form::label('cs_level','Niveau CS:GO:') }}
    {{Form::text('cs_level',Auth::user()->cs_level,array('class' => 'form-control'))}}

    {{ Form::label('lol_level','Niveau League Of Legends:') }}
    {{Form::text('lol_level',Auth::user()->lol_level,array('class' => 'form-control'))}}

    {{ Form::label('rl_level','Niveau Rocket League:') }}
    {{Form::text('rl_level',Auth::user()->rl_level,array('class' => 'form-control'))}}


    {{ Form::submit('Valider',array('class' => 'btn btn-success btn-lg btn-block')) }}
    {!! Form::close() !!}

@endsection
