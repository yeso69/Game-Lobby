<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    public function getAllConversation(){
       $result = DB::table('users')
           ->select("id","name")
            ->whereIn('id', function($query)
            {
                $query->select(DB::raw("sender"))
                    ->from('messages')
                    ->whereRaw('receiver = '.Auth::user()->id);
            })
            ->get();
        return $result;
    }


    public function getConversation($id){
        $result = DB::table('messages')
            ->select('messages.*', 'users.name')
            ->where([
                ['sender','=', Auth::user()->id],
                ['receiver','=',$id]
            ])
            ->orWhere([
                ['receiver','=',Auth::user()->id],
                ['sender','=',$id]
            ])
            ->join('users', 'users.id', '=', 'messages.sender')
            ->orderBy('created_at','asc')
            ->get();
        return $result;

    }

    /*$result = DB::table('messages')
->select('messages.*', 'users.name')
->where([
['sender','=', Auth::user()->id],
['receiver','=',$id]
])
->orWhere([
['receiver','=',Auth::user()->id],
['sender','=',$id]
])
->join('users', 'users.id', '=', 'messages.sender')
->orderBy('created_at','asc')
->toSql();
return $result;*/

    public function insertMessage($data){
        DB::table('messages')->insert($data);
    }


}
