<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authentication extends Controller
{
    //Signup action

    public function signupAction(Request $request)
    {

        //Validating user data



        $request->validate([
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8',
        ]);


        User::create([
            'name' => 'default_name',
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Takes email password from request :  

        $credentials = $request->only('name', 'email', 'password');

        //Login attempt to database


        Auth::attempt($credentials);

        return redirect('auth')->with('email', $request->email);
    }


    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        };
    }
}
