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
        // validating my request
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:user',
            'password'  => 'required|confirmed|min:6',
            'password_confirmation'  => 'required',
        ]);
    }
}
