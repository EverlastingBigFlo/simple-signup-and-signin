<?php

namespace App\Http\Controllers;

use App\Mail\regToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

        // Generate token
        $token = rand(100000, 900000);


        // get the mail message here
        $data = ['message' => 'Hello, your one time password is ' . $token, 'name' => $request['name']];

        //send message to mail
        Mail::to($request['email'])->send(new regToken($data));

        // send user including the token generated to the database
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'token' => $token,

            'is_confirmed' => false,
        ]);

        return view('regToken');
    }


    // get regtoken view 
    public function regToken()
    {
        return view('regToken');
    }


    // get the account created after getting the token from gmail
    public function confirmReg(Request $request)
    {
        $request->validate(['token' => 'required']);

        if ($request) {

            // $user->update(['token' => $token]);

            return redirect()->route('signup');
        } else {


            // Token doesn't match
            return redirect()->back()->with('error', 'Invalid token or email.');
        }
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
