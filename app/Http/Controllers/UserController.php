<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.showInfo');
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
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
//            'password' => 'min:6',
            'steam' => 'required|max:255',
//            'cs_level' => 'numeric',
//            'lol_level' => 'numeric',
//            'rl_level' => 'numeric',
        ));

        //store in the database
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;;
        $user->password = $request->password;;
        $user->steam = $request->steam;;
        $user->cs_level = $request->cs_level;;
        $user->lol_level = $request->lol_level;;
        $user->rl_level = $request->rl_level;;
        $user->save();//save in db

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
