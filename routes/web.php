<?php

use App\Http\Controllers\Authentication;
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
    return view('home');
});
Route::get('/auth',function(){
    return view('authentication/auth');
});

Route::get('/dashboard',function(){
return view('home/dashboard');
});

//authentication 

Route::post('/signup',[Authentication::class,'signupAction'])->name('signup');
Route::post('/login', [Authentication::class, 'loginAction'])->name('login');


