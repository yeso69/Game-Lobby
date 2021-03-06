<?php

namespace App;

use Carbon\Carbon;
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
            ['user_id' => Auth::user()->id,
            'team_id' => $idteam,
            'deliberated' => false,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()]
        ]);
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

    public function addUserToTeamByRequest($idrequest){
        $data = $this->getRequestJoin($idrequest)->toArray();
        DB::table('team_user')->insert([
            ['id_team' => $data[0]->team_id,
            'id_user' => $data[0]->user_id]
        ]);
    }

    public function addUserToTeam($iduser, $idteam){
        DB::table('team_user')->insert([
            ['id_team' => $idteam,
                'id_user' => $iduser]
        ]);
    }

    public function getRequestJoin($idrequest){
        return DB::table('requestjointeam')
            ->select('requestjointeam.*')
            ->where('id_request','=',$idrequest)
            ->get();
    }

    public function markAsDeliberated($idrequest){
        DB::table('requestjointeam')
            ->where('id_request', $idrequest)
            ->update(['deliberated' => 1]);
    }

    public function suppUserFromTeam($id_user,$id_team){
        DB::table('team_user')->where('id_user','=',$id_user)->where('id_team','=',$id_team)->delete();
    }

    public function supprTeam($id_team){
        DB::table('team_user')->where('id_team','=',$id_team)->delete();
        DB::table('teams')->where('id_team','=',$id_team)->delete();
    }


    public function alreadyRequested($idteam){
        // SELECT count(id_request) FROM requestjointeam WHERE team_id=2 AND user_id = 2
        $data = DB::table('requestjointeam')
            ->where('team_id',$idteam)
            ->where('user_id',Auth::user()->id)
            ->count();
        if ($data == 0) return false;
        return true;
    }
}
