<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        // get my data sent from form submitted to my database
       User::create($request->all());
       return redirect()->back()->with('message','Your account have been created successful');
    }

    //get my login view and send request to database
    public function login()
    {
        return view('login');
    }

    // get validate and send to database
    public function loginCommand(Request $request)
    {
        // validate my login info
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // coinfirm the auth in database
        $token = auth()->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($token) {
            return 'login successful';
        }else{
           return redirect()->back()->with('message', 'invalid login');
        }
    }
}
