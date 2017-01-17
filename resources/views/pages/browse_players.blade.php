<?php
/**
 * Created by PhpStorm.
 * User: Pelomedusa
 * Date: 23/12/2016
 * Time: 13:26
 */

?>
<head>
    <link rel="stylesheet" href="{{ URL('/css/browse_players.css') }}">
    <link rel="stylesheet" href="{{ URL('/css/player_card.css') }}">

    <script type="text/javascript" src="{{ URL('/js/player_card.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@extends('main')
@section('content')

        <body>

Sélectionner un jeu :
<select id="choose_game" onchange="changeGame()" >
    <option disabled selected value> -- Sélectionner un jeu -- </option>
    <option value="3">CS: GO</option>
    <option value="2">Rocket Leagues</option>
    <option value="1">League of Legends</option>
</select>
Sélectionner un niveau :
<select id="level" name="level" onchange="changeRank()">
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


<div class="col-lg-10" id="browse_players">



</div>

</body>
        <script type="text/javascript" src="{{ URL('/js/browse_players.js') }}"></script>
    @endsection

