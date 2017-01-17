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
}
