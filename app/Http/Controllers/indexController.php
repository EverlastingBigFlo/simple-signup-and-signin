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
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        // Generate token
        // $token = rand(100000, 900000);

        // Generate token and timestamp
        $token = rand(100000, 900000);
        $tokenCreatedAt = now(); // Timestamp when the token was created

        // Store token creation time in session
        session()->put('token_created_at', $tokenCreatedAt);

        // get the mail message here
        $data = ['message' => 'Hello, your one time password is ' . $token, 'username' => $request['username']];

        //send message to mail
        Mail::to($request['email'])->send(new regToken($data));

        // send user including the token generated to the database
        User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'token' => $token,
            // set this token confirm to unconfirm by default
            'is_confirmed' => false,
        ]);

        session()->put('email', $request->email);

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
    // Retrieve email from session
    $email = session()->get('email');

    // Check if the email is available in session
    if (!$email) {
        // Redirect to signup page with a message indicating an error
        return redirect()->route('signup')->with('message', 'Session expired or invalid email.');
    }

    // Retrieve token creation time from session
    $tokenCreatedAt = session()->get('token_created_at');

    // Check if token expiration time has passed (1 minute in this case)
    $tokenExpirationTime = $tokenCreatedAt->addMinutes(1);

    if (now()->gt($tokenExpirationTime)) {
        // Token has expired, sign out user and delete from session
        auth()->logout();
        session()->forget('email');

        return redirect()->route('signup')->with('message', 'Token has expired. Please sign up again.');
    }

    // Validate token
    $request->validate(['token' => 'required']);

    $user = User::where('email', $email)->first();

    if ($user && $user->token == $request->token) {
        // Token is valid, confirm registration
        $user->is_confirmed = true;
        $user->save();
        session()->remove('email');

        // Redirect to signup page or any other page as needed
        return redirect()->route('signup')->with('message', 'Registration confirmed successfully.');
    } else {
        // Token doesn't match
        return redirect()->back()->with('message', 'Invalid token or email.');
    }
}

    

    // In a scheduled task or cron job
    public function deleteExpiredTokens()
    {
        // Find unconfirmed users whose tokens have expired
        $expiredUsers = User::where('is_confirmed', false)
            ->where('created_at', '<=', now()->subMinutes(1))
            ->get();

        foreach ($expiredUsers as $user) {
            // Log out user
            auth()->logout();

            // Delete user
            $user->delete();
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

        // pass the email and password into a variable to request just email and password
        $credentials =  $request->only('email', 'password');

        // try to get the user information from the database
        $credentials['is_confirmed'] = true;

        if (auth()->attempt($credentials)) {

            if (auth()->user()->is_confirmed) {

                // check if the user is authenticated and confirmed
                return view('logout');
            } else {
                // user account is not confirmed, don't login and redirect back
                auth()->logout();

                return redirect()->back()->with('message', 'Your account is not yet confirmed.');
            }
        } else {

            // authentication failed, redirect back with error message
            return redirect()->back()->with('message', 'Invalid login credentials.');
        }
    }

    // to logout 
    public function logout()
    {
        // return view('logout');
        auth()->logout();

        return redirect()->route('signup')->with('message', 'You have been logged out successfully.');
    }

    // to delete user

    public function deleteAccount(Request $request)
    {
        // Find the user by their email
        $user = User::where('email', $request->email)->firstOrFail();

        // Delete the user
        $user->delete();

        // Redirect with a message
        return redirect()->route('signup')->with('message', 'Sad to see you leave.');
    }
}
