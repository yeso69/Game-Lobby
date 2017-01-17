@extends('main')

@section('title', '| My Team')

@section('content')



    Mes teams :
        @foreach($data as $d)
            <div>
                <div>Nom : {{$d->name_team}}</div>
                <div>Jeu : {{$d->name}}</div>
                <div>Description : {{$d->description}}</div>
                <br>
                <div>Joueurs dans l'équipe :</div>
                @foreach ($d->user as $us)
                <br>
                <div>Pseudo: {{$us->pseudo}}</div>
                <div>Level: {{$us->level}}</div>
                <div>Description: {{$us->description}}</div>
                @if ($d->id_game == 1)
                    <div>Poste : {{$us->position}}</div>
                @endif
                @if ($d->id_admin == Auth::user()->id)
                        <div><button>Suppression</button></div>
                @endif
                @endforeach
            </div>
            @if ($d->id_admin != Auth::user()->id)
                <div><button>Quitter la team</button></div>
            @endif
            <br><br>
        @endforeach
@endsection