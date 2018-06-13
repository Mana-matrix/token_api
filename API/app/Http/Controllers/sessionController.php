<?php

namespace App\Http\Controllers;

use App\session;
use Illuminate\Http\Request;
use Dirape\Token\Token;

class sessionController extends Controller
{
    public function register($username)
    {
        $session = session ::create([
            'ip' => '192.168.0.1',
            'username' => $username,
            'session_key' => (new Token()) -> Unique('sessions', 'session_key', 60),
        ]);
        // var_dump($session);
        return response() -> json($session, 200);

    }
    public function activate($key){
        $session = session :: where('session_key','=',$key)->first();
        $session->active=1;
        $session->update();
        return response() -> json($session, 202);
    }
    //
}
