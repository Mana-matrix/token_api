<?php

namespace App\Http\Controllers;

use App\session;
use Illuminate\Http\Request;
use Dirape\Token\Token;

class sessionController extends Controller
{
    public function register($key,$username)
    {
        if($key==env('APP_KEY'))
        if($username) {
            $session = session ::create([
                'ip' => '192.168.0.1',
                'username' => $username,
                'session_key' => (new Token()) -> Unique('sessions', 'session_key', 60),
            ]);
            // var_dump($session);
            return response() -> json($session, 200);
        }else return response()->json(['message'=>'no Username!'],202);
        else return response()->json(['message'=>'invalid key!'],202);
    }
    private function getSession($id){
        $date=date("Y-m-d H:i:s", time()  -1800);
        $session = session::where('id','=',$id)->where('updated_at','>',$date)->first();
        if($session) {
            $session->touch();
        }
        return $session;
    }
    public function get($id){
        $session=$this->getSession($id);
        if($session)
            return response() -> json($session, 200);
        else return response() -> json(['message'=>'access denied'], 403);
    }


    public function activate($key){
        $session = session :: where('session_key','=',$key)->first();
        if($session) {
            $session->updated_at=date('Y-m-d H:i:s');
            $session->active=1;
            $session->update();
            return response() -> json($session, 200);
        }
        else return response() -> json(['message'=>'access denied'], 403);
    }

    //
}
