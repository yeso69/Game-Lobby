<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getGameUser($id){
        $game = DB::table('game_user')
            ->select('game_user.*' , 'games.*')
            ->join('games', 'game_user.id_game', '=', 'games.id_game')
            ->where('game_user.id_user', '=', $id)
            ->get();

        return $game;
    }
}
