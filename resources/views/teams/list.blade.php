@extends('main')

@section('title', '| Les Teams')

@section('stylesheets')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ URL('/css/browse_teams.css') }}">
    <link rel="stylesheet" href="{{ URL('/css/team_card.css') }}">
    <script type="text/javascript" src="{{ URL('/js/browse_teams.js') }}"></script>
    <script type="text/javascript" src="{{ URL('/js/player_card.js') }}"></script>
@endsection

@section('content')


    <h1>Teams</h1>

    <div class="col-lg-10" id="browse_teams">
    @foreach ($teams as $team)
            <div class="col-lg-6">
                <div class="team_card">
                   Description : {{$team->description}}
                </div>
            </div>
        @endforeach
    </div>




@endsection