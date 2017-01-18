<?php

namespace App\Http\Controllers;

use App\Message;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //return Redirect::action('TeamController@show');
        return Redirect::route('teams.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teams.create_team');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = false;
        if(!isset($request['image'])){
           $image = 'img/nopic.png';
        }
        else{
            $file = Input::file('image');
            $destinationPath = 'images_team/';
            $filename = $file->getClientOriginalName();
            Input::file('image')->move($destinationPath, $filename);
            $image = $destinationPath.$filename;
            //dd($destinationPath.$filename);
        }
        Team::create([
            'name_team' => $request['name_team'],
            'id_admin' => $request['id_admin'],
            'description' => $request['description'],
            'id_game' => $request['id_game'],
            'image' => $image //filename....
        ]);

        $teamModel = new Team();
        $teamModel->addUserToTeam(Auth::user()->id,DB::getPdo()->lastInsertId());

        return redirect()->route('teams.myTeams');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function showAllTeams(){
        $teamModel = new Team();
//        $data = $teamModel->getAllTeams();
        return view('teams.list');
        //return view('teams.browse_teams',["data" =>$data->toArray()]);

    }

    public function getTeamsByGame(Request $request){
        $teamModel = new Team();
        $data = $teamModel->getTeamsByGame($request->id_game,Auth::user()->id);
        return json_encode($data);
    }

    public function showTeamById(Request $request){
        $teamModel = new Team();
        $data = $teamModel->getTeamById($request->id_team);
        $user = $teamModel->getUserByTeam($request->id_team,$data[0]->id_game);
        return view('teams.show_team',["data" =>$data->toArray(),"user" =>$user->toArray()]);
    }

    public function myTeams(){
        $id_user = Auth::user()->id;
        $teamModel = new Team();
        $data = $teamModel->getTeamsByUser($id_user)->toArray();
        foreach ($data as $d){
            $d->user = $teamModel->getUserByTeam($d->id_team,$d->id_game)->toArray();
        }
        return view('teams.my_teams',["data" =>$data]);
    }

    public function supprUserFromTeam(Request $request){
        $id_user = $request->input('id_user');
        $id_team = $request->input('id_team');
        $teamModel = new Team();
        $teamModel->suppUserFromTeam($id_user,$id_team);
    }

    public function showNewRequests(){
        $teamModel = new Team();
        $data = $teamModel->getAllRequest();
        return view('teams.requests',["data" =>$data]);
    }

    public function acceptRequest($idrequest){
        $m =new Team();
        $m->markAsDeliberated($idrequest);
        $m->add($idrequest);
    }

    public function declineRequest(){

    }

    public function requestJoin(Request $request){
        $m = new Team();
        $m->createRequest($request->id_team);
    }

}
