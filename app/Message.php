<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function getAllConversation(){
        $game = DB::table('message')
            ->select('login' , 'games.*')
            ->join('games', 'game_user.id_game', '=', 'games.id_game')
            ->where('game_user.id_user', '=', $id)
            ->get();

        return $game;
    }

}
