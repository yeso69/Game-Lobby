<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Team extends Model
{
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
}
