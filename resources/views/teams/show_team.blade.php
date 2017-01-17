@extends('main')

@section('title', '| Team')

@section('content')
    <div>Nom de l'équipe : {{$data[0]->name_team}}</div>
    <div>Description : {{$data[0]->description}}</div>
    <div>Jeu : {{$data[0]->name}}</div>
@endsection