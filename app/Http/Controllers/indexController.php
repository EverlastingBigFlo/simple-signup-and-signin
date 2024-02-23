<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    // to acces my form request 
    public function signupCommand(Request $request)
    {
        $request->validate([
            'email'=>'required|email|unique:user',
            'password'  => 'required|min:6'
        ]);
    }
}
