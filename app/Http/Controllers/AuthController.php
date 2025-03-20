<?php

namespace App\Http\Controllers;

use Dcblogdev\MsGraph\Facades\MsGraph;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if(!MsGraph::isConnected()){
            return view('auth.login');
        } else {
            return redirect('home');
        }

    }

    public function connect()
    {
        return MsGraph::connect();
    }

    public function logout()
    {
        return MsGraph::disconnect();
    }

    public function getAuthUser(){
        if(!Auth::check()){
            return response()->json(['error' => 'User not authenticated.'], 401);
        }
        $user = Auth::user();

        return response()->json(compact('user'));
    }
}
