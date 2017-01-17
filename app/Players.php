<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Players extends Model
{
    public function getPlayersByGame($id_user,$id_game){
        $game = DB::table('game_user')
            ->select('game_user.*')
            ->where('game_user.id_game', '=', $id_game)
            ->where('game_user.id_user','!=',$id_user)
            ->get();

        return $game;
    }

    public function getPlayersByGameAndLevel($id_user,$id_game,$level){
        $game = DB::table('game_user')
            ->select('game_user.*')
            ->where('game_user.id_game', '=', $id_game)
            ->where('game_user.id_user','!=',$id_user)
            ->where('game_user.level','=',$level)
            ->get();

        return $game;
    }
}
