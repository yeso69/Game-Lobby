@extends('main')

@section('title', '| Mes levels')

@section('stylesheets')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
@endsection

@section('content')
    <h1>Mon niveau</h1>
    {!! Form::open(['route' => 'levels.store']) !!}
    {{ Form::label('title','Titre:') }}
    {{Form::text('title',null,array('class' => 'form-control'))}}
    {{ Form::submit('Valider',array('class' => 'btn btn-success btn-lg btn-block')) }}
    {!! Form::close() !!}

@endsection