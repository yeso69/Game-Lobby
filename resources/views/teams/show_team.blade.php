@extends('main')

@section('title', '| Team')

@section('content')
    <div>Nom de l'équipe : {{$data[0]->name_team}}</div>
    <div>Description : {{$data[0]->description}}</div>
    <div>Jeu : {{$data[0]->name}}</div>
    <br><br>

    <div>Joueurs dans l'équipe :</div>
    <?php foreach ($user as $us){ ?>
        <br>
        <div>Pseudo: {{$us->pseudo}}</div>
        <div>Level: {{$us->level}}</div>
        <div>Description: {{$us->description}}</div>
        @if ($data[0]->id_game == 1)
            <div>Poste : {{$us->position}}</div>
        @endif
    <?php } ?>
    {{--{{ var_dump($user) }}--}}
@endsection