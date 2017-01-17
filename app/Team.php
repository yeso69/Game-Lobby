<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model
{

    protected $fillable = [
        'name_team', 'description', 'id_admin', 'image', 'id_game'
    ];
    public function getAllTeams(){
        //
        $game = DB::table('teams')
            ->select('teams.*')
            ->get();
        return $game;

    }

    public function getTeam($id){
        $team = DB::table('teams')
            ->select('teams.*')
            ->where('teams.id', '=', $id)
            ->get();
        return $team;
    }


    public function getTeamsByGame($id_game,$id_user){
        $team = DB::table('teams')
            ->select('teams.*', 'games.name')
            ->join('team_user','teams.id_team','=','team_user.id_team')
            ->join('games','teams.id_game','=','games.id_game')
            ->where('teams.id_game', '=', $id_game)
            ->where('team_user.id_user', '!=', $id_user)
            ->get();
        return $team;
    }

    public function getTeamById($id_team){
        $team = DB::table('teams')
            ->select('teams.*', 'games.name')
            ->join('team_user','teams.id_team','=','team_user.id_team')
            ->join('games','teams.id_game','=','games.id_game')
            ->where('teams.id_team', '=', $id_team)
            ->where('team_user.id_team', '=', $id_team)
            ->get();
        return $team;
    }

    public function getUserByTeam($id_team,$id_game){
        $user = DB::table('game_user')
            ->select('game_user.*')
            ->join('team_user','game_user.id_user','=','team_user.id_user')
            ->where('team_user.id_team', '=', $id_team)
            ->where('game_user.id_game', '=', $id_game)
            ->get();
        return $user;
    }

    public function getTeamsByUser($id_user){
        $data = DB::table('teams')
            ->select('teams.*','games.name')
            ->join('team_user','teams.id_team','=','team_user.id_team')
            ->join('games','teams.id_game','=','games.id_game')
            ->where('team_user.id_user','=',$id_user)
            ->get();
        return $data;
    }

    public function suppUserFromTeam($id_user,$id_team){
        var_dump($id_team);die();
    }
}
