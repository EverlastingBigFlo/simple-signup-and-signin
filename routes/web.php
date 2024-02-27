<?php

use App\Http\Controllers\indexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// get my signup page display
Route::get('/signup', [indexController::class, 'signup'])->name('signup');

// send signup to database
Route::post('/signup', [indexController::class, 'signupCommand'])->name('signupCommand');

//get regToken view display
Route::get('/regToken',[indexController::class, 'regToken'])->name('regToken');

//get confirm registration commmand
Route::post('/regToken',[indexController::class, 'confirmReg'])->name('confirmReg');

// get my login to display
Route::get('/login', [indexController::class, 'login'])->name('log');

//get my login command here
Route::post('/login', [indexController::class, 'loginCommand'])->name('loginCommand');


// get my logout to display
Route::get('/logout', [indexController::class, 'logout'])->name('logout');

