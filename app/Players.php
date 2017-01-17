<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Players extends Model
{
    public function getPlayersByGame($id_user,$id_game){
        $game = DB::table('game_user')
            ->select('game_user.*','users.name','users.image')
            ->where('game_user.id_game', '=', $id_game)
            ->where('game_user.id_user','!=',$id_user)
            ->join('users',"game_user.id_user",'=','users.id')
            ->get();

        foreach ($game as $g){
            $g->allGames = DB::table('games')
                ->select('games.logo')
                ->from('games')
                ->join('game_user','game_user.id_game','=','games.id_game')
                ->where('game_user.id_user','=',$g->id_user)
                ->get();
        }

        return $game;
    }

    public function getPlayersByGameAndLevel($id_user,$id_game,$level){
        $game = DB::table('game_user')
            ->select('game_user.*','users.name','users.image')
            ->where('game_user.id_game', '=', $id_game)
            ->where('game_user.id_user','!=',$id_user)
            ->where('game_user.level','=',$level)
            ->join('users',"game_user.id_user",'=','users.id')
            ->get();

        return $game;
    }
}
