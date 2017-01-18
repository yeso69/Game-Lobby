<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function getAllRequest(){
        $team = DB::table('requestjointeam')
            ->select('requestjointeam.*','users.name', 'teams.name_team')
            ->join('teams','teams.id_team','=','requestjointeam.team_id')
            ->join('users','users.id','=','requestjointeam.user_id')
            ->where('deliberated', '=', 0)
            ->where('teams.id_admin', '=', Auth::user()->id)
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
            ->select('game_user.*', 'users.name', 'users.image')
            ->join('team_user','game_user.id_user','=','team_user.id_user')
            ->where('team_user.id_team', '=', $id_team)
            ->where('game_user.id_game', '=', $id_game)
            ->join('users',"game_user.id_user",'=','users.id')
            ->get();

        foreach ($user as $g){
            $g->allGames = DB::table('games')
                ->select('games.logo')
                ->from('games')
                ->join('game_user','game_user.id_game','=','games.id_game')
                ->where('game_user.id_user','=',$g->id_user)
                ->get();
        }
        return $user;
    }


    public function createRequest($idteam){
        DB::table('requestjointeam')->insert([
            ['user_id' => Auth::user()->login],
            ['team_id' => $idteam],
            ['deliberated' => false],
            ['created_at'=> Carbon::now()],
            ['updated_at'=> Carbon::now()]
        ]);
    }

    public function getTeamsByUser($id_user){
        $data = DB::table('teams')
            ->select('teams.*','games.name')
            ->join('team_user','teams.id_team','=','team_user.id_team')
            ->join('games','teams.id_game','=','games.id_game')
            ->where('team_user.id_user','=',$id_user)
            ->orwhere('teams.id_admin','=',$id_user)
            ->get();
        return $data;
    }

    public function addUserToTeam($idplayer,$idteam){
        DB::table('team_user')->insert([
            ['id_team' => $idteam,
            'id_user' => $idplayer]
        ]);
    }

    public function markAsDeliberated($idrequest){
        DB::table('requestjointeam')
            ->where('id', $idrequest)
            ->update(['deliberated' => 1]);
    }

    public function suppUserFromTeam($id_user,$id_team){
        var_dump($id_team);die();
    }
}
