<?php

namespace App\Http\Controllers;

use App\Mail\regToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        // send token to mail
        $data = ['message' => 'Hello, your one time passowrd is ' . rand(100000, 900000), 'name' => $request['name']];
        Mail::to($request['email'])->send(new regToken($data));

        // get my data sent from form submitted to my database
        User::create($request->all());

        // get my token into the database
        User::create(['message' => $data['message']]);

        return view('regToken');
    }

    // get regtoken view 
    public function regToken()
    {
        return view('regToken');
    }


    // get the account created after getting the token from gmail
    public function tokenCommand(Request $request)
    {
        // get my data sent from form submitted to my database
        // User::create($request->all());
        // return redirect()->back()->with('message', 'Your account have been created successful');
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
        } else {
            return redirect()->back()->with('message', 'Invalid login');
        }
    }
}
