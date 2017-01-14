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
    <script type="text/javascript" src="{{ URL('/js/browse_players.js') }}"></script>
    <script type="text/javascript" src="{{ URL('/js/player_card.js') }}"></script>
</head>
    @extends('main')
    @section('content')

<body>

Sélectionner un jeu :
<select>
    <option value="CSGO">CS: GO</option>
    <option value="RL">Rocket Leagues</option>
    <option value="LOL">League of Legends</option>
</select>
Sélectionner un niveau :
<select>
    <option value="">A remplir avec les niveaux du jeux choisi</option>

</select>


<div class="col-lg-10" id="browse_players">
    <?php for ($i=0; $i<10; $i++){ ?>
        <div class="col-lg-3">
            <?php include public_path() . '/fragments/player_card.blade.php'; ?>
        </div>
    <?php } ?>
</div>

</body>
    @endsection

