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

    public function getGameByIdUser($id,$id_game){
        $game = DB::table('game_user')
            ->select('game_user.*' , 'games.*')
            ->join('games', 'game_user.id_game', '=', 'games.id_game')
            ->where('game_user.id_user', '=', $id)
            ->where('game_user.id_game', '=', $id_game)
            ->get();
    }

    public function insertGame($data){
        DB::table('game_user')->insert($data);
    }

    public function updateGameData($data){
        DB::table('game_user')
            ->where('id_game',$data["game_name"])
            ->where('id_user',$data["id_user"])
            ->update(['level'=>$data['level'],'description'=>$data['description'],'search'=>$data["search"],
                'position'=>$data["position"],'pseudo'=>$data["pseudo"]]);
    }

    public function deleteGame($id_user,$id_game){
        DB::table('game_user')->where('id_user','=',$id_user)->where('id_game','=',$id_game)->delete();
    }
}
