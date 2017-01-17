@extends('main')

@section('content')

    @if (!isset($data))
        Vos info par jeux :<br><br>
    @endif
<!--    --><?php //die("<pre>".var_dump($data)); ?>

    @foreach ($data as $game)
        <div class="game" id="{{$game->id_game}}">
            Jeu : {{$game->name}} <br>
            Pseudo : {{$game->pseudo}} <br>
            Niveau : {{$game->level}} <br>
            Description : {{$game->description}}<br>
            Recherche : {{$game->search}}<br>
            @if ($game->id_game === 1)
                Poste : {{$game->position}}
            @endif
        </div><br><br>
    @endforeach

    @if(count($data) != 3)
        <a href="/users/addGame/" ><button>Ajouter des jeux</button></a>
    @endif

@endsection