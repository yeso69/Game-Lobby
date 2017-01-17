@extends('main')

@section('title', '| Team')

@section('stylesheets')

    <link rel="stylesheet" href="{{ URL('/css/show_team.css') }}">
    <link rel="stylesheet" href="{{ URL('/css/player_card.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')
    <div class="col-lg-10 text-center" id="show_team">
        <h1>{{$data[0]->name_team}}</h1>

        <h2>Description</h2>
        <p>{{$data[0]->description}}</p>

        <h2>Jeu</h2>
        <p>{{$data[0]->name}}</p>

        <h2>Joueurs dans l'équipe</h2>
        <?php foreach ($user as $us){ ?>
        <div class="col-lg-3">'
            <div class="player_card">
                <div class="col-lg-4 player_resume text-center">
                    <img class="img-responsive img-rounded" src="<?= $us->image ?>">
                    <span> <?= $us->name ?> </span>
                    <div class="col-lg-12">
                        <?php foreach ($us->allGames as $g) { ?>
                            <div class='col-lg-4 container_logo'><img src='{{ URL('/img/'.$g->logo) }}'></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-8 text-center">
                    <span class="title_fiche">Pseudo In-Game:</span><span class="info_fiche"><?= $us->pseudo ?></span>
                    <span class="title_fiche">Level:</span><span class="info_fiche"><?= $us->level ?></span>
                    <span class="title_fiche">Description:</span><span class="info_fiche"><?= $us->description ?></span>
                    <span class="title_fiche">Recherche:</span><span class="info_fiche"><?= $us->search ?></span>
                    <div class="col-lg-12"><a href="/message/showConv/<?= $us->id_user ?>"><button><span class="glyphicon glyphicon-envelope"></span></button></a></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    {{--{{ var_dump($user) }}--}}
@endsection