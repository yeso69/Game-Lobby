@extends('main')

@section('content')

    Ajouter un jeu :

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/users/addGameData') }}">
        {{ csrf_field() }}

        <div class="{{ $errors->has('game_name') ? ' has-error' : '' }}">
            <label for="game_name" class="col-md-4 control-label">Jeu</label>

            <div class="col-md-6">
                <select id="game_name" class="form-control" name="id_game" value="{{ old('id_game') }}" required autofocus>
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
                    <option value="bronze">Bronze</option>
                    <option value="silver">Silver</option>
                    <option value="gold">Gold</option>
                </select>

                @if ($errors->has('level'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="{{ $errors->has('position') ? ' has-error' : '' }}">
            <label for="position" class="col-md-4 control-label">Poste sur lol</label>

            <div class="col-md-6">
                <input id="position" type="text" class="form-control" name="position" value="{{ old('position') }}" required autofocus>

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