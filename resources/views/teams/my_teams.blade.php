@extends('main')

@section('title', '| My Teams')

@section('stylesheets')

    <link rel="stylesheet" href="{{ URL('/css/my_teams.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')
    <div id="myteam" class="col-lg-10">


        @if (count($data) != 0)
            <div class="title_myteam">Mes teams :</div>
        @else
            <div>Vous n'avez pas de team</div>
        @endif
        @foreach($data as $d)
            <div class="teams col-lg-12">
                <div class="presentation_team col-lg-6">
                    <img src="{{ URL($d->image) }}" alt="Team image" height="100" width="100">
                    <div><b>Nom :</b> {{$d->name_team}}</div>
                    <div><b>Jeu :</b> {{$d->name}}</div>
                    <div><b>Description :</b> {{$d->description}}</div>
                </div>

                <div class="players col-lg-6">
                    <div class="title_team_player">Joueurs dans l'équipe :</div>
                @foreach ($d->user as $us)
                            <div class="one_player col-lg-12">
                                <div class="info_player col-lg-6">
                                    <div><b>Pseudo:</b> {{$us->pseudo}}</div>
                                    <div><b>Level:</b> {{$us->level}}</div>
                                    <div><b>Description:</b> {{$us->description}}</div>
                                    @if ($d->id_game == 1)
                                        <div><b>Poste :</b> {{$us->position}}</div>
                                    @endif
                                </div>
                                <div class="photo col-lg-6">
                                    <img src="{{ URL($us->image) }}" alt="Team image" height="100" width="100">
                                    @if ($d->id_admin == Auth::user()->id)
                                        @if($d->id_admin != $us->id_user)
                                            <a href="/teams/supprUserFromTeam/{{$us->id_user}}/team/{{$d->id_team}}"><button>Exclure</button></a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                    @endforeach
                </div>
                @if ($d->id_admin != Auth::user()->id)
                    <div class="col-lg-12" style="text-align:right"><a href="/teams/supprUserFromTeam/{{Auth::user()->id}}/team/{{$d->id_team}}"><button class="btn btn-warning">Quitter la team</button></a></div>
                @endif
                @if($d->id_admin == Auth::user()->id)
                    <div class="col-lg-12 " style="text-align:right"><a href="/teams/supprTeam/{{$d->id_team}}"><button class="btn btn-danger">Supprimer la team</button></a></div>
                @endif
                </div>
        @endforeach
    </div>
@endsection