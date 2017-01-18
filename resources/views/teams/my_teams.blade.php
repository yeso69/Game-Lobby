@extends('main')

@section('title', '| My Teams')

@section('content')


    @if (count($data) != 0)
    Mes teams :
    @else
        <div>Vous n'avez pas de team</div>
    @endif
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
                    @if($d->id_admin != $us->id_user)
                        <div><a href="/teams/supprUserFromTeam/{{$us->id_user}}/team/{{$d->id_team}}"><button>Exclure</button></a></div>
                    @endif
                @endif
            @endforeach
        </div>
        @if ($d->id_admin != Auth::user()->id)
            <div><a href="/teams/supprUserFromTeam/{{Auth::user()->id}}/team/{{$d->id_team}}"><button>Quitter la team</button></a></div>
        @endif
        @if($d->id_admin == Auth::user()->id)
            <div><a href="/teams/supprTeam/{{$d->id_team}}"><button>Supprimer la team</button></a></div>
        @endif
        <br><br>
    @endforeach
@endsection