<?php

namespace App\Http\Controllers;

use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getConv()
    {
        $model = new Message();
        $result = $model->getAllConversation();
        echo json_encode($result);
    }


    public function showConv(Request $request){
        $model = new Message();
        $result = $model->getConversation($request->id);
        return view('messages.view_conversation')->with(['messages'=>$result->toArray(),'receiver'=>$request->id]);
    }

    public function sendMessage(Request $request){
        $model = new Message();
        $data = $request->input();
        unset($data["_token"]);
        $data["sender"] = Auth::user()->id;
        $data["created_at"] = Carbon::now();
            $data["updated_at"] = Carbon::now();
        $model->insertMessage($data);

        return redirect()->route("message.showConv",$data["receiver"]);
    }

    public function index()
    {
        return view('pages.browse_players');
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
        //
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
        //
    }


}
