<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */

    public function show()
    {
        if (!Auth::check()) return view("auth.login");
        $userModel = new User();
        $data = $userModel->getGameUser(Auth::user()->id);
        return view('users.showInfo',["data" =>$data->toArray()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('users.edit');
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

        //Validating the data

        //store in the database

        $user = User::find($id);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if(isset($request->image)){
            $user->image = $request->image;
            $file = Input::file('image');
            $extension = $file->getMimeType();
            //dd($file);

            $destinationPath = 'images/';
            $filename = $file->getClientOriginalName();
            Input::file('image')->move($destinationPath, $filename);
            $user->image = $destinationPath.$filename;
        }
        $user->save();



        return redirect('/');
    }

    /**
     * Remove the specified resource from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addGameData(Request $request){
        if (!Auth::check()) return view('user.login');
        $data = $request->input();
        unset($data["_token"]);
        $data['id_user'] = Auth::user()->id;
        $userModel = new User();
        $userModel->insertGame($data);
        return redirect()->route('users.show',Auth::user());
    }

    public function loadAddGame(){
        if (!Auth::check()) return view("auth.login");
        $userModel = new User();
        $data = $userModel->getGameUser(Auth::user()->id);
        return view('users.addGame',["data" =>$data->toArray()]);
    }

    public function editGame(Request $request){
        $userModel = new User();
        $id_game = $request->id_game;
        $data = $userModel->getGameByIdUser(Auth::user()->id,$id_game);
        return view('users.editGame',["data" =>$data->toArray()]);
    }

    public function editGameData(Request $request){
        $data = $request->input();
        unset($data["_token"]);
        $data['id_user'] = Auth::user()->id;
        $userModel = new User();
        $userModel->updateGameData($data);
        return redirect()->route('users.show',Auth::user());
    }

    public function deleteGame(Request $request){
        $userModel = new User();
        $id_game = $request->id_game;
        $userModel->deleteGame(Auth::user()->id,$id_game);
        return redirect()->route('users.show',Auth::user());
    }
}
