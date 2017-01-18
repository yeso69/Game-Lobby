@extends('main')

@section('title', '| Ajouter un jeu')


@section('content')
    <script>
    var data = '<?php echo json_encode($data); ?>';
    </script>
    <script type="text/javascript" src="{{ URL('/js/add_game.js') }}"></script>


    Ajouter un jeu :

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/users/addGameData') }}">
        {{ csrf_field() }}

        <div class="{{ $errors->has('game_name') ? ' has-error' : '' }}">
            <label for="game_name" class="col-md-4 control-label">Jeu</label>

            <div class="col-md-6">
                <select id="game_name" class="form-control" name="id_game" value="{{ old('id_game') }}" required autofocus onchange="changeGame()">
                    <option>Sélectionner un Jeu</option>
                    <option value="1">League of Legends</option>
                    <option value="2">Rocket League</option>
                    <option value="3">CS GO</option>
                </select>

                @if ($errors->has('id_game'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('id_game') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="{{ $errors->has('pseudo') ? ' has-error' : '' }}">
            <label for="pseudo" class="col-md-4 control-label">Pseudo</label>

            <div class="col-md-6">
                <input id="pseudo" type="text" class="form-control" name="pseudo" value="{{ old('pseudo') }}" required autofocus>

                @if ($errors->has('pseudo'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('pseudo') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="{{ $errors->has('level') ? ' has-error' : '' }}">
            <label for="level" class="col-md-4 control-label">Niveau rank</label>

            <div class="col-md-6">
                <select id="level" class="form-control" name="level" value="{{ old('level') }}" required autofocus>
                    <option>Sélectionner un rank</option>
                    <!--LOL-->
                    <option class="1" value="unranked">Unranked</option>
                    <option class="1" value="bronze">Bronze</option>
                    <option class="1" value="silver">Silver</option>
                    <option class="1" value="gold">Gold</option>
                    <option class="1" value="platine">Platine</option>
                    <option class="1" value="diamant">Diamant</option>
                    <option class="1" value="challenger">Challenger</option>
                    <option class="1" value="master">Master</option>
                    <!--RL-->
                    <option class="2" value="unranked">Unranked</option>
                    <option class="2" value="prospect">Prospect</option>
                    <option class="2" value="prospect elite">Prospect Elite</option>
                    <option class="2" value="challenger">Challenger</option>
                    <option class="2" value="challenger elite">Challenger Elite</option>
                    <option class="2" value="rising star">Rising Star</option>
                    <option class="2" value="shooting star">Shooting Star</option>
                    <option class="2" value="all star">All-Star</option>
                    <option class="2" value="superstar">Superstar</option>
                    <option class="2" value="champion">Champion</option>
                    <option class="2" value="super champion">Super Champion</option>
                    <option class="2" value="grand champion">Grand Champion</option>
                    <!--CS-->
                    <option class="3" value="silver 1">Silver 1</option>
                    <option class="3" value="silver 2">Silver 2</option>
                    <option class="3" value="silver 3">Silver 3</option>
                    <option class="3" value="silver 4">Silver 4</option>
                    <option class="3" value="silver elite">Silver elite</option>
                    <option class="3" value="silver elite master">Silver elite master</option>
                    <option class="3" value="gold nova 1">Gold Nova 1</option>
                    <option class="3" value="gold nova 2">Gold Nova 2</option>
                    <option class="3" value="gold nova 3">Gold Nova 3</option>
                    <option class="3" value="gold nova master">Gold Nova master</option>
                    <option class="3" value="master guardian 1">Master Guardian 1</option>
                    <option class="3" value="master guardian 2">Master Guardian 2</option>
                    <option class="3" value="master guardian elite">Master Guardian Elite</option>
                    <option class="3" value="distinguished master guardian">Distinguished Master Guardian</option>
                    <option class="3" value="legendary eagle">Legendary Eagle</option>
                    <option class="3" value="legendary eagle master">Legendary Eagle Master</option>
                    <option class="3" value="supreme master first class">Supreme Master First Class</option>
                    <option class="3" value="the global elite">The Global Elite</option>

                </select>

                @if ($errors->has('level'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div  id="poste" class="{{ $errors->has('position') ? ' has-error' : '' }}" style="display:none;">
            <label for="position" class="col-md-4 control-label">Poste sur lol</label>

            <div class="col-md-6">
                <input id="position" type="text" class="form-control" name="position" value="{{ old('position') }}" autofocus>

                @if ($errors->has('position'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description de vous sur le jeu</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>

            @if ($errors->has('description'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="{{ $errors->has('search') ? ' has-error' : '' }}">
            <label for="search" class="col-md-4 control-label">Type de joueur recherché</label>

            <div class="col-md-6">
                <input id="search" type="text" class="form-control" name="search" value="{{ old('search') }}" required autofocus>

            @if ($errors->has('search'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <button>Valider</button>


    </form>
@endsection